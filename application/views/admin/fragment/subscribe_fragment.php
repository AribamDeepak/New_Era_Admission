 <div  class="table-responsive"> 
	 <table class="table table-hover table-bordered table-striped" id="sampleTable" style="width: 100%;">
  <thead>
    <tr>
      <th>Sl.No.</th>
      <th>Email</th>
		<th>Date</th>
    </tr>
  </thead>
  <tbody>
  <?php  foreach ($result as $key=> $row)   { ?>
  <tr>
    <td style="width:70px;"><?php echo $key+1;?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo date("d-m-Y", strtotime($row['added_on']));?></td>
  </tr>
  <?php } ?>        
 </tbody>
</table>
</div>