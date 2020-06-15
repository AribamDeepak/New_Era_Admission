<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/reperio/image/favicon.ico"/>
<!--===============================================================================================-->
  <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?php echo base_url();?>assets/reperio/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/reperio/css/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo base_url();?>assets/reperio/css/linearicons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/reperio/css/style.css">
<!--===============================================================================================-->
</head>
<style>
	body{
		background-color:  background: #FF512F;  /* fallback for old browsers */
 		background: -webkit-linear-gradient(to top, #DD2476, #FF512F);  /* Chrome 10-25, Safari 5.1-6 */
 		background: linear-gradient(to top, #DD2476, #FF512F); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
</style>
<body>
		<header id="header">
		<div class="container main-menu">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a class="navbar-brand" href="#"><img src="<?php echo base_url();?>assets/reperio/image/log.svg" width="80px"> <b style=" font-family: 'Poppins', sans-serif; color: #fff;">REPERIO</span></b></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="<?=site_url('Home')?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;BACK</a></li>
						
						
					</ul>
				</nav><!-- #nav-menu-container -->		    		
			</div>
		</div>
	</header><!-- #header -->
	<div class="limiter">
		<div class="container-loginClient">
			<div class="wrap-loginClient">
				<div class="loginClient-form-title" style="background-image: url(<?php echo base_url();?>assets/reperio/image/bg-01.jpg);">
					<span class="loginClient-form-title-1" style="text-align: right;">
						REPORTS
					</span>
				</div>

				<form class="loginClient-form validate-form">
					<div class="wrap-input validate-input m-b-26">
						<span class="label-input"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Username</span>
						<input class="input" type="text" name="username" placeholder="Enter username">
						<span class="focus-input"></span>
					</div>

					<div class="wrap-input validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input"><i class="fa fa-key" aria-hidden="true"></i>&nbsp;&nbsp;Password</span>
						<input class="input" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="forgot_pw.html" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-loginClient-form-btn">
						<button onclick="window.location.href = 'report_in.html';" class="loginClient-form-btn">Login</button>
					</div>
				</form>

				<p style="text-align: center;font-size: 0.8em;color: #aaa;padding-bottom: 15px;font-family: 'Poppins', sans-serif;">© 2019 - Reperio Informatics Pvt. Ltd.</p>
			</div>
		</div>


	</div>


	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/reperio/js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/reperio/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/reperio/js/bootstrap.min.js"></script>

<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/reperio/js/login.js"></script>

</body>
</html>