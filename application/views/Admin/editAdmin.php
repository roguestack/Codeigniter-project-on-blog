<?php 
	include 'header.php';
?>

<div class="container-fluid">
	<div class="mt-3" style="display: flex;justify-content:space-between">
		<h1 class="text-center">Admin | Edit Article Details</h1>
		<div>
			<a href="dashboard" class="btn btn-outline-info">Back to Dashboard</a>
			<a href="logout" class="btn btn-outline-danger">Log Out</a>
		</div>
	</div>
</div>
<?php echo form_open('Admin/article')?>
<?php echo form_hidden('users_id',$this->session->userdata('id'))?>

<div class="container-lg mt-3 mb-3">
<div class="form-group">
      <!-- <label for="exampleInputEmail1" class="form-label mt-4">Article Heading</label> -->
      <?php echo form_input(['name'=>'article_title','class'=>'form-control','type'=>'text','placeholder'=>'Article Title','value'=>set_value('article_title')]) ?>
	  <!-- <input type="text" name="articleheading" class="form-control" id="articleheading" aria-describedby="emailHelp" placeholder="Article Heading"> -->
	  <span class="error"><?php echo form_error('article_title'); ?></span>
</div>
<div class="form-group">
      <!-- <label for="exampleTextarea" class="form-label mt-4">Article Details</label> -->
	  <?php echo form_textarea(['name'=>'article_body','class'=>'form-control','type'=>'textarea','rows'=>10,'placeholder'=>'Article Details','value'=>set_value('article_body')]) ?>
	 <!-- <textarea class="form-control" name="article_body" id="exampleTextarea" rows="10" placeholder="Article Details"></textarea> -->
	 <span class="error"><?php echo form_error('article_body'); ?></span>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-outline-primary">Submit</button>
	<button type="reset"  class="btn btn-outline-danger">Reset</button>
	
</div>
<?php echo form_close()?>
</div>

