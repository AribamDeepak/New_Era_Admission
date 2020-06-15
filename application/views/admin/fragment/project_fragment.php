<?php if(sizeof($result) > 0){ ?>
<div class="">
  <div  class="table-responsive">  
    <table class="table table-hover table-bordered table-striped" id="sampleTable" >
      <thead>
        <tr>
          <th style='width: 50px;'>Sl.No.</th>
          <th style='width: 70px;'><?php  echo $result['client']; ?></th>
    			<th style='width: 50px;'><?php  echo $result['client_code'];  ?></th>
          <th style='width: 80px;'><?php  echo $result['proj_receive_date'];  ?></th>
          <th style='width: 80px;'><?php  echo $result['invoice_date'];  ?></th>
          <th style='width: 110px;'><?php  echo $result['po'];  ?></th>
          <th style='width: 110px;'><?php  echo $result['invoice_no'];  ?></th>
          <th style='width: 100px;'><?php  echo $result['proj_id'];  ?></th>
          <th style='width: 400px;'><?php  echo $result['proj_name'];  ?></th>
          <th style='width: 120px;'><?php  echo $result['deliveries'];  ?></th>
          <th style='width: 50px;'><?php  echo $result['cost'];  ?></th>
          <th style='width: 100px;'><?php  echo $result['pm'];  ?></th>
          <th style='width: 110px;'><?php  echo $result['dp_on_job'];  ?></th>
          <th style='width: 210px;'><?php  echo $result['comment'];  ?></th>
        </tr>
      </thead>
      <tbody>
      <?php  foreach ($result_body as $key=> $row)   { ?>
      <tr>
        <td><?php echo $key+1;?></td>
        <td><?php echo $row['client'];?></td>
        <td><?php echo $row['client_code'];?></td>
        <td><?php echo date("d-M-Y", strtotime($row['proj_receive_date']));?></td>
        <td><?php echo date("d-M-Y", strtotime($row['invoice_date']));?></td>
        <td><?php echo $row['po'];?></td>
        <td><?php echo $row['invoice_no'];?></td>
        <td><?php echo $row['proj_id'];?></td>
        <td><?php echo $row['proj_name'];?></td>
        <td><?php echo $row['deliveries'];?></td>
        <td><?php echo $row['cost'];?></td>
        <td><?php echo $row['pm'];?></td>
        <td><?php echo $row['dp_on_job'];?></td>
        <td><?php echo $row['comment'];?></td>
      </tr>
      <?php } ?>        
     </tbody>
    </table>
  </div>
</div>  
<?php } ?>

<style type="text/css">
  #sampleTable{
      table-layout: fixed !important;
      word-wrap:break-word;
  }
</style>