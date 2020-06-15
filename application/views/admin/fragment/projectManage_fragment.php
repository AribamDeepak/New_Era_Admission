<?php if(sizeof($result) > 0){ ?>
<div class="">
  <div  class="table-responsive">  
    <table class="table table-hover table-bordered table-striped" id="sampleTable2" style="width: 100%;">
      <thead>
        <tr>
          <th style="">Sl.No.</th>
          <th><?php  echo $result['proj_detail']; ?></th>
    			<th><?php  echo $result['work_phase'];  ?></th>
          <th><?php  echo $result['client'];  ?></th>
          <th><?php  echo $result['pm'];  ?></th>
          <th><?php  echo $result['dp_contact'];  ?></th>
          <th><?php  echo $result['dp_cur_work'];  ?></th>
          <th><?php  echo $result['Last_date_rec'];  ?></th>
          <th><?php  echo $result['deliverable'];  ?></th>
          <th><?php  echo $result['setup_qa_effort'];  ?></th>
          <th><?php  echo date("d-M-Y", strtotime($result['date_a']));  ?></th>
          <th><?php  echo date("d-M-Y", strtotime($result['date_b']));  ?></th>
          <th><?php  echo date("d-M-Y", strtotime($result['date_c']));  ?></th>
          <th><?php  echo date("d-M-Y", strtotime($result['date_d']));  ?></th>
          <th><?php  echo date("d-M-Y", strtotime($result['date_e']));  ?></th>
          <th><?php  echo date("d-M-Y", strtotime($result['date_f']));  ?></th>
          <th><?php  echo date("d-M-Y", strtotime($result['date_g']));  ?></th>
          <th><?php  echo $result['remark'];  ?></th>
          <th><?php  echo $result['qc_effort'];  ?></th>
          <th><?php  echo $result['qc_by'];  ?></th>
          <th><?php  echo $result['qa_priority'];  ?></th>
          <th><?php  echo $result['field_closure'];  ?></th>
        </tr>
      </thead>
      <tbody>
      <?php  foreach ($result_body as $key=> $row)   { ?>
      <tr>
        <td><?php echo $key+1;?></td>
        <td><?php  echo $result['proj_detail']; ?></td>
        <td><?php  echo $result['work_phase'];  ?></td>
        <td><?php  echo $result['client'];  ?></td>
        <td><?php  echo $result['pm'];  ?></td>
        <td><?php  echo $result['dp_contact'];  ?></td>
        <td><?php  echo $result['dp_cur_work'];  ?></td>
        <td><?php  echo $result['Last_date_rec'];  ?></td>
        <td><?php  echo $result['deliverable'];  ?></td>
        <td><?php  echo $result['setup_qa_effort'];  ?></td>
        <td><?php  echo date("d-M-Y", strtotime($result['date_a']));  ?></td>
        <td><?php  echo date("d-M-Y", strtotime($result['date_b']));  ?></td>
        <td><?php  echo date("d-M-Y", strtotime($result['date_c']));  ?></td>
        <td><?php  echo date("d-M-Y", strtotime($result['date_d']));  ?></td>
        <td><?php  echo date("d-M-Y", strtotime($result['date_e']));  ?></td>
        <td><?php  echo date("d-M-Y", strtotime($result['date_f']));  ?></td>
        <td><?php  echo date("d-M-Y", strtotime($result['date_g']));  ?></td>
        <td><?php  echo $result['remark'];  ?></td>
        <td><?php  echo $result['qc_effort'];  ?></td>
        <td><?php  echo $result['qc_by'];  ?></td>
        <td><?php  echo $result['qa_priority'];  ?></td>
        <td><?php  echo $result['field_closure'];  ?></td>
      </tr>
      <?php } ?>        
     </tbody>
    </table>
  </div>
</div>  
<?php } ?>

