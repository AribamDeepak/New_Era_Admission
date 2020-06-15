
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Solution</h1><br>
      <p class="bs-component">  
              <button class="btn btn-sm btn-success" type="button" onclick="loadSolutionNewForm()">New</button>
          </p>
        </div>
      </div>
      <div class="row" id="Solution_formBody"></div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div id="solution_tbl" class="tile-body">
              
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php $this->load->view('admin/global/footer');?>


    <script type="text/javascript">
    function loadSolution()
    { 
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadSolution'; ?>",
        cache: false,  
        crossDomain: true,
        xhrFields: { withCredentials: true }, 
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#solution_tbl').html(response.html);
            var dataTable = $('#sampleTable').DataTable({  
                     // "processing":true,  
                     // "serverSide":true,  
                     // "order":[],  
                     // "ajax":{  
                     //      url:"<?php echo site_url() . 'index.php/Table_server/fetch_Solution'; ?>",  
                     //      type:"POST"  
                     // },  
                     "columnDefs":[  
                          {  
                               "targets":[0,3,4,5],  
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
                       if(title.includes("Disable") || title.includes("Icon")){
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
    
    loadSolution(); 

    function loadSolutionNewForm()
    { 
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadSolutionNewForm'; ?>",
        cache: false,   
        crossDomain: true,
        xhrFields: { withCredentials: true },
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#Solution_formBody').html(response.html);
            // FOR DATEPICKER
             $('#startDate_txt').datepicker({
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

    function addSolution(){ 
        if ($('#name_txt').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Heading is mandatory !');
            $('#name_txt').focus();
            return;
        }
        if ($('#sub_name_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Sub Heading is mandatory!');
            $('#sub_name_txt').focus();
            return;
        }  
        if ($('#desc_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Description is mandatory!');
            $('#desc_txt').focus();
            return;
        }  
        if ($('#file').val().trim() == '') {
            SetWarningMessageBox('warning', 'Select Picture Please !');
            $('#file').focus();
            return;
        }

        var dataString = new FormData($('#SolutionForms')[0]);

        // var formData = $('form#SolutionForms').serializeObject();
        // var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/addSolution'; ?>",
      // cache: false,   
      // crossDomain: true,
      // xhrFields: { withCredentials: true }, 
      data: dataString,
      // contentType: "application/json; charset=utf-8",
      contentType: false,
          processData: false,
      dataType: 'json',
      success: function(response){   
      try{     
         if (response.success)
             { 
           SetSucessMessageBox('Success', response.msg);
           $('#Solution_formBody').empty();
           loadSolution();
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

    function editSolution($btn){  
      $reqestId =  $btn.val(); 
      StartInsideLoading();
      $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/editSolution'; ?>",
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
                    $('#Solution_formBody').html(response.html);
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
    function removeSolutionform(){ 
      $('#Solution_formBody').empty();
    }
    function updateSolution(){  
        if ($('#solution_id_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Something went wrong. Please try again later !');
            return;
        }
        if ($('#name_txt').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Heading is mandatory !');
            $('#name_txt').focus();
            return;
        }
        if ($('#sub_name_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Sub Heading is mandatory!');
            $('#sub_name_txt').focus();
            return;
        }  
        if ($('#desc_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Description is mandatory!');
            $('#desc_txt').focus();
            return;
        }  
        

        // var formData = $('form#SolutionForms').serializeObject();
        // var dataString = JSON.stringify(formData);

        var dataString = new FormData($('#SolutionForms')[0]);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/updateSolution'; ?>",
      cache: false,  
      crossDomain: true,
      xhrFields: { withCredentials: true },  
      data: dataString,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response){   
      try{     
         if (response.success)
             { 
               SetSucessMessageBox('Success', response.msg);
               $('#Solution_formBody').empty();
               loadSolution();
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
    function deleteSolution(){  

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
            url: "<?php echo site_url() . 'index.php/Data_controller/deleteSolution'; ?>",
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
                 loadSolution();
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

    function enableSolution($btn){  
      $reqestId =  $btn.val();  

    swal({
      title: "Are you sure?",
      //text: "You will not be able to recover this imaginary file!",
      //type: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, Enable it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: true,
      closeOnCancel: true
      }, function(isConfirm) {
      if (isConfirm) {
        StartInsideLoading();
          $.ajax({
            type: "post",
            url: "<?php echo site_url() . 'index.php/Data_controller/enableSolution'; ?>",
            cache: false,  
            crossDomain: true,
            xhrFields: { withCredentials: true },  
            data: {dataId: $reqestId},
            dataType: 'json',
            success: function(response){   
            try{     
             //  var result = jQuery.parseJSON(data);
               if (response.success)
                   { 
                 SetSucessMessageBox('Success', response.msg);
                 loadSolution();
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
