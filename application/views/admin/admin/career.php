
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Career</h1><br>
      <p class="bs-component">  
              <button class="btn btn-sm btn-success" type="button" onclick="loadjobListNewForm()">New career Job</button>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="row" id="career_formBody"></div>
        </div>
        <div class="col-md-6">
            <div class="row" id="jobList_formBody"></div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div id="jobList_tbl" class="tile-body">
              
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php $this->load->view('admin/global/footer');?>
    <script type="text/javascript">

    function loadCareerForm(){   
      StartInsideLoading();
      $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/loadCareerForm'; ?>",
          cache: false,  
          crossDomain: true,
          xhrFields: { withCredentials: true },  
          // data: {reqId:$reqestId},
          dataType: 'json',
          success: function(response){   
          try{     
             if (response.success)
                 {  
                    $('#career_formBody').html(response.html);
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
    } 

    loadCareerForm();

    function updateCareer(){  

        if ($('#career_title_txt').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Career title is mandatory !');
            $('#career_title_txt').focus();
            return;
        }
        if ($('#career_desc_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Description is mandatory!');
            $('#career_desc_txt').focus();
            return;
        }  
        
        var formData = $('form#careerForm').serializeObject();
        var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/updateCareer'; ?>",
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
               loadCareerForm();
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

    <script type="text/javascript">
    function loadjobList()
    { 
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadjobList'; ?>",
        cache: false,  
        crossDomain: true,
        xhrFields: { withCredentials: true }, 
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#jobList_tbl').html(response.html);
            var dataTable = $('#sampleTable').DataTable({  
                     // "processing":true,  
                     // "serverSide":true,  
                     // "order":[],  
                     // "ajax":{  
                     //      url:"<?php echo site_url() . 'index.php/Table_server/fetch_Job_list'; ?>",  
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
    
    loadjobList(); 

    function loadjobListNewForm()
    { 
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadjobListNewForm'; ?>",
        cache: false,   
        crossDomain: true,
        xhrFields: { withCredentials: true },
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
                $('#jobList_formBody').html(response.html);
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

    function addJobList(){ 
        if ($('#job_title_txt').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Job Title is mandatory !');
            $('#job_title_txt').focus();
            return;
        }
        if ($('#job_loc_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Job Location is mandatory!');
            $('#job_loc_txt').focus();
            return;
        }  
        if ($('#keySkill_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Key Skill Set is mandatory!');
            $('#keySkill_txt').focus();
            return;
        }  
        if ($('#exp_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Work Experience is mandatory!');
            $('#exp_txt').focuexp_txts();
            return;
        }

        var formData = $('form#JobListForms').serializeObject();
        var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/addJobList'; ?>",
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
           $('#jobList_formBody').empty();
           loadjobList();
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

    function editJobList($btn){  
      $reqestId =  $btn.val(); 
      StartInsideLoading();
      $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/editJobList'; ?>",
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
                    $('#jobList_formBody').html(response.html);
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
    } 
    function removeJobListform(){ 
      $('#jobList_formBody').empty();
    }
    function updateJobList(){  
        if ($('#job_list_id_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Please try again later !');
            return;
        } 
        if ($('#job_title_txt').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Job Title is mandatory !');
            $('#job_title_txt').focus();
            return;
        }
        if ($('#job_loc_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Job Location is mandatory!');
            $('#job_loc_txt').focus();
            return;
        }  
        if ($('#keySkill_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Key Skill Set is mandatory!');
            $('#keySkill_txt').focus();
            return;
        }  
        if ($('#exp_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Work Experience is mandatory!');
            $('#exp_txt').focuexp_txts();
            return;
        }

        var formData = $('form#JobListForms').serializeObject();
        var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/updateJobList'; ?>",
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
               $('#jobList_formBody').empty();
               loadjobList();
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
    function deleteJobList(){  

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
            url: "<?php echo site_url() . 'index.php/Data_controller/deleteJobList'; ?>",
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
                 loadjobList();
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
