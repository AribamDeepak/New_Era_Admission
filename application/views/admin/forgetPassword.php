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
    <title>Login - Reperio Admin</title>
    <!-- captcha refresh code -->
<!-- <script>
$(window).on('beforeunload', function() {
  $(window).on('unload', function() {
    window.location.href = '<?php echo base_url().'index.php/Login/forgetPwd_form'; ?>';
  });
});  
$(document).ready(function(){
    $('.refreshCaptcha').on('click', function(){
        $.get('<?php echo base_url().'Login/refresh'; ?>', function(data){
            $('#captImg').html(data);
        });
    });
});
</script> -->
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h2 style="font-family:helvetica;">Reperio</h2>
      </div>
	<?php if (!empty($msg)){?>
	<div class="alert alert-danger"><?php echo $msg;?></div>
	<?php }?>
  <?php if (!empty($message)){?>
  <div class="alert alert-success"><?php echo $message;?></div>
  <?php }?>
      <div class="login-box">

        <?php echo form_open('Login/forgetPassword',array('class'=>'login-form')); ?>
        <!-- <form class="forget-form" action="index.html"> -->
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input value="<?php echo set_value('emailforget'); ?>" name="emailforget" class="form-control" type="text" placeholder="Email" <?php if(form_error("emailforget")){echo "autofocus";} ?>>
            <h5 class="text-danger" style="font-size: 12px"><?php echo form_error("emailforget"); ?></h5>
          </div>
         <!--  <div class="form-group">
            <label class="control-label"><p id="captImg"><?php echo $captchaImg; ?></p>
            </label>
            <input type="text" class="form-control" name="captcha" value=""/ placeholder="Enter captcha" <?php if(form_error("captcha")){echo "autofocus";} ?>>
            <h5 class="text-danger" style="font-size: 12px"><?php echo form_error("captcha"); ?></h5>
          </div> -->
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="<?php echo base_url().'index.php/adminPanel';?>" ><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url();?>assets/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>