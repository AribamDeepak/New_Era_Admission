<div style="    height: 100vh;
    width: 100%;
    background: rgba(255, 255, 255, 0.88);
    position: fixed;
    top: 0px;
    left: 0px;
    z-index: 9999999999;
    overflow: hidden;display:none;
	text-align: center;
    padding-top: 45vh;
	}" id="loading" >
	<img src="<?php echo base_url()?>assets/img/loading.gif" />

 </div>

  <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url();?>assets/js/plugins/pace.min.js"></script>
  <!-- Data table plugin-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/moment.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/daterangepicker.js"></script>
  <!-- Page specific javascripts--> 
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/ColReorderWithResize.js"></script>

	
	
	<!-- COL VISIBLE DATA TABLE  -->
		<script src="<?php echo base_url();?>assets/js/datatable_button_colvis.js"></script>
		<!-- DATATABLE BUTTONS DATA TABLE  -->
		<script src="<?php echo base_url();?>assets/js/datatable_buttons.js"></script>
		<!-- DATATABLE PDF MAKE DATA TABLE  -->
		<script src="<?php echo base_url();?>assets/js/datatable_pdf_make.js"></script>
		<!-- DATATABLE HTML5 BUTTONS TABLE  -->
		<script src="<?php echo base_url();?>assets/js/datatable_html5_button.js"></script>
		<!-- DATATABLE PDF FONT  -->
		<script src="<?php echo base_url();?>assets/js/datatable_pdf_font.js"></script>
		<!-- DATATABLE EXCEL BUTTON  -->
		<script src="<?php echo base_url();?>assets/js/datatable_excel_button_jszip.js"></script>	
		<!-- DATATABLE EXCEL BUTTON  -->

	
	
    
    <script src="<?php echo base_url();?>assets/js/service.js"></script>
    <script src="<?php echo base_url();?>assets/js/common.js"></script>

 <script>    
function show_nav()
{
	$('#b_ody').removeClass('sidenav-toggled')
	$('#show_id').hide();
	$('#hide_id').show();
	}
function hide_nav()
{
	$('#b_ody').addClass('sidenav-toggled')
	$('#show_id').show();
	$('#hide_id').hide();
}
	$('#show_id').hide();
	$('#hide_id').show(); 
	
	function StartInsideLoading()
	{
	$('#loading').show();
	}
	function StopInsideLoading()
	{
	$('#loading').hide();	
	}
	
</script>