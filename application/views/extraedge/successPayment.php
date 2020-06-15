<!DOCTYPE html>
<html lang="en">
<head>
  <title>New-Era School</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css.map">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!------ Include the above in your HEAD tag ---------->

<style>
body
{
font-family: 'Roboto', sans-serif;
}
.asteriskField
{
color:red;
padding:5px;
}
</style>
</head>
<body>

<div class="container" >    
    <div id="printarea" style=" margin-top:30px" class="mainbox col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
    	<div align="center">
    	   <img src="<?php echo base_url();?>assets/img/logo.jpg" width="80px"/>
    	   <h3><strong>New-Era School</strong></h3>
    	   <br/>
    	</div>
      <div align="center">
         <h4><strong>Online Application Form Submission doesn't confirm the candidates admission in the school.</strong></h4>
         <br/>
      </div>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="50%">Application ID :</td>
            <td><?php echo $result_applicationId;?></td>
          </tr>
          <tr>
            <td>Student Name :</td>
            <td><?php echo $result_studentName;?></td>
          </tr>
          <tr>
            <td>DOB :</td>
            <td><?php echo $result_dob;?></td>
          </tr>
          <tr>
            <td>Payment For :</td>
            <td> Online Application Form. </td>
          </tr>
          <tr>
            <td>Payment Amount :</td>
            <td>Rs 210.00</td>
          </tr>
          <tr>
            <td>Payment Status :</td>
            <td><?php echo $result_payment_status;?></td>
          </tr>
        </tbody>
      </table>  

    </div>
</div>
<div align="center">
  <div>
    <b style="color:red;">Please print or download the Application Details for future reference.</b> 
    <br>
    <b style="color:red;">Application Id will be require for admission process.</b> 
  </div>
  <br><br>
  <button type="button" class="btn btn-primary" id="printbtn" onclick="PrintPage()">Print</button>
</div>

</body>
</html>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/js/common.js"></script>
<script type="text/javascript">
$("#printbtn").click(function () {
    //Hide all other elements other than printarea.
    $("#printarea").show();
    window.print();
});
</script>

