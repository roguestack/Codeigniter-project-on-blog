<?php include 'header.php';?>
<div class="container-md mt-3 mb-3" style="display:flex;zoom:1;justify-content:space-around;">
	<div class="card" style="width:25rem;">
		<div class="card-body">
		<!-- <?php echo validation_errors();?>  -->
		<?php echo form_open_multipart('Admin/showForm'); ?>
			<div class="card-header">
				<h3 class="display-5 text-center">Admin Registration Form</h3>
				<p class="card-subtitle mb-2 text-muted text-center">
					*Kindly fill below details for Admin Registration	
				</p>
			</div>
			<div class="card-text mt-3">
				<?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'User Name','name'=>'username','value'=>set_value('username')])?>
				<span class="error"><?php echo form_error('username'); ?></span>
			</div>
			<div class="card-text mt-3">
				<?php echo form_input(['type'=>'password','class'=>'form-control','placeholder'=>'Password','name'=>'password','value'=>set_value('password')])?>
				<span class="error"><?php echo form_error('password'); ?></span>
			</div>
			<div class="card-text mt-3">
				<?php echo form_input(['type'=>'password','class'=>'form-control','placeholder'=>'Reconfirm Password','name'=>'rcpass','value'=>set_value('rcpass')])?>
				<span class="error"><?php echo form_error('rcpass'); ?></span>
			</div>
			<div class="card-text mt-3">
					<?php echo form_input(['type'=>'email','name'=>'email','placeholder'=>'example@example.com','class'=>'form-control','value'=>set_value('email')])?>
					<span class="error"><?php echo form_error('email'); ?></span>
			</div>
			<div class="card-text mt-3">
				<?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'First Name','name'=>'firstname','value'=>set_value('firstname')])?>
				<span class="error"><?php echo form_error('firstname'); ?></span>
			</div>
			<div class="card-text mt-3">
				<?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'Last Name','name'=>'lastname','value'=>set_value('lastname')])?>
				<span class="error"><?php echo form_error('lastname'); ?></span>
			</div>
			<div class="card-text mt-3">
				<select name="country" id="countrylist" class="form-select">
					<option>Select Your Country</option>
					<?php foreach($country as $ctryRow){ ?>
						<option value="<?php echo $ctryRow['id']?>"><?php echo $ctryRow['name']  ?> </option>
					<?php } ?>
				</select>
			<span class="error"><?php echo form_error('country'); ?></span>
			</div>
			<div class="card-text mt-3">
				<select name="state" id="statelist" class="form-select">
					<option>Select Your State</option>
				</select>
			<span class="error"><?php echo form_error('state'); ?></span>
			</div>
			<div class="card-text mt-3">
				<select name="city" id="citylist" class="form-select" >
					<option>Select Your City</option>
				</select>
			<span class="error"><?php echo form_error('city'); ?></span>
			</div>
			<!--<div class="card-text mt-3">
				<input type="radio" name="gender" value="Male"> Male
				<input type="radio" name="gender" value="Female"> Female
				<span class="error"><?php echo form_error('gender'); ?></span>
			</div>
			<div class="card-text mt-3 mb-2">
					<input class="form-control " type="file" name="userpic" id="formFile">
			</div>
			<span class="error"><?php echo form_error('userpic'); ?></span> -->
			<div class="card-text mt-3">
					<input type="checkbox" name="td" value="checked" id="td">
					I Agree with All Terms & conditions
			</div>
			<span class="error"><?php echo form_error('td'); ?></span>
			<div class="card-text mt-3">
				<div style="display: flex;justify-content:space-around;">
					<input type="submit" class="btn btn-outline-primary" name="register" value="Register" id="registerButton">
				</div>
			</div>
			<?php form_close()?>
		</div>	
	</div>
</div>

<script>
$(document).ready(function(){
	$('#countrylist').on('change',function(){
		var c_id= $('#countrylist').val();
		//alert (c_id);
		$.ajax({
			url:"<?php echo base_url(); ?>/Admin/fetch_state",
			method:"POST",
			data:{
				'country_id':c_id,
			},
			success:function(response){
				//console.log(response);
				$('#statelist').html(response);
			}
		})
	})
});
</script>
<?php include 'footer.php';?>

