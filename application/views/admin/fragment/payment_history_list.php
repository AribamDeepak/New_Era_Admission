<div class="table-responsive">
<table style="font-size:12px;"  class="table table-hover ">
	<thead>
		<tr>
			<th>Sl No</th>
			<th>Invoice No</th>
			<th>Added On</th>
			<th>Action</th>
			
		</tr>
	</thead>
	<tbody>
	
	<?php $slno=1; foreach($result as $row){?>
	<tr>
			<td><?php echo $slno;?></td>
			<td><?php echo $row['invoice_no']?></td>
			<td>
			<?php $date = new DateTime( $row['added_on'], new DateTimeZone("UTC") );
				//$date->setTimezone( new DateTimeZone("Asia/Kolkata") );
				echo $date->format("d M Y, D h:i A");?>
			
			</td>
			<td>
				<button class="btn btn-success btn-sm" style="margin: 1px;    padding: 1px 5px;    font-size: 12px;    line-height: 1.5;    border-radius: 3px;"  onclick="view_receipt(<?php echo $row['id']?>)">View Receipt</button>	
			</td>
	</tr>
	<?php $slno++; }?>
	
	</tbody>
</table>
</div>

<script>
//THIS IS THE NEW REQUEST AND RESPONSE TYPE
function view_receipt(payment_id){
	
	var url = "<?php echo site_url('index.php/data_controller/get_ind_fee_payment_details'); ?>"; 
		StartInsideLoading();
		$.ajax({
			type: "post",
			url: url,
			cache: false,  
			data: {payment_id:payment_id},
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