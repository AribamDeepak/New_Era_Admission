
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> About Us</h1><br>
 <!--      <p class="bs-component">  
              <button class="btn btn-sm btn-success" type="button" onclick="loadAboutUsNewForm()">New</button>
          </p> -->
        </div>
      </div>
      <div class="row" id="aboutUs_formBody"></div>
<!--       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div id="aboutUs_tbl" class="tile-body">
              
            </div>
          </div>
        </div>
      </div> -->
    </main>
    <?php $this->load->view('admin/global/footer');?>


    <script type="text/javascript">

    function editAboutUs(){   
      StartInsideLoading();
      $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/editAboutUs'; ?>",
          cache: false,  
          crossDomain: true,
          xhrFields: { withCredentials: true },  
          // data: {reqId:$reqestId},
          dataType: 'json',
          success: function(response){   
          try{     
           //  var result = jQuery.parseJSON(data);
             if (response.success)
                 {  
                    $('#aboutUs_formBody').html(response.html);
                     $(window).scrollTop(0);
                     // FOR DATEPICKER
                     // $('#AdminJob_DOB').datepicker({
                     //            format: "dd-mm-yyyy",
                     //            autoclose: true,  
                     //            todayHighlight: true
                     //          });
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

    editAboutUs();

    function removeAboutUsform(){ 
      $('#aboutUs_formBody').empty();
    }

    function updateAboutUs(){  

        if ($('#about_txt').val().trim() == '') { 
            SetWarningMessageBox('warning', 'About Us Description is mandatory !');
            $('#about_txt').focus();
            return;
        }
        if ($('#mission_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Mission Description is mandatory!');
            $('#mission_txt').focus();
            return;
        }  
        

        var formData = $('form#AboutUsForm').serializeObject();
        var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/updateAboutUs'; ?>",
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
               // $('#aboutUs_formBody').empty();
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
   

    </script>
