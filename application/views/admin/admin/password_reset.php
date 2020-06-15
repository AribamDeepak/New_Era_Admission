<?php if($this->session->userdata('loginStatus') == false)
{
    redirect(site_url());
}
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> User Reset Password</h1><br>
        </div>
      </div>
      <div class="row">
        <div class="clearix"></div>
        <div class="col-md-8">
          <div class="tile user-settings">
                <h4 class="line-head">Change New Password  </h4><br>
            <div class="tile-body">
              <form class="form-horizontal" id="userAdminResetForm">
                <div class="form-group row">
                  <label class="control-label col-md-3">Old Password</label>
                  <div class="col-md-6">
                    <input class="form-control" id="Old_Password" name="OldPassword" type="text" placeholder="Enter Old Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">New Password</label>
                  <div class="col-md-6">
                    <input class="form-control" id="New_Password" name="NewPassword" type="password" placeholder="Enter New Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Confirm New Password</label>
                  <div class="col-md-6">
                    <input class="form-control" id="New_Confirm_Password" name="NewConfirmPassword" type="password" placeholder="Enter New Confirm Password">
                  </div>
                </div>
              </form>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button onclick="ResetUserAccount()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Change</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href='javascript:;' onclick='MainMenuNavigation("<?php echo site_url() . 'Navigation/dashboardNavigation'; ?>","#dashboard");'><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
    </main>
	  <?php $this->load->view('admin/global/footer');?>


    <script type="text/javascript">

     
      
    function ResetUserAccount(){  
        if ($('#Old_Password').val() == '') { 
            SetWarningMessageBox('warning', 'Please enter Old Password !');
            $('#Old_Password').focus();
            return;
        }
        if ($('#New_Password').val() == '') {
            SetWarningMessageBox('warning', 'Please enter New Password!');
            $('#New_Password').focus();
            return;
        }
        if ($('#New_Confirm_Password').val() == '') {
            SetWarningMessageBox('warning', 'Please enter Confirm Password!');
            $('#New_Confirm_Password').focus();
            return;
        }
        if ($('#New_Confirm_Password').val() != $('#New_Password').val()) {
            SetWarningMessageBox('warning', 'Confirm Password does not match with New Password!');
            $('#New_Confirm_Password').focus();
            return;
        }
        
        var formData = $('form#userAdminResetForm').serializeObject();
        var dataString = JSON.stringify(formData);
        StartInsideLoading();
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/userAdminReset'; ?>",
      cache: false,  
      crossDomain: true,
      xhrFields: { withCredentials: true },  
      data: dataString,
      contentType: "application/json; charset=utf-8",
      dataType: 'json',
      success: function(response){   
      try{     
         if (response.success)
             { 
               SetSucessMessageBox('Success', response.msg);
               $('#userAdminResetForm')[0].reset();
               $('#sampleTable').DataTable();
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
    
    // function removeMasterCatCreate(){ 
    //   $('#MasCatformColap').collapse("hide"); 
    //        $('#MasCatForms')[0].reset();
    // }


    </script>
