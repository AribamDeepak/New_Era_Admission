<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Update Job 
                  <button class="close" onclick="CloseformBox('job_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">
		<form class="row" id="JobFormsUpdate">
		<?php  foreach ($result as $row)   { ?>
		      <input type="hidden" name="job_id_prim" id="job_id_prim_txt" value="<?php echo $row['ID'];?>">
          <div class="form-group col-md-2">
            <label class="control-label">Job ID <span style="color:red;">*</span></label>
            <input class="form-control form-control-sm" id="job_id_txt" name="job_id" type="text" value="<?php echo $row['job_id'];?>" placeholder="Enter ID...">
          </div>
          <div class="form-group col-md-4">
            <label class="control-label">Job Name <span style="color:red;">*</span></label>
            <input class="form-control form-control-sm" id="job_name_txt" name="job_name" type="text" value="<?php echo $row['name'];?>" placeholder="Enter Job Name...">
          </div>
           <div class="form-group col-md-4">
            <label class="control-label">Client Name <span style="color:red;">*</span></label>
            <input class="form-control form-control-sm" id="client_name_txt" name="client_name" type="text" value="<?php echo $row['client'];?>" placeholder="Enter Client Name...">
          </div>
           <div class="form-group col-md-2">
            <label class="control-label">Wave</label>
            <input class="form-control form-control-sm" id="wave_txt" name="wave" type="text" value="<?php echo $row['wave'];?>" placeholder="Enter wave...">
          </div>

          <div class="form-group col-md-2">
            <label class="control-label">Date Started <span style="color:red;">*</span></label>
            <input class="form-control form-control-sm" id="startDate_txt" name="startDate" type="date" value="<?php $date = date("Y-m-d", strtotime($row['date_started'])); echo $date; ?>" placeholder="Enter Date...">
          </div>
           <div class="form-group col-md-4">
            <label class="control-label">PM</label>
            <input class="form-control form-control-sm" id="pm_txt" name="pm" type="text" value="<?php echo $row['pm'];?>" placeholder="Enter pm...">
          </div>
           <div class="form-group col-md-6">
            <label class="control-label">Deliverable</label>
            <input class="form-control form-control-sm" id="deliverable_txt" name="deliverable" value="<?php echo $row['deliverable'];?>" type="text" placeholder="Enter Deliverable...">
          </div>

          <div class="form-group col-md-3">
              <label for="exampleSelect1">DP contact 1 <span style="color:red;">*</span></label>
              <select class="form-control" id="dp_contact1_txt" name="dp_contact1">
                <option value="">--Select--</option>
          <?php  foreach ($result_emp as $row_emp)   { ?>      
                <option value="<?php echo $row_emp['ID'];?>" <?php if($row['dp_contact1'] == $row_emp['ID']){ echo "selected";}?> ><?php echo $row_emp['User_Name'];?></option>
          <?php  } ?>  
              </select>
          </div>
          <div class="form-group col-md-3">
              <label for="exampleSelect1">DP contact 2</label>
              <select class="form-control" id="dp_contact2_txt" name="dp_contact2">
                <option value="">--Select--</option>
          <?php  foreach ($result_emp as $row_emp)   { ?>      
                <option value="<?php echo $row_emp['ID'];?>" <?php if($row['dp_contact2'] == $row_emp['ID']){ echo "selected";}?> ><?php echo $row_emp['User_Name'];?></option>
          <?php  } ?>  
              </select>
          </div>
          <div class="form-group col-md-3">
              <label for="exampleSelect1">DP contact 3</label>
              <select class="form-control" id="dp_contact3_txt" name="dp_contact3">
                <option value="">--Select--</option>
          <?php  foreach ($result_emp as $row_emp)   { ?>      
                <option value="<?php echo $row_emp['ID'];?>" <?php if($row['dp_contact3'] == $row_emp['ID']){ echo "selected";}?> ><?php echo $row_emp['User_Name'];?></option>
          <?php  } ?>  
              </select>
          </div>
          <div class="form-group col-md-3">
              <label for="exampleSelect1">DP contact 4</label>
              <select class="form-control" id="dp_contact4_txt" name="dp_contact4">
                <option value="">--Select--</option>
          <?php  foreach ($result_emp as $row_emp)   { ?>      
                <option value="<?php echo $row_emp['ID'];?>" <?php if($row['dp_contact4'] == $row_emp['ID']){ echo "selected";}?> ><?php echo $row_emp['User_Name'];?></option>
          <?php  } ?>  
              </select>
          </div>

           
          <div class="form-group col-md-12">
            <label class="control-label">Comment</label>
            <textarea class="form-control form-control-sm" rows="4" id="comment_txt" name="comment" placeholder="Enter Comment..."><?php echo $row['comment'];?></textarea>

          </div>
          <div class="form-group col-md-12 text-center"><hr>
            <button onclick="updateJob()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="#" onclick="removeJobform()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>      
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>    
