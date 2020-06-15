
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Testimonial</h1><br>
      <p class="bs-component">  
              <button class="btn btn-sm btn-success" type="button" onclick="loadTestNewForm()">New</button>
          </p>
        </div>
      </div>
      <div class="row" id="testimonial_formBody"></div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div id="testimonial_tbl" class="tile-body">
              
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php $this->load->view('admin/global/footer');?>


    <script type="text/javascript">
    function loadTestimonial()
    { 
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadTestimonial'; ?>",
        cache: false,  
        crossDomain: true,
        xhrFields: { withCredentials: true }, 
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#testimonial_tbl').html(response.html);
            var dataTable = $('#sampleTable').DataTable({  
                     // "processing":true,  
                     // "serverSide":true,  
                     // "order":[],  
                     // "ajax":{  
                     //      url:"<?php echo site_url() . 'index.php/Table_server/fetch_Testimonial'; ?>",  
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
    
    loadTestimonial(); 

    function loadTestNewForm()
    { 
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadTestNewForm'; ?>",
        cache: false,   
        crossDomain: true,
        xhrFields: { withCredentials: true },
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#testimonial_formBody').html(response.html);
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

    function addTestimonial(){ 
        if ($('#name_txt').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Name is mandatory !');
            $('#name_txt').focus();
            return;
        }
        if ($('#star_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Star is mandatory!');
            $('#star_txt').focus();
            return;
        } /* 
        if ($('#tesDate_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Date is mandatory!');
            $('#tesDate_txt').focus();
            return;
        }
		*/
        if ($('#comment_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Password is mandatory!');
            $('#comment_txt').focus();
            return;
        }
        // if ($('#file').val().trim() == '') {
        //     SetWarningMessageBox('warning', 'Select Picture Please !');
        //     $('#file').focus();
        //     return;
        // }

        var formData = $('form#TestimonialForms').serializeObject();
        var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/addTestimonial'; ?>",
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
           $('#testimonial_formBody').empty();
           loadTestimonial();
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

    function editTestimonial($btn){  
      $reqestId =  $btn.val(); 
      StartInsideLoading();
      $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/editTestimonial'; ?>",
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
                    $('#testimonial_formBody').html(response.html);
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
    function removeTestimonialform(){ 
      $('#testimonial_formBody').empty();
    }
    function updateTestimonial(){  
        if ($('#testi_id_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Something went wrong. Please try again later !');
            return;
        }
        if ($('#name_txt').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Name is mandatory !');
            $('#name_txt').focus();
            return;
        }
        if ($('#star_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Star is mandatory!');
            $('#star_txt').focus();
            return;
        }/*  
        if ($('#tesDate_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Date is mandatory!');
            $('#tesDate_txt').focus();
            return;
        } */  
        if ($('#comment_txt').val().trim() == '') {
            SetWarningMessageBox('warning', 'Password is mandatory!');
            $('#comment_txt').focus();
            return;
        }
        

        var formData = $('form#TestimonialForms').serializeObject();
        var dataString = JSON.stringify(formData);

      StartInsideLoading();  
     $.ajax({
      type: "post",
      url: "<?php echo site_url() . 'index.php/Data_controller/updateTestimonial'; ?>",
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
               $('#testimonial_formBody').empty();
               loadTestimonial();
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
    function deleteTestimonial(){  

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
            url: "<?php echo site_url() . 'index.php/Data_controller/deleteTestimonial'; ?>",
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
                 loadTestimonial();
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

    function RemoveTestimonialImage(testi_id){ 

    $('#fileUploadTestimonial').val(''); 
    $('#fileUploadName').val(''); 
    $('#file').val(''); 
    $('#testi_img_remove_btn').css('visibility', 'hidden');

      $('#testi_img_body').html('<img width="130" height="130" style="border: solid 2px #ced4da;" id="imgThumb" src="<?php echo base_url();?>assets/img/NoImage.png">  ');
      


    // swal({
    //   title: "Are you sure?",
    //   //text: "You will not be able to recover this imaginary file!",
    //   //type: "warning",
    //   showCancelButton: true,
    //   confirmButtonText: "Yes, Remove it!",
    //   cancelButtonText: "No, cancel plx!",
    //   closeOnConfirm: true,
    //   closeOnCancel: true
    //   }, function(isConfirm) {
    //   if (isConfirm) {
    //     StartInsideLoading();
    //       $.ajax({
    //         type: "post",
    //         url: "<?php echo site_url() . 'index.php/Data_controller/RemoveTestimonialImage'; ?>",
    //         cache: false,  
    //         crossDomain: true,
    //         xhrFields: { withCredentials: true },  
    //         data: {dataId:testi_id},
    //         dataType: 'json',
    //         success: function(response){   
    //         try{     
    //          //  var result = jQuery.parseJSON(data);
    //            if (response.success)
    //                { 
    //              SetSucessMessageBox('Success', response.msg);
    //              $('#testi_img_body').html('<img width="130" height="130" style="border: solid 2px #ced4da;" id="imgThumb" src="<?php echo base_url();?>assets/img/NoImage.png">  ');
    //                } else
    //                { 
    //                    SetWarningMessageBox('warning', response.msg);
                       
    //                }
    //                StopInsideLoading();
    //         }catch(e) {  
    //           SetWarningMessageBox('warning', e);
    //           StopInsideLoading();
    //         }  
    //         },
    //         error: function(){      
    //           SetWarningMessageBox('warning', 'Error while request..');
    //           StopInsideLoading();
    //         }
    //        });
    //       }
    //  }); 
    } 

    </script>
