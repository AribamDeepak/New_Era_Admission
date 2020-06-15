<div class="table-responsive"> 
<table class="table table-hover table-bordered" id="sampleTable" style="width: 100%;">
  <thead>
    <tr>
      <th>SL.No</th>
      <th>Job Id</th>
      <th>Job Name</th>
      <th>Client</th>
      <th>Wave</th>
      <th>PM</th>
      <th>Deliverable</th>
      <th style="width:10%">Start Date</th>
      <th>Comment</th>
    </tr>
  </thead>
  <tbody>
      <?php  foreach ($result as $key=>$row)   { ?>
        <tr>
            <td><?php echo $key+1;?></td>
            <td><?php echo $row['job_id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['client'];?></td>
            <td><?php echo $row['wave'];?></td>
            <td><?php echo $row['pm'];?></td>
            <td><?php echo $row['deliverable'];?></td>
            <td style="width:10%"><?php $date = date("d M Y", strtotime($row['date_started'])); echo $date; ?></td>
            <td><?php echo $row['comment'];?></td>
        </tr>
        <?php } ?>    
    </tbody> 
</table>
<!-- <table class="table table-responsive table-hover" id="sampleTable" style="width: 100%;">
    <thead>
        <tr>
            <th></th>
            <th>SL.No</th>
            <th>Job Id</th>
            <th>Job Name</th>
            <th>Client</th>
            <th>Start Date</th>
            <th>Deliverable</th>
            <th>Wave</th>
            <th>PM</th>
        </tr>
    </thead>
    <?php  foreach ($result as $key=>$row)   { ?>
    <tbody>
        <tr>
            <td> <i class="fa fa-plus" aria-hidden="true" class="clickable" data-toggle="collapse" data-target="#group-of-rows-<?php echo $key+1;?>" aria-expanded="false" aria-controls="group-of-rows-<?php echo $key+1;?>"></i> </td>
            <td> <?php echo $key+1;?></td>
            <td><?php echo $row['job_id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['client'];?></td>
            <td><?php $date = date("d M Y", strtotime($row['date_started'])); echo $date; ?></td>
            <td><?php echo $row['deliverable'];?></td>
            <td><?php echo $row['wave'];?></td>
            <td><?php echo $row['pm'];?></td>
        </tr>
    </tbody>

    <tbody id="group-of-rows-<?php echo $key+1;?>" class="collapse">
        <tr>
            <td><i class="fa fa-minus" aria-hidden="true" class="clickable" data-toggle="collapse" data-target="#group-of-rows-<?php echo $key+1;?>" aria-expanded="false" aria-controls="group-of-rows-<?php echo $key+1;?>"></i></span></td> 
            <td><span style="font-size: 0.875rem; font-weight: bold;" >Comment</span></td>
        </tr>
        <tr>
            <td><?php echo $row['comment'];?></td>
        </tr>
    </tbody>
    <?php } ?>   
</table> -->

</div> 