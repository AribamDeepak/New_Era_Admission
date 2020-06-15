
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> JOB</h1><br>
      <p class="bs-component">  
              <button class="btn btn-sm btn-success" type="button" onclick="loadJobNewForm()">New</button>
          </p>
        </div>
      </div>
      <div class="row" id="job_formBody"></div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div id="AdminJob-tbl" class="tile-body">
              
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php $this->load->view('admin/global/footer');?>


    <script type="text/javascript">
    function loadJob()
    { 
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadJob'; ?>",
        cache: false,  
        crossDomain: true,
        xhrFields: { withCredentials: true }, 
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#AdminJob-tbl').html(response.html);
            var dataTable = $('#sampleTable').DataTable({  
                     // "processing":true,  
                     // "serverSide":true,  
                     // "order":[],  
                     // "ajax":{  
                     //      url:"<?php echo site_url() . 'index.php/Table_server/fetch_Job'; ?>",  
                     //      type:"POST"  
                     // },  
                     "columnDefs":[  
                          {  
                               "targets":[0,4],  
                               "orderable":false,  
                          },  
                     ],  
                     // "createdRow": function (row, data, index) {
                     //      var info = dataTable.page.info();
                     //      $('td', row).eq(0).html(index + 1 + info.page * info.length);
                     //  },
                }); 
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
    
    loadJob(); 

    function loadJobNewForm()
    { 
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadJobNewForm'; ?>",
        cache: false,   
        crossDomain: true,
        xhrFields: { withCredentials: true },
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#job_formBody').html(response.html);
            // FOR DATEPICKER
                     $('#AdminJob_DOB').datepicker({
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

    function addJob(){ 
        if ($('#job_id_txt').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Job Id is mandatory !');
            $('#job_id_txt').focus();
            return;
        }
        if ($('#job_name_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Job Name is mandatory!');
            $('#job_name_txt').focus();
            return;
        }  
        if ($('#client_name_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Client Name is mandatory!');
            $('#client_name_txt').focus();
            return;
        }  
        if ($('#startDate_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Password is mandatory!');
            $('#startDate_txt').focus();
            return;
        }

        var formData = $('form#JobForms').serializeObject();
        var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/addJob'; ?>",
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
           $('#job_formBody').empty();
           loadJob();
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

    function editJob($btn){  
      $reqestId =  $btn.val(); 
      StartInsideLoading();
      $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/editJob'; ?>",
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
                    $('#job_formBody').html(response.html);
                     $(window).scrollTop(0);
                     // FOR DATEPICKER
                     $('#AdminJob_DOB').datepicker({
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
    function removeJobform(){ 
      $('#job_formBody').empty();
    }
    function updateJob(){  
        if ($('#job_id_prim_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Please try again later !');
            return;
        } 
       if ($('#job_id_txt').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Job Id is mandatory !');
            $('#job_id_txt').focus();
            return;
        }
        if ($('#job_name_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Job Name is mandatory!');
            $('#job_name_txt').focus();
            return;
        }  
        if ($('#client_name_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Client Name is mandatory!');
            $('#client_name_txt').focus();
            return;
        }  
        if ($('#startDate_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Password is mandatory!');
            $('#startDate_txt').focus();
            return;
        }

        var formData = $('form#JobFormsUpdate').serializeObject();
        var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/updateJob'; ?>",
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
               $('#job_formBody').empty();
               loadJob();
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
    function deleteJob(){  

       // Checking all AdminJob data are deleted
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
    //  var url = '<?php echo site_url();?>index.php/Data_controller/RemoveAdminJob';
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
            url: "<?php echo site_url() . 'index.php/Data_controller/RemoveJob'; ?>",
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
                 loadJob();
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

    </script>
