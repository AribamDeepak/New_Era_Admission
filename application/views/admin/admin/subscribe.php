
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Subscribe Us Email</h1><br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div id="Subscribe_tbl" class="tile-body">
              
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php $this->load->view('admin/global/footer');?>
    
    <script type="text/javascript">
    function loadSubscribeList()
    { 
      $.ajax({
        type: "post",
        url: "<?php echo site_url() . 'index.php/Data_controller/loadSubscribeList'; ?>",
        cache: false,  
        crossDomain: true,
        xhrFields: { withCredentials: true }, 
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#Subscribe_tbl').html(response.html);
            var dataTable = $('#sampleTable').DataTable({  
                     // "processing":true,  
                     // "serverSide":true,  
                     // "order":[],  
                     // "ajax":{  
                     //      url:"<?php echo site_url() . 'index.php/Table_server/fetch_Subscribe_list'; ?>",  
                     //      type:"POST"  
                     // },  
                     // "columnDefs":[  
                     //      {  
                     //           "targets":[2],  
                     //           "orderable":false,  
                     //      },  
                     // ],  
                     // "createdRow": function (row, data, index) {
                     //      var info = dataTable.page.info();
                     //      $('td', row).eq(0).html(index + 1 + info.page * info.length);
                     //  },
                }); 
                $('#sampleTable thead tr').clone(true).appendTo( '#sampleTable thead' );
                $('#sampleTable thead tr:eq(1) th').each( function (i) {
                    var title = $(this).text();
                    $(this).attr('class','');
                    $(this).html( '<input style="width:100%;padding: 5px;border-radius: 5px;border: 1px solid #e8e8e8;" type="text" placeholder="'+title+'" />' );
             
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
    
    loadSubscribeList(); 

    </script>
