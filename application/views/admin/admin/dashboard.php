<?php $this->load->view('admin/global/header');?>
  <?php $this->load->view('admin/global/side_nav');?>
  <div id="body_container">

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          
        </div>
        <ul style="display:none;" class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Online Application Form</h4>
              <p id="total_application" style="    font-weight: 900;
    font-size: 31px;
    text-align: center;" ></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
              <h4>No. Of Admission</h4>
              <p id="total_admited" style="    font-weight: 900;
    font-size: 31px;
    text-align: center;"></p>
            </div>
          </div>
        </div>
        
		
  </div>
  
  <div class="row">
  <div class="col-md-12" style="background-color:white;padding:15px;">
  <div class="row">
    <!-- <form> -->
      <div class="col-md-3">
        <div  class="form-group">
          <label for="id_email" class="control-label">Application ID </label>
          <div class="controls ">
            <input class="input-md emailinput form-control" id="id_app_id" name="app_id" placeholder="Application ID" style="margin-bottom: 10px" type="text" />
          </div>     
        </div>
      </div>
      <div class="col-md-2">  
        <div  class="form-group">
          <label for="id_email" class="control-label"> Name </label>
          <div class="controls ">
            <input class="input-md emailinput form-control" id="id_name" name="name" placeholder="Name" style="margin-bottom: 10px" type="text" />
          </div>     
        </div>
      </div>
      <div class="col-md-2">  
        <div  class="form-group">
          <label for="id_email" class="control-label"> Aadhaar Number </label>
          <div class="controls ">
            <input class="input-md emailinput form-control" id="id_aadhaar_no" name="aadhaar_no" placeholder="____-____-____" style="margin-bottom: 10px" type="text" />
          </div>     
        </div>
      </div>
      <div class="col-md-2">  
        <div  class="form-group">
          <label for="id_email" class="control-label"> Percentage (from)</label>
          <div class="controls ">
            <input class="input-md emailinput form-control" id="percentage_from" name="percentage_from" style="margin-bottom: 10px" type="number" />
          </div>     
        </div>
      </div>
      <div class="col-md-2">  
        <div  class="form-group">
          <label for="id_email" class="control-label"> Percentage (to)</label>
          <div class="controls ">
            <input class="input-md emailinput form-control" id="percentage_to" name="percentage_to" style="margin-bottom: 10px" type="number" />
          </div>     
        </div>
      </div>
      
      <div class="col-md-3 col-md-offset-9">  
        <div  class="form-group">
          <label for="id_email" class="control-label"> Apply Date </label>
          <div class="controls ">
            <input type="text" class="form-control pull-right" id="applyDate_id">
          </div>     
        </div>
      </div>
      <div class="col-md-2">  
        <div  class="form-group">
          <label for="id_email" class="control-label"> Subject combination </label>
          <div class="controls ">
            <select class="form-control" id="subject_comb" name="subject_combi">
                <option value="">--Select--</option>   
                <option value="GROUP-A">GROUP-A</option>
                <option value="GROUP-B">GROUP-B</option>
                <option value="GROUP-C">GROUP-C</option>
                <option value="GROUP-D">GROUP-D</option>
            </select>
          </div>     
        </div>
      </div>
      <div class="col-md-2">  
        <div  class="form-group">
          <label for="id_email" class="control-label"> Transport </label>
          <div class="controls ">
            <select class="form-control" id="transport" name="transport">
                <option value="">--Select--</option>   
                <option value="Bus">Bus</option>
                <option value="Hosteller">Hosteller</option>
                <option value="Day Scholar">Day Scholar</option>
            </select>
          </div>     
        </div>
      </div>
      <div class="col-md-2">  
        <div  class="form-group">
          <label for="id_email" class="control-label"> Bus Route No </label>
          <div class="controls ">
            <select class="form-control" id="bus_route" name="bus_route">
                <option value="">--Select--</option>   
                <option value="1">Route 1</option>
                <option value="2">Route 2</option>
                <option value="3">Route 3</option>
                <option value="4">Route 4</option>
                <option value="5">Route 5</option>
                <!-- <option value="6">Route 6</option> -->
                <option value="7">Route 7</option>
                <option value="8">Route 8</option>
                <option value="9">Route 9</option>
                <option value="10">Route 10</option>
                <option value="11">Route 11</option>
                <option value="12">Route 12</option>
                <option value="13">Route 13</option>
            </select>
          </div>     
        </div>
      </div>
      <div class="col-md-2">  
        <div  class="form-group">
          <label for="id_email" class="control-label"> Admission </label>
          <div class="controls ">
            <select class="form-control" id="admission" name="admission">
                <option value="">--Select--</option>   
                <option value="1">Admitted Student</option>
                <option value="2">Non-admitted Student</option>
            </select>
          </div>     
        </div>
      </div>
      
      <div class="col-md-1 ">  
        <div  class="form-group">
          <label for="id_email" class="control-label"> &nbsp </label>
          <div class="controls ">
            <button class="btn btn-primary" onclick="SearchFilter()"> Search</button>
          </div>     
        </div>
      </div>
  </div>
  <br>
  
    <div class="" id="student_list">
    </div>  
  </div>
  
  </div>

  <!-- Modal -->
  <div class="modal fade" id="admission_modal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		 <h4 class="modal-title">Admission details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body" id="admission_modal_body">
        </div>
      </div>
      
    </div>
  </div>

      <?php $this->load->view('admin/global/footer');?>
  <script src="<?php echo base_url();?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/daterangepicker.js"></script>
