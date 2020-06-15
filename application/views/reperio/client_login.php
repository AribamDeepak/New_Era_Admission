<!DOCTYPE html>
<html lang="en">
<head>
	<title>REPERIO | Login</title>
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
					<a class="navbar-brand" href="<?php echo site_url();?>"><img src="<?php echo base_url();?>assets/reperio/image/rep_white.svg" width="100%"> </a>
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
	
			<div class="login-form">
				<div class="main-div">
					<div class="panel">
						<div>
							<!-- <img src="<?php echo base_url();?>assets/reperio/image/clients/samsung.png"> -->
							<span style="font-size: 2em;color: #f10101;" >Client Login</span>
						</div>
						
						<p>To continue please enter your username and password</p>
							<?php if (!empty($msg)){?>
								<div class="alert alert-danger"><?php echo $msg;?></div>
							<?php }?>
						    <?php if (!empty($message)){?>
						    	<div class="alert alert-success"><?php echo $message;?></div>
						    <?php }?>
					</div>
					<?php echo form_open('Login/ClientLogin','class="login-form" id="login-form"'); ?>

						<div class="form-group">
							<input type="username" class="form-control" name="email"  placeholder="Username or Email" required style="color:#000000;" value="<?php if(!is_null(get_cookie('member_login',true)) && empty($msg)) { echo get_cookie('member_login',true); } ?><?php echo set_value('email'); ?>" > 
							<h5 class="text-danger" style="font-size: 12px"><?php echo form_error("email"); ?></h5>
						</div>

						<div class="form-group">
							<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required style="color:#000000;" value="<?php if(!is_null(get_cookie('member_pass',true)) && empty($msg)) { echo $this->encrypt->decode(get_cookie('member_pass',true));} ?><?php echo set_value('password'); ?>">
							<h5 class="text-danger" style="font-size: 12px"><?php echo form_error("password"); ?></h5>
						</div>

						<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a class="txt1" href="<?php echo base_url() . 'Login/resetPasswordEmployee'; ?>" >
								Forgot Password?
							</a>
						</div>
					</div>
						<button class="loginClient1-form-btn" style="margin: 0 auto;">
							Login
						</button>
					<?php echo form_close(); ?>
					<p style="text-align: center;font-size: 0.8em;color: #aaa;padding-top: 15px;font-family: 'Poppins', sans-serif;">© 2019 - Reperio Informatics Pvt. Ltd.</p>
				</div>
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