<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ELOGIN XTRA-EDGE SCHOOL</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h2 style="font-family:Helvetica !important;">XTRA-EDGE SCHOOL ADMIN</h2>
      </div>
	<?php if (!empty($msg)){?>
	<div class="alert alert-danger"><?php echo $msg;?></div>
	<?php }?>
  <?php if (!empty($message)){?>
  <div class="alert alert-success"><?php echo $message;?></div>
  <?php }?>
      <div class="login-box">

        <?php echo form_open('Login','class="login-form" id="login-form"'); ?>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input value="<?php if(!is_null(get_cookie('member_login',true)) && empty($msg)) { echo get_cookie('member_login',true); } ?><?php echo set_value('email'); ?>" name="email" class="form-control" type="text" placeholder="Email" <?php if(form_error("email")){echo "autofocus";} ?>>
            <h5 class="text-danger" style="font-size: 12px"><?php echo form_error("email"); ?></h5>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input value="<?php if(!is_null(get_cookie('member_pass',true)) && empty($msg)) { echo $this->encrypt->decode(get_cookie('member_pass',true));} ?><?php echo set_value('password'); ?>" name="password" class="form-control" type="password" placeholder="Password" <?php if(form_error("password")){echo "autofocus";} ?>>
            <h5 class="text-danger" style="font-size: 12px"><?php echo form_error("password"); ?></h5>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <!-- <p class="semibold-text mb-2"><a href="<?php echo base_url() . 'Login/forgetPwd_form'; ?>" >Forgot Password ?</a></p>  -->
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block">LOGIN</button>
          </div>
            
        <?php echo form_close(); ?>

      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url();?>assets/js/plugins/pace.min.js"></script>

  </body>
</html>