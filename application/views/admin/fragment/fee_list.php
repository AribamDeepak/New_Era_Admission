<?php echo form_open_multipart('',array('id'=>'admission_form','class'=>''))?>
		 	<table class="table ">
    <thead>
    </thead>
    <tbody>
	  
      <tr>
		<td style="text-align:right">
		 <b>Student Name:</b> 
		</td>
        <td>
		<span id=""><?php echo $student_name; ?></span>
		</td>
		<td style="text-align:right">
		 <b>Gender:</b> 
		</td>
        <td>
		<span id=""><?php echo $gender; ?></span>
		</td>
        <td style="text-align:right"> 
		<b> Registration ID:</b>
   		</td>
        <td>
		<span id=""><?php echo $application_id; ?>	</span>
		 </td>
		 <td style="text-align:right">
			<b>Mobile:</b>
		 </td>
		 <td>
		 <span id=""><?php echo $watsapp_no; ?></span>
		 </td>
      </tr>
	  <tr>
		<td style="text-align:right">
		 <b>Aadhaar Number:</b> 
		</td>
        <td>
		<span id=""><?php echo $aadhaar_number; ?></span>
		</td>
		<td style="text-align:right">
		 <b>Transportation:</b> 
		</td>
        <td>
		<span id=""><?php echo $transportation; ?></span>
		</td>
		<td style="text-align:right">
		 <b>Board:</b> 
		</td>
        <td>
		<span id=""><?php echo $passed_board; ?></span>
		</td>
		<td style="text-align:right">
		 <b>Percentage:</b> 
		</td>
        <td>
		<span id=""><?php echo $percentage; ?>%</span>
		</td>		
        
		
      </tr>
	  
	  <input type="hidden" name="st_id" id="st_id" value="<?php echo $id; ?>"/>
      
    </tbody>
  </table>
		  <br><br>
		  <div id="" align="right"><b>Total Amount to be paid : </b>Rs. <span id="total_amount_to_be_paid"></span><br>
		  (<span id="amount_in_word"></span>)
		  </div>
		  <br>
		  
		  
<table class="table table-hover">
    <thead>
      <tr>
        <th>Select</th>
        <th>Sl. No.</th>
        <th>Item</th>
		<th>Amount</th>
      </tr>
    </thead>
    <tbody>
	  <?php 
	  $fees_already_paid=array();
	 
	  foreach($result['previous_payment_details'] as $p_row)
	  {
		$fees_id = unserialize($p_row['fee_id']);
		if(sizeof((Array)$fees_id) == 1){
		$fees_id = array($fees_id);
		}
		
		$fees_already_paid = array_unique(array_merge($fees_already_paid,$fees_id));
		
	  }
		
		 //print_r($fees_already_paid);
		
	  $slno=1;foreach($result['fee_details'] as $row){
		if (in_array($row['id'], $fees_already_paid))
		{
		//print_r($fees_already_paid);
		}
		else
		{
		
	  ?>
      <tr>
		<td>
		 <div id="div_id_terms" class="checkbox required">
                            <label for="id_<?php echo $row['amount']; ?>" class=" requiredField">
                                 <input class="input-ms checkboxinput" id="id_<?php echo $row['amount']; ?>" value="<?php echo $row['id']; ?>" onchange="calculate_amount(<?php echo $row['id']; ?>,<?php echo $row['amount']; ?>)" name="fee_id" style="margin-bottom: 10px" type="checkbox" />
                 
                                </label>
                        </div>
		</td>
        <td>
		<label for="id_<?php echo $row['amount']; ?>" class=" requiredField">
		<?php echo $slno;?>
		</label>
		</td>
        <td> 
		 <label for="id_<?php echo $row['amount']; ?>" class=" requiredField">
                  <?php echo $row['item']; ?>
				  </label>
   		</td>
        <td>
		 <label for="id_<?php echo $row['amount']; ?>" class=" requiredField">
		Rs. <?php echo $row['amount']; ?></td>
		</label>
      </tr>
	  	<?php } $slno++; }?>
      
    </tbody>
  </table>
  
		<?php echo form_close() ?>
<div style="text-align:right">
		 <button type="button" id="submit" onclick="add_admission_form()" class="btn btn-success" >Submit</button>
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  </div>
<script>  
  
	
	
	function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    return words_string;
}

$('#amount_in_word').html("");
$('#total_amount_to_be_paid').html("");

var hash = {};

function calculate_amount(id,amount){
var sum = 0;
//var total_amount = new Array();
//total_amount.push(amount); 
if(hash.hasOwnProperty(id)){ // true
delete hash[id];
}else
{
hash[id] = amount;
}


for (var name in hash) {
    sum += hash[name];
}

var amount_in_word =  convertNumberToWords(sum);

$('#total_amount_to_be_paid').html(sum);
$('#amount_in_word').html(amount_in_word);
}

</script>