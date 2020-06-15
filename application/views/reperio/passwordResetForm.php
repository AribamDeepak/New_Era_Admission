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
          <a class="navbar-brand" href="<?php echo site_url();?>"><img src="<?php echo base_url();?>assets/reperio/image/log.svg" width="80px"> <b style=" font-family: 'Poppins', sans-serif; color: #fff;">REPERIO</span></b></a>
        </div>           
      </div>
    </div>
  </header><!-- #header -->

  <div class="limiter">
    <div class="container-loginClient">
  
      <div class="login-form">
        <div class="main-div">
           <?php if ($token == 1){?>
              <div class="panel">
                <div style="text-align: center;margin-bottom: 2em;">
                  <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>assets/reperio/image/logo_rep.png" width="80px"></a>
                </div>
                
                <p>Please enter your new password. (Minimum 5 character)</p>
                  <?php if (!empty($msg)){?>
                    <div class="alert alert-danger" style="font-size: 12px"><?php echo $msg;?></div>
                  <?php }?>
                    <?php if (!empty($message)){?>
                      <div class="alert alert-success" style="font-size: 12px"><?php echo $message;?></div>
                    <?php }?>
              </div>
              <?php echo form_open('Login/ResetNewPassword','class="resetNewPassword-form" id="resetNewPassword-form"'); ?>
              <input type="hidden" name="token"  value="<?php echo $token_code; ?>" > 
                <div class="form-group">
                  <input type="password" class="form-control" name="password"  placeholder="New password"  style="color:#000000;" value="" > 
                  <h5 class="text-danger" style="font-size: 12px"><?php echo form_error("password"); ?></h5>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password"  style="color:#000000;" value="" >
                  <h5 class="text-danger" style="font-size: 12px"><?php echo form_error("password_confirm"); ?></h5>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                <div>
                  <a class="txt1" href="<?php echo base_url() . 'Login/resetPasswordEmployee'; ?>" >
                    sent new reset password link ?
                  </a>
                </div>
              </div>
                <button type="submit" class="loginClient1-form-btn" style="margin: 0 auto;">
                  Reset
                </button>
              <?php echo form_close(); ?>
              <p style="text-align: center;font-size: 0.8em;color: #aaa;padding-top: 15px;font-family: 'Poppins', sans-serif;">© 2019 - Reperio Informatics Pvt. Ltd.</p>
          <?php }else{?>

            <h3 class="text-danger" style="text-align: center;">Reset Password Link has been expired.</h3><br>
            <h5 class="text-danger" style="font-size: 12px">Please try for new reset link...</h5>

          <?php }?>        
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