<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        <!--
		<li><a id="dashboard" class="app-menu__item active" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/dashboardNavigation'; ?>","#dashboard");'><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
		-->
		<li><a id="dashboard" class="app-menu__item active" href='<?php echo base_url();?>admin' ><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
		<!--
        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="user_admin" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/userEmployees'; ?>","#user_admin");'><i class="app-menu__icon fa fa-users "></i><span class="app-menu__label">Admission</span></a></li>
        <?php } ?>
		-->

<!--         <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="user_client" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/userClients'; ?>","#user_client");'><i class="app-menu__icon fa fa-user "></i><span class="app-menu__label">Cleint Management</span></a></li>
        <?php } ?>

        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="job" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/navJob'; ?>","#job");'><i class="app-menu__icon fa fa-tasks "></i><span class="app-menu__label">Admin Job</span></a></li>
        <?php } ?>

        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="home" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/home'; ?>","#home");'><i class="app-menu__icon fa fa-home "></i><span class="app-menu__label">Home</span></a></li>
        <?php } ?> 

        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="aboutUs" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/aboutUs'; ?>","#aboutUs");'><i class="app-menu__icon fa fa-indent "></i><span class="app-menu__label">About Us</span></a></li>
        <?php } ?>

        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="gallery" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/gallery'; ?>","#gallery");'><i class="app-menu__icon fa fa-picture-o "></i><span class="app-menu__label">Gallery</span></a></li>
        <?php } ?>

        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="solution" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/solution'; ?>","#solution");'><i class="app-menu__icon fa fa-gears "></i><span class="app-menu__label">Solution</span></a></li>
        <?php } ?>

        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="career" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/career'; ?>","#career");'><i class="app-menu__icon fa fa-graduation-cap "></i><span class="app-menu__label">Career</span></a></li>
        <?php } ?> 

        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="resume" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/resume'; ?>","#resume");'><i class="app-menu__icon fa fa-file "></i><span class="app-menu__label">Resume</span></a></li>
        <?php } ?> 

        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="contactUs" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/contactUs'; ?>","#contactUs");'><i class="app-menu__icon fa fa-address-card "></i><span class="app-menu__label">Contact Us</span></a></li>
        <?php } ?>

        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="testimonial" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/testimonial'; ?>","#testimonial");'><i class="app-menu__icon fa fa-cubes "></i><span class="app-menu__label">Testimonial</span></a></li>
        <?php } ?>

        <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="subscribe" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/subscribe'; ?>","#subscribe");'><i class="app-menu__icon fa fa-envelope "></i><span class="app-menu__label">Subscribe Us</span></a></li>
        <?php } ?> 


       <?php if($this->session->userdata('userrole') === 'admin') { ?>
        <li><a id="fileUpload" class="app-menu__item" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'index.php/Navigation/fileUpload'; ?>","#fileUpload");'><i class="app-menu__icon fa fa-file-excel-o "></i><span class="app-menu__label">Report</span></a></li>
        <?php } ?>  -->

      </ul>
    </aside>

    <!-- for displaying loading image -->
    <div id="loading-dimpage" class="loading-dimpage"></div>
    <div class="loading-loadergif"></div>
    <!-- displaying loader image ends here    -->

    <script type="text/javascript">

  function StartInsideLoading(){ 
	    $('.loading-dimpage').show();
	    $('.loading-loadergif').show();
	}
	function StopInsideLoading(){
	    $('.loading-dimpage').hide();
	    $('.loading-loadergif').hide();
	}	

  function MainMenuNavigation(url,menuId){ 
  //   var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>'; console.log(csrf_token); return false;
  	
  $.ajax({
    type: "post",
    url: url,
  //  data: {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
    cache: true, 
    crossDomain: true,
    xhrFields: { withCredentials: true },
    dataType: 'json', 
    beforeSend: function() {
        StartInsideLoading();
    },
    success: function(response){  
    try{  
      if (response.success)
         {   
         	$('#body_container').empty().append(response.html);
		      $('.app-menu__item').removeClass('active');
            $(menuId).addClass('active'); 
         } else
         { 
             SetWarningMessageBox('warning', response.msg);
         }
      
     }catch(e) {  
        SetWarningMessageBox('warning', e);
      } 
    },
    error: function(){      
      SetWarningMessageBox('warning', 'Error while request..');
    },
    complete: function(data) {
      StopInsideLoading();
    }
   });
  }

  function UserResetPasswordform(url){ 
  StartInsideLoading(); 
  $.ajax({
    type: "post",
    url: url,
    crossDomain: true,
    xhrFields: { withCredentials: true }, 
    cache: false,   
    dataType: 'json', 
    beforeSend: function() {
        StartInsideLoading();
    },
    success: function(response){  
    try{  
      if (response.success)
         {   
          $('#body_container').empty().append(response.html);
         } else
         { 
             SetWarningMessageBox('warning', response.msg);
         }
      
     }catch(e) {  
        SetWarningMessageBox('warning', e);
      } 
    },
    error: function(){      
      SetWarningMessageBox('warning', 'Error while request..');
    },
    complete: function(data) {
      StopInsideLoading();
    }
   });
  }

    
      </script>