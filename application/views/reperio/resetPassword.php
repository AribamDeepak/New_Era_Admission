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
          <a class="navbar-brand" href="<?php echo site_url();?>"><img src="<?php echo base_url();?>assets/reperio/image/logo_rep.png" width="80px"> </a>
        </div>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="<?=site_url('Home')?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;BACK</a></li>
            
            
          </ul>
        </nav><!-- #nav-menu-container -->            
      </div>
    </div>
  </header><!-- #header -->

  <div class="limiter" style="margin-top: -5em;">
    <div class="container-loginClient">
      <div class="elelment">
        <div class="element-main" style="    margin-top: 30vh;">
          <div style="text-align: center;margin-bottom: 2em; display:none;">
          <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>assets/reperio/image/logo_rep.png" width="80px"> <b style="color: #424242;"></a></div>
          <h1 style="color:#f10101;">Reset Password</h1>
          <p> Forgot your password? No worries. <br>Just enter the email you used to sign up and we will send you a link to reset it.</p>
          <!-- <form> -->
            <?php if (!empty($msg)){?>
            <div class="alert alert-danger" style="text-align: center;"><?php echo $msg;?></div>
          <?php }?>
          <?php if (!empty($message)){?>
            <div class="alert alert-success" style="text-align: center;"><?php echo $message;?></div>
          <?php }?>
            <?php echo form_open('Login/forgetPasswordEmployee','class="reset-form" id="reset-form"'); ?>
            <input type="text" name="emailforget" value="Your e-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your e-mail address';}" required>
            <h5 class="text-danger" style="font-size: 12px;"><?php echo form_error("emailforget"); ?></h5>
            <!-- <input type="button" value="Send password reset email"> -->
            <button class="loginClient1-form-btn" style="margin: 0 auto;">
              Send email
            </button>
            <?php echo form_close(); ?>
          <!-- </form> -->
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="<?php echo base_url() . 'Home'; ?>"><i class="fa fa-angle-left fa-fw"></i> Back to Reperio</a></p>
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