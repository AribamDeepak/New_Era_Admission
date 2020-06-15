<?php if($this->session->userdata('loginStatus') == false && $this->session->userdata('userrole') != 'client'){
    redirect(site_url());
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>REPERIO | Client</title>
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
					<a class="navbar-brand" href="<?php echo site_url();?>"><img src="<?php echo base_url();?>assets/reperio/image/rep_black.svg" width="100%"></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="<?=site_url('login/logoutClient')?>"><i class="fa fa-power-off" aria-hidden="true" style="font-size: 1.5em;" ></i>&nbsp;&nbsp;Logout</a></li>
						
						
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
							 <img src="<?php echo base_url();?>assets/reperio/image/log.svg"> 
							<span style="font-size: 2em;color: #f10101;" >Client Dashboard</span>
						</div>
					</div>
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