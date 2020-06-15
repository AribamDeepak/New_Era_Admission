<!DOCTYPE html>
<html lang="en">
<head>
  <title>New-Era School</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.mask.js"></script>
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

@media only screen and (max-width: 320px) {
    #logoImage { 
        height: 140px; 
    }
}
</style>
</head>
<body>

<div class="container">  
      <div align="center" class="mainbox col-md-8 col-md-offset-2 col-sm-12 " style="padding-right:0px; padding-left:0px;">
         <img class="img-responsive"  id="logoImage" src="<?php echo base_url();?>assets/img/neweralogo.jpg" />
      </div>  
    <div id="signupbox" style=" margin-top:10px" class="mainbox col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
        <div id=bodyInstruction>
            <div align="center">
                <h4><b>GENERAL INSTRUCTIONS FOR FILLING UP OF THE ONLINE APPLICATION FORM AND ONLINE FEE PAYMENT</b></h4>
            </div>
            <br>
            <ol style="font-size: 14px;font-family: sans-serif;">
              <li>The candidates are required to upload an image of recent passport size photograph, image to be uploaded should be only in *.jpg,*.png format of size not exceeding 1MB.</li>
              <li>AADHAR is compulsory.</li>
              <li>Fill up the application form, make sure all the information are correct and true, School will not be responsible for any consequences arising out of furnishing incorrect and incomplete details in the application or omission to provide the required details in the application form.</li>
              <li>After successful submitted form, candidate will get a confirmation page with User ID which will be required for reference in future for physical admission in school.</li>
              <li>Candidates should bring this User ID whenever called for Admission either in soft or hard copy.</li>
              <li>Online Application Form Submission doesn’t confirm the candidate’s admission in the school; candidates will be shortlisted and informed later for Final Admission.</li>
              <li>Every candidates should be come in the counseling session compulsorily in the scheduled given by the school.</li>
              <li>All the candidates must come with Parents (Father/Mother/Guardians).</li>
              <li>Those who fail to come in the Counseling Session may not be permitted for admission.</li>
              <li>Original Educational Qualification Certificates should be brought during the Counseling Session.</li>
              
            </ol> 

            <form style="margin-bottom: 100px;">
                <label class="container ">
                  <input type="checkbox" name="acceptTermCheck" id="acceptTermCheck">
                  <span class="checkmark" style="color: red;">&nbsp &nbsp  I accept and read the above instruction and condition. </span>
                </label>
                <br>
                <div class="mainbox col-md-12 text-center">
                    <button type="button" class="btn btn-primary" onclick="LoadAdmissionFrom()">Register Now</button>
                </div>
              
            </form>
        </div>  
    </div>
</div>
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
</body>
</html>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/js/common.js"></script>
<script>
function LoadAdmissionFrom(){   
    if($('#acceptTermCheck').prop("checked") == true){
        StartInsideLoading();
        $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Admission_controller/LoadAdmissionFrom'; ?>",
          cache: false,  
          crossDomain: true,
          xhrFields: { withCredentials: true },  
          dataType: 'json',
          success: function(response){   
          try{     
             if (response.success)
                 {  
                    $('#bodyInstruction').html(response.html);
                     $(window).scrollTop(0);
                 } else
                 { 
                     SetWarningMessageBox('warning', response.msg);
                 }
                 StopInsideLoading();
          }catch(e) {  
            SetWarningMessageBox('warning', e);
            StopInsideLoading();
          }  
          },
          error: function(){      
            SetWarningMessageBox('warning', 'Error while request..');
            StopInsideLoading();
          }
         });
    }else{
        SetWarningMessageBox('warning',"Please click the I accept button to proceed.");
    }
    return;
    
} 
	
