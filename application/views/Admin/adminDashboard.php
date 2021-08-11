<!-- Header File -->
<?php include 'header.php'?>

<!-- Logs only error -->
<?php
error_reporting(E_ERROR);
?>

<!-- flash msg once user logs in -->
<?php if($this->session->flashdata('flsmsg')){ ?>
	<!-- <div id="mymsg"></div> -->
<?php } ?>

<!-- flash msg once article deleted successfully -->
<?php if($this->session->flashdata('editSuccess')){ ?>
	<!-- <div class="alert alert-dismissible alert-success text-center" style="color:white;"> -->
		<!-- <button type="button" class="btn-close" data-dismiss="alert"></button> -->
		<script>Swal.fire({
			//position:'top-right',	
			html:"Success<br>"+
			"Article Edited Successfully",
			icon:'success',
			toast:true
			})
		</script>
	<!-- </div> -->
<?php } ?>

<!-- flash msg once article deleted successfully -->
<?php if($this->session->flashdata('delConfirmation')){ ?>
	<div class="alert alert-dismissible alert-success text-center" style="color:white;">
		<button type="button" class="btn-close" data-dismiss="alert"></button>
		<strong">Success !</strong> Article has been Deleted successfully.
	</div>
<?php } ?>

<!-- flash msg in case article failed to delete-->
<?php 
if($this->session->flashdata('notDelConfirmation')){ ?>
<div class="alert alert-dismissible alert-danger text-center" style="color:white;">
		<button type="button" class="btn-close" data-dismiss="alert"></button>
		<strong">Oops !</strong> There was some error in Deleting Articles, so try again !
</div>
<?php } ?>

<!-- flash msg once new article publishes successfully -->
<?php if($this->session->flashdata('articleAdded')){ ?>
	<div class="alert alert-dismissible alert-success text-center" style="color:white;">
		<button type="button" class="btn-close" data-dismiss="alert"></button>
		<strong">Great !</strong> New article has been posted successfully.
	</div>
<?php } ?>

<!-- flash msg in case new article failed to publish-->
<?php 
if($this->session->flashdata('articleFailedToAdded')){ ?>
<div class="alert alert-dismissible alert-danger text-center" style="color:white;">
		<button type="button" class="btn-close" data-dismiss="alert"></button>
		<strong">Oops !</strong> There was some error in inserting Articles, so try again !
</div>
<?php } ?>

<!-- progressbar once page loads -->
<!-- <div class="container" id="barKeeper" style="margin-top:500px;">
	<div class="progress">
		<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id="bar">
		</div>
	</div>
</div> -->

<!-- Main Dashboard Starts here -->
<div id="dashboardKeeper">

	<!-- Dashboard Heading Starts here -->
	<div class="container-fluid">
		
		<div class="mt-3" style="display: flex;justify-content:space-between">
			<h1 class="text-center">Admin | Dashboard</h1>
			<div>
				<a href="addarticle" class="btn btn-outline-info">Add New Article</a>
				<a href="logout" class="btn btn-outline-danger">Log Out</a>
			</div>
		</div>
	</div>
	<!-- Dashboard Heading End here -->
	
	<!-- Dashboard Table start here -->
	<div class="container-fluid">
		<table class="table table-hover table-responsive">
			<thead>
				<tr>
					<th>ID</th>
					<th>Article Title</th>
					<th>Details</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($data)){ ?>
					<?php foreach ($data as $row) {?>
						<tr>
							<td><?php echo $row->id ?></td>
							<td><?php echo $row->article_title?></td>
							<td><?php echo $row->article_body ?></td>
							<td><?php 
								echo form_open('Admin/getArticleId/'.$row->id),
								form_hidden('id',$row->id),
								form_submit(['name'=>'submit','class'=>'btn btn-outline-primary','value'=>'Edit']),
								form_close();
								?>
								<?php 
								echo form_open('Admin/delArticle'),
								form_hidden('id',$row->id),
								form_submit(['name'=>'submit','class'=>'btn btn-outline-danger','value'=>'Delete']),
								form_close();
								?>
							</td>
						</tr>
							<?php }} else{ ?>
						<tr>
							<td colspan="5">No Records Available</td>
						</tr>
					<?php } ?>
			</tbody>
		</table>
		<!-- Dashboard Table Ends here -->
	</div>

	<!-- Pagination Starts here -->
	<!-- <div>
		<nav>
			<?php echo $this->pagination->create_links() ?>
		</nav>
	</div> -->
	<!-- Pagination Ends here -->

</div>
<!-- Main Dashboard Ends Here -->

<!-- script starts here -->
<!-- <script type="text/javascript">

//disable right click
// document.oncontextmenu = function() {
// 	return false;
// };

// function to call alert on top-right
//$('#mymsg').ready(function(){
	// function swaldemo(){
	//alert('inside');
	// Swal.fire({
	// 	icon:'success',
	// 	iconColor:'white',
	// 	position:'top-right',
	// 	title:'Thanks for logging, <br>'+
	// 	'Good to see you here',
	// 	toast:true,
	// 	background:'#000',
	// 	timer:3000,
	// 	timerProgressBar:true,
	// 	showConfirmButton:false,
	// 	customClass: {
	// 		popup: 'colored-toast'
	// 	},
	// })
//}
//})

// Loop Through to show progress bar
// var i = 0;
// $("#dashboardKeeper").hide();
// 	function countNumbers(){
// 		if(i < 100){
// 			i++;
// 			$("#bar").css("width", i + "%");
// 			$("#bar").text(i + "%");
// 		}else{
// 			$("#barKeeper").hide();
// 			$("#dashboardKeeper").show();
// 		}
// 		// Wait for sometime before running this script again
// 		setTimeout("countNumbers()", 100);
// 		//progressBar.hide();
// 	}
//     countNumbers();
</script>-->

<!-- Footer File -->
<?php include 'footer.php'?>
