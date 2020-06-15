 <div  class="table-responsive"> 
<table class="table table-hover table-bordered table-striped" id="sampleTable" style="width: 100%;">
  <thead>
    <tr>
      <th>Sl.No.</th>
      <th>Client User Name</th>
			<th>Email</th>
      <th>
        <div class="animated-checkbox">
          <label>
            <input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text"></span>
          </label>
              <button id="shaker" class="btn btn-danger btn-sm" type="button" onclick="deleteClientUser()">Delete&nbsp;&nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
  <?php  foreach ($result as $key=> $row)   { ?>
  <tr>
    <td><?php echo $key+1;?></td>
    <td><?php echo $row['User_Name'];?></td>
    <td><?php echo $row['Email'];?></td>
    <td>
      <div  class="animated-checkbox" style="display: inline-block;">
        <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="<?php echo $row['ID'];?>"><span class="label-text"></span></label>
      </div> 
      <button onclick="editClientUser($(this))" value="<?php echo $row['ID'];?>" class="btn btn-outline-info btn-sm" style="" type="button">View</button>
    </td>
  </tr>
  <?php } ?>        
 </tbody>
</table>
</div>