function addResgistrationFrom(){ 
    if ($('#student_name').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Student name is required !');
        $('#student_name').focus();
        return;
    }
    if ($('#dob').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Date of birth name is required !');
        $('#dob').focus();
        return;
    }
    if ($('#religion').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Religion is required !');
        $('#religion').focus();
        return;
    }
    if ($('#caste').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Caste Category is required !');
        $('#caste').focus();
        return;
    }
    if ($('#father_name').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Father name is required !');
        $('#father_name').focus();
        return;
    }
    if ($('#mother_name').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Mother name is required !');
        $('#mother_name').focus();
        return;
    }
    if ($('#permanent_address').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Permanent Address In Full is required !');
        $('#permanent_address').focus();
        return;
    }
    if ($('#permanent_address_po').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Permanent Address Post Office !');
        $('#permanent_address_po').focus();
        return;
    }
    if ($('#permanent_address_ps').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Permanent Address Police Station !');
        $('#permanent_address_ps').focus();
        return;
    }
    if ($('#permanent_pin').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Permanent Address Pin is required !');
        $('#permanent_pin').focus();
        return;
    }
    if ($('#whatapps_no').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Contact Number is required !');
        $('#whatapps_no').focus();
        return;
    }
    if ($('#aadhaar_number').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Aadhaar number name is required !');
        $('#aadhaar_number').focus();
        return;
    }
    if ($('#blood_group').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Blood group is required !');
        $('#blood_group').focus();
        return;
    }
    if ($('#x_pass_board').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Class X Passed Board is required !');
        $('#x_pass_board').focus();
        return;
    }
    if ($('#x_pass_school').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Passed out School Name is required !');
        $('#x_pass_school').focus();
        return;
    }
    if ($('#roll_no').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Roll number is required !');
        $('#roll_no').focus();
        return;
    }
    if ($('#x_passed_year').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Year of Passed class X is required !');
        $('#x_passed_year').focus();
        return;
    }
    if ($('#x_division').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Class X Division is required !');
        $('#x_division').focus();
        return;
    }
    if ($('#percentage').val().trim() == '') { 
        SetWarningMessageBox('warning', 'X Board Percentage (%) / Grade Point is required !');
        $('#percentage').focus();
        return;
    }
    if ($('#x_subject_offer').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Class X Subject offers is required !');
        $('#x_subject_offer').focus();
        return;
    }

    if($('#id_terms').prop("checked") == false){
        SetWarningMessageBox('warning', 'Plese tick mark the Candidate declaration !');
        $('#id_terms').focus();
        return;
    }
    if($('#id_terms2').prop("checked") == false){
        SetWarningMessageBox('warning', 'Plese tick mark the Parent/Guardian declaration !');
        $('#id_terms2').focus();
        return;
    }

    if ($('#files_photo').val().trim() == '') {
        SetWarningMessageBox('warning', 'Select Student Passport Photo Please !');
        $('#files_photo').focus();
        return;
    }

    if ($('#files_marksheet').val().trim() == '') {
        SetWarningMessageBox('warning', 'Select One self-attested copy of Marksheet of HSLCE Please !');
        $('#files_marksheet').focus();
        return;
    }

    if ($('#files_admitcard').val().trim() == '') {
        SetWarningMessageBox('warning', 'Select One self-attested copy of Admit Card of HSLCE Please !');
        $('#files_admitcard').focus();
        return;
    }

    var dataString = new FormData($('#application_form')[0]);

    StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Admission_controller/addResgistrationFrom'; ?>",  
      data: dataString,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response){   
          try{     
             if (response.success)
                 { 
                    $('#bodyInstruction').html(response.html);
                     $(window).scrollTop(0);
                    // alert('Success', response.msg);

                 } else
                 { 
                     SetWarningMessageBox('warning', response.msg);
                 }
              StopInsideLoading();   
          }catch(e) {  
                SetWarningMessageBox('warning', e);
                StopInsideLoading();
          }  
          },
          error: function(){      
            SetWarningMessageBox('warning', 'Error while request..');
            StopInsideLoading();
          }
    });
}

function StartInsideLoading()
{
$('#loading').show();
}
function StopInsideLoading()
{
$('#loading').hide(); 
}
   
</script>
