 <div  class="table-responsive"> 
<table class="table table-hover table-bordered" id="sampleTable" style="width: 100%;">
  <thead>
    <tr>
      <th>Sl.No.</th>
      <th>Name</th>
			<th>Star</th>
      <th>Date</th>
      <th>Comment</th>
      <th>
        <div class="animated-checkbox">
          <label>
            <input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text"></span>
          </label>
              <button id="shaker" class="btn btn-danger btn-sm" type="button" onclick="deleteTestimonial()">Delete&nbsp;&nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
  <?php  foreach ($result as $key=> $row)   { ?>
  <tr>
    <td><?php echo $key+1;?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['star'];?></td>
    <td><?php if($row['testi_date']!='0000-00-00'){echo date("d-m-Y", strtotime($row['testi_date']));}?></td>
    <td><?php echo substr($row['comment'], 0, 90).(strlen(trim($row['comment'])) > 90 ? '...' : '');?></td>
    <td>
      <div  class="animated-checkbox" style="display: inline-block;">
        <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="<?php echo $row['ID'];?>"><span class="label-text"></span></label>
      </div>
      <button onclick="editTestimonial($(this))" value="<?php echo $row['ID'];?>" class="btn btn-outline-info btn-sm" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i>EDIT</button>
    </td>
  </tr>
  <?php } ?>        
 </tbody>
</table>
</div>