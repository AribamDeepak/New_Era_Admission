<div class="" id="printableArea_history">

	
	<!DOCTYPE html>
	<html>
		<head>
			<title>EXTRA EDGE</title>
		</head>
		<body style="padding:15px; font-family:arial;">
		<div align="center" style="color:#656565;"><h2 style="font-family:'open sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;font-weight: 400;text-align: center;">Student Profile</h2></div>
    

				<br>
				
				<br>

								
							
<table  class="table table-hover "  style="width:100%;font-family:'open sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:13px;">
	<thead>
		
	</thead>
	<tbody>
	
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Photo</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><img style="width:100px; height:auto;" src="<?php echo $result[0]['photo_profile']; ?>" /></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Name</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['student_name']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Student Id</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['admission_id']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Whatapps No.</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['student_name']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Registration Date</b></td>	
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php $date = new DateTime( $result[0]['added_on'], new DateTimeZone("UTC") );echo $date->format("d M Y, D h:i A");?></td>		
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Application ID</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['application_id']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Aadhaar Number </b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['aadhaar_number']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Date of Birth</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['dob']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Gender</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['gender']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Blood Group</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['blood_group']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Religion</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['religion']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Caste</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['caste']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Identification Mark</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['identification_mark']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>School Name</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['school_name']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Passed Board</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['passed_board']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Roll No</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['roll_no']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Percentage</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['percentage']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Permanent Address</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['permanent_address']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Permanent Address Pin</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['permanent_address_pin']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Present Address</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['present_address']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Persent Address Pin</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['persent_address_pin']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Father Name</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['father_name']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Mother Name</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['mother_name']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Guardian Name</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['guardian_name']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Transportation</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['transportation']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Transport Bus Route</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['transport_bus_route']; ?></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Subject Combination</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><?php echo $result[0]['subject_combination']; ?></td>
	</tr>
	
	
	</tbody>
</table>
						
							
							
						
							
							
						</body>
					</html>


</div>
<div>

<table style="font-size:12px;"  class="table table-hover ">
	<thead>
		
	</thead>
	<tbody>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Admitcard Photo</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><a class="btn btn-info" href="<?php echo $result[0]['admitcard_photo']; ?>" target="_blank">View Admitcard</a></td>
	</tr>
	<tr>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><b>Marksheet Photo</b></td>
		<td style=" padding: 0.3rem;     border-top: 1px solid #dee2e6;vertical-align: top;"><a class="btn btn-info" href="<?php echo $result[0]['marksheet_photo']; ?>" target="_blank">View Marksheet</a></td>
	</tr>
	
	</tbody>
</table>
</div>
<div style="text-align:right">

					<button  class="btn btn-info" id="print"  onclick="printPageAreaHistory('printableArea_history')"><i class="fa fa-print"></i> Print</button>
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>						
</div>
<script>
function printPageAreaHistory(areaID){
						
						
						
						var printContent = document.getElementById(areaID);
						var WinPrint = window.open('', '', 'width=900,height=650');
						WinPrint.document.write(printContent.innerHTML);
						WinPrint.document.close();
						WinPrint.focus();
						WinPrint.print();
						WinPrint.close();
					}
					
					</script>