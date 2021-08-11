<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	
	<?= link_tag('application/assets/css/bootstrap.css') ?>
	<title>Admin Panel</title>
	<style>
		.error{
				color:red;
		}
		.colored-toast .swal2-icon-success {
			/* background-color: #a5dc86 !important; */
			background-color: #000 !important;
		}
		.colored-toast.swal2-icon-error {
			background-color: #f27474 !important;
		}
		.colored-toast .swal2-title {
				color: white;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
	<a class="navbar-brand">Blog-e</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
			<!-- <li class="nav-item">
          <a class="nav-link active" href="Home/index">Home</a>
        </li> -->
        <li class="nav-item">
				<?php if($this->session->userdata('id')) { ?>
						<a class="nav-link disabled" href="login">Login</a>
				<?php
				}else{ ?>
						<a class="nav-link active" href="login">Login</a>
				<?php }?>
        </li>
				<li class="nav-item">
				<?php if($this->session->userdata('id')) { ?>
						<a class="nav-link disabled" href="register">Registration</a>
				<?php	}else{ ?>
						<a class="nav-link active" href="register">Registration</a>
				<?php }?>
        </li>
				<!-- <li class="nav-item">
          <a class="nav-link active" href="dashboard">Dashboard</a>
        </li> -->
				<?php if($this->session->userdata('id')){ ?>
				<li class="nav-item">
          			<a class="nav-link active" href="dashboard">Dashboard</a>
        		</li>			
				</ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
      </form>
			<?php } ?>
    </div>
  </div>
</nav>
