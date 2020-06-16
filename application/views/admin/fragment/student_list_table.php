<div class="table-responsive">
<table style="font-size:12px;" id="student_list_table" class="table table-hover ">
	<thead>
		<tr>
			<th>Sl No</th>
			<th>Application ID</th>
			<th>Student Name</th>
			<th>DOB</th>
			<th>Gender</th>
			<th>Religion</th>
			<th>Caste</th>
			<th>Father Name</th>
			<th>Mother Name</th>
			<th>Contact No.</th>
			<th>Aadhaar No.</th>
			<th>Blood Group</th>
			<th>Identification Mark</th>
			<th>School Name</th>
			<th>Board</th>
			<th>Roll No.</th>
			<th>Percentage</th>
			<th>Permanent address</th>
			<th>Permanent address Pin</th>
			<th>Subject combination</th>
			<th>Apply Date</th>
			<th>Action</th>
			
		</tr>
	</thead>
	<tbody>
	
	<?php $slno=1; foreach($result as $row){?>
	<tr>
			<td><?php echo $slno;?></td>
			<td><?php echo $row['application_id']?></td>
			<td><?php echo $row['student_name']?></td>
			<td><?php $d=strtotime($row['dob']); echo date("d/m/Y", $d)?></td>
			<td><?php echo $row['gender']?></td>
			<td><?php echo $row['religion']?></td>
			<td><?php echo $row['caste']?></td>
			<td><?php echo $row['father_name']?></td>
			<td><?php echo $row['mother_name']?></td>
			<td><?php echo $row['watsapp_no']?></td>
			<td><?php echo $row['aadhaar_number']?></td>
			<td><?php echo $row['blood_group']?></td>			
			<td><?php echo $row['identification_mark']?></td>
			<td><?php echo $row['school_name']?></td>
			<td><?php echo $row['passed_board']?></td>
			<td><?php echo $row['roll_no']?></td>
			<td><?php echo $row['percentage']?></td>
			<td><?php echo $row['permanent_address']?></td>
			<td><?php echo $row['permanent_address_pin']?></td>		
			<td><?php echo $row['subject_combination']?></td>
			<td><?php $d=strtotime($row['added_on']); echo date("d/m/Y", $d)?></td>
			<td>			
				<button class="btn btn-info btn-sm" style="margin: 1px;    padding: 1px 5px;    font-size: 12px;    line-height: 1.5;    border-radius: 3px;" onclick="show_profile_modal(<?php echo $row['id']?>)">View</button>
			</td>
</tr>
	<?php $slno++; }?>
	
	</tbody>
</table>
</div>

<script>
//THIS IS THE NEW REQUEST AND RESPONSE TYPE
function show_admission_modal(id,application_id,student_name,watsapp_no,aadhaar_number,transportation,percentage,passed_board,gender){
	
	var url = "<?php echo site_url('index.php/data_controller/get_fee_list'); ?>"; 
		StartInsideLoading();
		$.ajax({
			type: "post",
			url: url,
			cache: false,  
			data: {student_name:student_name,application_id:application_id,watsapp_no:watsapp_no,id:id,aadhaar_number:aadhaar_number,transportation:transportation,percentage:percentage,passed_board:passed_board,gender:gender},
			dataType: 'json', 
			success: function(response){ 
				try{  
					if (response.success)
					{ 
						$('#admission_modal_body').html(response.html);
						$('#admission_modal').modal('show');
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

	
	
	 function add_admission_form(){
	 
	 	swal({
  		title: "Are you sure?",
  		text: "You will not be able to reverse this step!",
  		//type: "warning",
  		showCancelButton: true,
  		confirmButtonText: "Yes, Proceed!",
  		cancelButtonText: "No, cancel plz!",
  		closeOnConfirm: true,
  		closeOnCancel: true
  	}, function(isConfirm) {
  		if (isConfirm) {
		
			
			if ($('#st_id').val().trim() == '') { 
				 SetWarningMessageBox('warning', 'Please select a student!');
				return;
			}
			
			var formData = $('form#admission_form').serializeObject();
			var dataString = JSON.stringify(formData);
			var url = '<?php echo base_url();?>index.php/data_controller/admission_form';
			StartInsideLoading();
			$.ajax({
				type: "post",
				url: url,
				cache: false,    
				data: dataString,
				dataType: 'json',
				success: function(response){   
					try{  	
						if (response.success)
						{
							$('#admission_modal_body').html(response.html);
							
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
			
		}});
	}
	
	
	function printPageArea(areaID){
						
						
						
						var printContent = document.getElementById(areaID);
						var WinPrint = window.open('', '', 'width=900,height=650');
						WinPrint.document.write(printContent.innerHTML);
						WinPrint.document.close();
						WinPrint.focus();
						WinPrint.print();
						WinPrint.close();
					}

function show_payment_history_modal(student_id)
{

var url = "<?php echo site_url('index.php/data_controller/get_payment_history_list'); ?>"; 
		StartInsideLoading();
		$.ajax({
			type: "post",
			url: url,
			cache: false,  
			data: {student_id:student_id},
			dataType: 'json', 
			success: function(response){ 
				try{  
					if (response.success)
					{ 
						$('#admission_modal_body').html(response.html);
						$('#admission_modal').modal('show');
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
	
	function show_profile_modal(student_id)
{

var url = "<?php echo site_url('index.php/data_controller/get_profile_details'); ?>"; 
		StartInsideLoading();
		$.ajax({
			type: "post",
			url: url,
			cache: false,  
			data: {student_id:student_id},
			dataType: 'json', 
			success: function(response){ 
				try{  
					if (response.success)
					{ 
						$('#admission_modal_body').html(response.html);
						$('#admission_modal').modal('show');
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

	
					
</script>