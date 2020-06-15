
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Employees User</h1><br>
      <p class="bs-component">  
              <button class="btn btn-sm btn-success" type="button" onclick="loadEmpUserNewForm()">New</button>
          </p>
        </div>
      </div>
      <div class="row" id="AdminUser_formBody"></div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div id="AdminUser-tbl" class="tile-body">
              
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php $this->load->view('admin/global/footer');?>


    <script type="text/javascript">
    function loadEmployeeUser()
    { 
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadEmployeeUser'; ?>",
        cache: false,  
        crossDomain: true,
        xhrFields: { withCredentials: true }, 
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#AdminUser-tbl').html(response.html);
            
           
            var dataTable = $('#sampleTable').DataTable({  
                     // "processing":true,  
                     // "serverSide":true,  
                     // "order":[],  
                     // "ajax":{  
                     //      url:"<?php echo site_url() . 'index.php/Table_server/fetch_EmpUser'; ?>",  
                     //      type:"POST"  
                     // },  
                     "columnDefs":[  
                          {  
                               "targets":[0,5],  
                               "orderable":false,  
                          },  
                     ],  
                     // "createdRow": function (row, data, index) {
                     //      var info = dataTable.page.info();
                     //      $('td', row).eq(0).html(index + 1 + info.page * info.length);
                     //  },
                }); 
                
				//
                $('#sampleTable thead tr').clone(true).appendTo( '#sampleTable thead' );
                $('#sampleTable thead tr:eq(1) th').each( function (i) {
                    var title = $(this).text();
                    $(this).attr('class','');
                    
                    if(title.includes("Delete")){
                      $(this).html( '' );   
                    }else
                    { 
                        $(this).html( '<input style="width:100%;padding: 5px;border-radius: 5px;border: 1px solid #e8e8e8;" type="text" placeholder="'+title+'" />' );
                    }
                
                    $( 'input', this ).on( 'keyup change', function () {
                        if ( dataTable.column(i).search() !== this.value ) {
                            dataTable
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            //
               						
                
                
             } else
             { 
                 SetWarningMessageBox('warning', response.msg);
                 //StopInsideLoading();
             }
          
         }catch(e) {  
            SetWarningMessageBox('warning', e);
          } 
        },
        error: function(){      
          SetWarningMessageBox('warning', 'Error while request..');
        }
       });
    }
    
    loadEmployeeUser(); 

    function loadEmpUserNewForm()
    { 
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadEmpUserNewForm'; ?>",
        cache: false,   
        crossDomain: true,
        xhrFields: { withCredentials: true },
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#AdminUser_formBody').html(response.html);
            // FOR DATEPICKER
                     $('#AdminUser_DOB').datepicker({
                                format: "dd-mm-yyyy",
                                autoclose: true,  
                                todayHighlight: true
                              });
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

    function addEmpUser(){ 
        if ($('#AdminUser_Name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'User Name is mandatory !');
            $('#AdminUser_Name').focus();
            return;
        }
        if ($('#AdminUser_Email').val().trim() == '') {
            SetWarningMessageBox('warning', 'Email is mandatory!');
            $('#AdminUser_Email').focus();
            return;
        }  
        if(IsEmail($('#AdminUser_Email').val())==false){
            SetWarningMessageBox('warning', 'Invalid Email address!');
            $('#AdminUser_Email').focus();
            return ;
       }

        if ($('#password_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Password is mandatory!');
            $('#password_txt').focus();
            return;
        }

        var formData = $('form#AdminUserForms').serializeObject();
        var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/addEmpUser'; ?>",
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
           $('#AdminUser_formBody').empty();
           loadEmployeeUser();
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

    function editEmpUser($btn){  
      $reqestId =  $btn.val(); 
      StartInsideLoading();
      $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/editEmpUser'; ?>",
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
                    $('#AdminUser_formBody').html(response.html);
                     $(window).scrollTop(0);
                     // FOR DATEPICKER
                     $('#AdminUser_DOB').datepicker({
                                format: "dd-mm-yyyy",
                                autoclose: true,  
                                todayHighlight: true
                              });
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
    function removeAdminUserform(){ 
      $('#AdminUser_formBody').empty();
    }
    function updateEmpUser(){  
        if ($('#txt_AdminUser_id').val().trim() == '') {
            SetWarningMessageBox('warning', 'Please try again later !');
            return;
        } 
       if ($('#AdminUser_Name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'User Name is mandatory !');
            $('#AdminUser_Name').focus();
            return;
        }
        if ($('#AdminUser_Email').val().trim() == '') {
            SetWarningMessageBox('warning', 'Email is mandatory!');
            $('#AdminUser_Email').focus();
            return;
        }  

        var formData = $('form#AdminUserFormsUpdate').serializeObject();
        var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/updateEmpUser'; ?>",
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
               $('#AdminUser_formBody').empty();
               loadEmployeeUser();
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
    function deleteAdminUser(){  

       // Checking all AdminUser data are deleted
      if (!$( ".checkbox" ).length) {
        SetWarningMessageBox('warning', 'No Item left  to Delete !!!'); 
        return;
      }
      
      var selected_value = []; // initialize empty array 
      if ($('.checkbox:checked').length == 0 )
        {
        SetWarningMessageBox('warning', 'Please select Item to Delete !!!');
        return;
      } else {
        $(".checkbox:checked").each(function(){
                selected_value.push($(this).val());
            });
      } 
    //  var url = '<?php echo site_url();?>index.php/Data_controller/RemoveAdminUser';
      var dataString = JSON.stringify(selected_value);

    swal({
      title: "Are you sure?",
      //text: "You will not be able to recover this imaginary file!",
      //type: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, Delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: true,
      closeOnCancel: true
      }, function(isConfirm) {
      if (isConfirm) {
        StartInsideLoading();
          $.ajax({
            type: "post",
            url: "<?php echo site_url() . 'index.php/Data_controller/RemoveAdminUser'; ?>",
            cache: false,  
            crossDomain: true,
            xhrFields: { withCredentials: true },  
            data: {dataArr:dataString},
            dataType: 'json',
            success: function(response){   
            try{     
             //  var result = jQuery.parseJSON(data);
               if (response.success)
                   { 
                 SetSucessMessageBox('Success', response.msg);
                 loadEmployeeUser();
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
     }); 
    } 

    // function AdminUserActiveMode($UId,$Mval)
    // {
    //   if($Mval == 1){
    //       $messageVal = 'Deactivate User';
    //     }
    //   if($Mval == 0){
    //      $messageVal = 'Activate User';
    //     } 
    //   swal({
    //   title: "Are you sure?",
    //   //text: "You will not be able to recover this imaginary file!",
    //   //type: "warning",
    //   showCancelButton: true,
    //   confirmButtonText: $messageVal,
    //   cancelButtonText: "No, cancel plx!",
    //   closeOnConfirm: true,
    //   closeOnCancel: true
    //   }, function(isConfirm) {
    //   if (isConfirm) {
    //     StartInsideLoading();
    //   $.ajax({
    //     type: "post",
    //     url: "<?php echo site_url() . 'index.php/Data_controller/AdminUserActiveMode'; ?>",
    //     cache: false,  
    //     crossDomain: true,
    //     xhrFields: { withCredentials: true }, 
    //     data: {UID:$UId,ModeVal:$Mval}, 
    //     dataType: 'json', 
    //     success: function(response){ 
    //     try{  
    //       if (response.success)
    //          { 
    //           SetSucessMessageBox('Success', response.msg);
    //           loadAdminUser();
    //          } else
    //          { 
    //              SetWarningMessageBox('warning', response.msg);
    //          }
    //       StopInsideLoading();
    //      }catch(e) {  
    //         SetWarningMessageBox('warning', e);
    //         StopInsideLoading();
    //       } 
    //     },
    //     error: function(){      
    //       SetWarningMessageBox('warning', 'Error while request..');
    //       StopInsideLoading();
    //     }
    //    });
    //       }
    //  });

    // }
    
 

    </script>
