<div class="" id="printableArea">
	<!-- <div class="alert alert-success" style="text-align:center;"><h4><i class="fa fa-fw fa-lg fa-check-circle"></i> Package sucessfully selected. </h4></div>
	
	 -->
	
	
	<!DOCTYPE html>
	<html>
		<head>
			<title>XTRA-EDGE SCHOOL RECEIPT</title>
			<style>
		
			</style>
		</head>
		<body style="padding:15px; font-family:arial;" >
			<div id="printableArea" >
            <img style="width:100%" src="<?php echo base_url();?>assets/img/extraedgelogo.jpeg"/>
				
    <div align="center" style="color:#656565;"><h2 style="font-family:'open sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;font-weight: 400;text-align: center;">RECEIPT</h2></div>
        </div>

				<br>
				
				<br>

					
					<table class="table" style="width:100%;font-family:'open sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:13px;" >
						<tr>
							<td><b>Bill to<b></td>
								<td><b>Bill from<b></td>
								</tr>
								<tr>
									<td style="width:50%">
									<p style="margin-bottom:10px;">	Name:<?php echo $invoice_details['student_details'][0]['student_name']?> <p>
									
										<p style="margin-bottom:10px;"> Mobile: <?php echo $invoice_details['student_details'][0]['watsapp_no']?> </p>
										
										<p style="margin-bottom:10px;"> Registration ID: 
                                       <?php echo $invoice_details['student_details'][0]['application_id']?>
                                        </p>
										<p style="margin-bottom:10px;"> Address: 
                                       <?php echo $invoice_details['student_details'][0]['permanent_address']?>
                                        </p>
										
									</td>
									<td style="width:50%;padding-left:60px;">
										<b>Address:</b><br>
										<b>Xtra Edge School,</b>
										<br>
										  <br>
										Imphal West – 795001
										<br><br>
										Contact # 1234567890
										
									</td>
								</tr>
								</table>
								<br>
								<table style="width:100%;font-family:'open sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:13px;" >
									<tr>
										<td>
										Receipt No : </td><td ><?php echo $invoice_no;?></td><td>	Date/Time : </td><td>
										<?php $date = new DateTime( $added_on_time, new DateTimeZone("UTC") );
				//$date->setTimezone( new DateTimeZone("Asia/Kolkata") );
				echo $date->format("d M Y, D h:i A");?>
										
										
										</td><td>Payment Method:</td><td>Cash</td>
									</tr>
								</table>
								
								<table class="table" style="width:100%;font-family:'open sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:13px;" > 
									<tr style="background-color:#4caf50; color:#ffffff;">
										<td>Sl. No.</td>
										<td>Item(S)</td>
										<td>Quantity</td>
										<td>Unit Price</td>
										<td>Total Amount (In Rupees)</td>
									</tr>
									<?php $slno=1; $t_amount=0;
									foreach($invoice_details['fees_payment_details'] as $row){
									?>
									<tr>
										<td ><?php echo $slno;?></td>
										<td class=""> 
											<?php echo $row['item'];?>
										</td>
										<td>
											1
										</td>
										<td>
											&#x20B9; <?php echo $row['amount'];?>
										</td>
										<td>
											&#x20B9; <?php echo $row['amount'];?>
										</td>
										
									</tr>
									
								<?php $t_amount = $t_amount + $row['amount']; $slno++;}?>									
									
									<tr>
										<td colspan="4" style="text-align:right;" >Sub-total</td>
										<td>&#x20B9; <span id="total"><?php echo $t_amount;?></span></td>
									</tr>
									
									
									<tr>
										<td colspan="4" style="background-color:#4caf50; color:#ffffff;text-align:right;">Total amount paid</td>
										<td>&#x20B9; <input style="width:90%" disabled readonly type="text" id="total_to_paid" value="<?php echo $t_amount;?>"/></td>
									</tr>
									
								</table>
						
							
							<p>** The paid amount is inclusive of all applicable taxes. </p>
							<br>
							
							<h4 style="font-weight:400;"><b>Terms and conditions:</b></h4>
							<p style="font-family:'open sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:13px;font-weight:400;">
								1.	All payments made to us shall be <b>non-refundable</b>.
								<br>
								
							</p>
						
							
							
						</body>
					</html>
					
				</div>
						
<div style="text-align:right">

					<button  class="btn btn-info" id="print"  onclick="printPageArea('printableArea')"><i class="fa fa-print"></i> Print</button>
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>						
</div>