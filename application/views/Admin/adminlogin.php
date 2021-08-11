<?php include 'header.php';?>

<div class="container-md mt-3 mb-3" style="display:flex;zoom:1;justify-content:space-around;" id="loginform">
	<div class="card" style="width:25rem;">
			<?php if($this->session->flashdata('failed')){ ?>
				<div class="alert alert-dismissible alert-danger text-center" style="color:white;">
					<button type="button" class="btn-close" data-dismiss="alert"></button>
					<strong">Oh snap!</strong> Invalid UserName/Password.
				</div>
			<?php } ?>
			<div class="card-body">
			<!-- <?php echo validation_errors(); ?> -->
			<?php echo form_open_multipart('Admin/adminLogin'); ?>
				<div class="card-header">
					<h3 class="display-5 text-center">Admin | Login</h3>
					<p class="card-subtitle mb-2 text-muted text-center">
						*Kindly fill below details to access page
					</p>
				</div>
				<div class="card-text mt-3">
					<!-- <input type="text" name="username" id="username" placeholder="User Name" class="form-control"> -->
					<?php echo form_input(['class'=>'form-control','placeholder'=>'User Name','name'=>'username'])?>
					<span class="error"><?php echo form_error('username'); ?></span>
				</div>
				<div class="card-text mt-3">
						<!-- <input type="password" name="password" id="password" placeholder="Password" class="form-control"> -->
						<?php echo form_password(['class'=>'form-control','placeholder'=>'Password','name'=>'password'])?>
						<span class="error"><?php echo form_error('password'); ?></span>
				</div>
				<div class="card-text mt-3">
					<div style="display: flex;justify-content:space-around;">
						<!-- <input type="submit" class="btn btn-primary" name="login" value="Login" id="loginButton"> -->
						<?php echo form_submit(['class'=>'btn btn-outline-primary','type'=>'submit','value'=>'Login'])?>
						<?php echo form_reset(['class'=>'btn btn-outline-danger','type'=>'reset','value'=>'Reset'])?>
					</div>
				</div>
				<?php form_close()?>
			</div>	
		</div>
</div>

<?php include 'footer.php';?>
