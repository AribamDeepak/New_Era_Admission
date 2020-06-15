<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if($this->session->userdata('loginStatus') == false && $this->session->userdata('userrole') != 'employee'){
    redirect(site_url());
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>REPERIO | Employee</title>
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

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    <!-- Font-icon css-->
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
					<a class="navbar-brand" href="<?php echo site_url();?>"><img src="<?php echo base_url();?>assets/reperio/image/rep_white.svg" width="100%"> 
						<!-- <b style=" font-family: 'Poppins', sans-serif; color: #fff;">REPERIO</span></b> -->
					</a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="<?=site_url('login/logoutEmployee')?>"><i class="fa fa-power-off" aria-hidden="true" style="font-size: 1.5em;" ></i>&nbsp;&nbsp;Logout</a></li>
					</ul>
				</nav><!-- #nav-menu-container -->		    		
			</div>
		</div>
	</header><!-- #header -->

	<div class="limiter">
		<div class="container-loginClient">
	
			<div class="login-form">
				<div class="main-div1">
					<div class="panel">
						<div>
							 <!-- <img src="<?php echo base_url();?>assets/reperio/image/log.svg">  -->
							<span style="font-size: 2em;color: #f10101;" >Job Details</span>
						</div>
						<div class="container">
						  <div class="row">
						  	<!-- <div class="col-xs-3"></div> -->
						    <div class="col-xs-12">
						        <div id="jobTable">
								</div>
						    </div>
						    <!-- <div class="col-xs-3"></div> -->
						  </div>
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

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/dataTables.bootstrap.min.js"></script>

	<script src="<?php echo base_url();?>assets/reperio/js/bootstrap.min.js"></script>

<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/reperio/js/login.js"></script>

	<script type="text/javascript">
	
	var userId = '';	
	<?php if($this->session->userdata('userId') != ''){ ?>
		userId = '<?php echo $this->session->userdata('userId')?>';
	<?php } ?>
	function loadEmployeeJob(){  	
      $reqestId =  userId; 
      // StartInsideLoading(); alert(userId);
      $.ajax({		
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/loadEmployeeJob'; ?>",
          cache: false,  
          crossDomain: true,
          xhrFields: { withCredentials: true },  
          data: {reqId:$reqestId},
          dataType: 'json',
          success: function(response){   
          try{     
           //  var result = jQuery.parseJSON(data);
             if (response.success)
                 {  
                    $('#jobTable').html(response.html);
                    var dataTable = $('#sampleTable').DataTable({
                    	"columnDefs":[  
                          {  
                               "targets":[0,1,2,3,4,5,6,7,8],  
                               "orderable":false,  
                          },  
                     ]});
                     $(window).scrollTop(0);
                 } else
                 { 
                     alert(response.msg);
               
                 }
                 // StopInsideLoading();
          }catch(e) {  
            alert(e);
            // StopInsideLoading();
          }  
          },
          error: function(){      
            alert('Error while request..');
            // StopInsideLoading();
          }
         });
    }	
    loadEmployeeJob();
	</script>
</body>
</html>