<script type="text/javascript">
$(function() {

  $('#id_aadhaar_no').mask('0000-0000-0000', {'translation': {0: {pattern: /[0-9*]/}}});  
  $('#percentage_from').mask('00', {'translation': {0: {pattern: /[0-9*]/}}});  
  $('#percentage_to').mask('000', {'translation': {0: {pattern: /[0-9*]/}}});  
  // $('#applyDate_id').daterangepicker({ timePicker: false, format: 'MM/DD/YYYY' })
  $('#applyDate_id').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  $('#applyDate_id').val('');

});
function SearchFilter(){
  $app_id = $('#id_app_id').val();
  $name = $('#id_name').val();
  $aadhaar_no = $('#id_aadhaar_no').val();
  $percentage_from = $('#percentage_from').val();
  $percentage_to = $('#percentage_to').val();
  $applyDate = $('#applyDate_id').val();
  $subject_comb = $('#subject_comb').val();
  $transport = $('#transport').val();
  $bus_route = $('#bus_route').val();
  $admission = $('#admission').val();
  load_student_list($app_id,$name,$aadhaar_no,$percentage_from,$percentage_to,$applyDate,$subject_comb,$transport,$bus_route,$admission);
}     
   
    function load_student_list($app_id,$name,$aadhaar_no,$percentage_from,$percentage_to,$applyDate,$subject_comb,$transport,$bus_route,$admission)
    { 
    var url = "<?php echo site_url('index.php/data_controller/get_student_list'); ?>"; 
    StartInsideLoading();
    $.ajax({
      type: "post",
      url: url,
      data:{app_id:$app_id, name:$name, aadhaar_no:$aadhaar_no, percentage_from:$percentage_from, percentage_to:$percentage_to, applyDate:$applyDate, subject_comb:$subject_comb, transport:$transport, bus_route:$bus_route, admission:$admission},
      cache: false, 
      // contentType: false,
        // processData: false,  
      dataType: 'json', 
      success: function(response){ 
				try{  
					if (response.success)
					{ 
					
				
						$('#total_admited').html(response.total_admited);
						$('#total_application').html(response.total_application);
				
						$('#student_list').html(response.html);
						        var dataTable = $('#student_list_table').DataTable({
								"iDisplayLength": 10,
	"aLengthMenu": [[5, 10, 25, 50, 100,150,500,1000,2000,5000], [5, 10, 25, 50, 100,150,500,1000,2000,5000]],
							dom: 'lBfrtip',
									buttons: [
									   
										{
											extend: 'excelHtml5',
											title: "Xtra Edge Online Student list",
											exportOptions: {
												columns: ':visible'
											}
										}
										/*,
										{
											extend: 'pdfHtml5',
											title: 'Candidate list',
											exportOptions: {
												columns:':visible'
											}
											
										}*/,
									 'colvis',
									 
									],								
                     //"responsive":true,  
                     // "serverSide":true,  
                     // "order":[],  
                     // "ajax":{  
                     //      url:"<?php echo site_url() . 'index.php/Table_server/fetch_EmpUser'; ?>",  
                     //      type:"POST"  
                     // },  
                     "columnDefs":[  
                          {  
                               "targets":[22],  
                               "orderable":false,  
                          },  
                     ],  
                     // "createdRow": function (row, data, index) {
                     //      var info = dataTable.page.info();
                     //      $('td', row).eq(0).html(index + 1 + info.page * info.length);
                     //  },
                });
 $('#student_list_table thead tr').clone(true).appendTo( '#student_list_table thead' );
                $('#student_list_table thead tr:eq(1) th').each( function (i) {
                    var title = $(this).text();
                    $(this).attr('class','');
                    
                    if(title.includes("Action") || title.includes("Sl No") ){
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
						
					}
					StopInsideLoading();
					
					}catch(e) {  
					  SetWarningMessageBox('warning',e);
				
					StopInsideLoading();
				} 
			},
			error: function(){      
				 SetWarningMessageBox('warning', 'Error while request..');
				
				StopInsideLoading();
			}
		});
	}
	
	load_student_list(null,null,null,null,null,null,null,null,null,null);

	
    </script>
    
  </body>
</html>