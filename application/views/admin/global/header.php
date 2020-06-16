<?php if($this->session->userdata('loginStatus') == false && $this->session->userdata('userrole') != 'admin')
{
    redirect(site_url().'adminPanel');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="New-Era School">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <!-- Open Graph Meta-->
    <title>New-Era School Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.dataTables.min.css">
    
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/daterangepicker.css">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link href="<?php echo base_url();?>assets/css/datatable_button_ccs.css" rel="stylesheet">
	
  </head>
  <body class="app sidebar-mini rtl" id="b_ody" style="font-size:12px;">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#" style="    font-family: verdana !important;">NEW-ERA</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" id="show_id" style="color:white;cursor:pointer;" onclick="show_nav()" ></a>
	  <a class="app-sidebar__toggle" style="color:white;cursor:pointer;" id="hide_id" onclick="hide_nav()" ></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
      <!--   <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li> -->
        
		<!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right" style="width:180px;">
            <!-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li> -->
            <li><a class="dropdown-item" href="#" style="cursor: default; text-transform: capitalize;" ><i class="fa fa-user fa-lg" ></i> User (<?php echo $this->session->userdata('username') ?>) </a></li>
            <li><a class="dropdown-item" href='javascript:;' onclick='UserResetPasswordform("<?php echo site_url() . 'Navigation/userResetPasswordform'; ?>");'><i class="fa fa-lock fa-lg"></i> Change Password</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url()?>login/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>