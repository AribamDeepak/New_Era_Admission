<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Update Career Job Opening
                  <button class="close" onclick="CloseformBox('jobList_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">
		<form class="row" id="JobListForms">
		<?php  foreach ($result as $row)   { ?>
		      <input type="hidden" name="job_list_id" id="job_list_id_txt" value="<?php echo $row['ID'];?>">
          <div class="form-group col-md-12">
            <label class="control-label">Job Title <span style="color:red;">*</span></label>
            <input class="form-control form-control-sm" id="job_title_txt" name="job_title" type="text" value="<?php echo $row['title'];?>" placeholder="Enter Title...">
          </div>
          <div class="form-group col-md-12">
            <label class="control-label">Location <span style="color:red;">*</span></label>
            <input class="form-control form-control-sm" id="job_loc_txt" name="job_loc" type="text" value="<?php echo $row['location'];?>" placeholder="Enter Job Location...">
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Key Skill Set <span style="color:red;">*</span></label>
            <input class="form-control form-control-sm" id="keySkill_txt" name="keySkill" type="text" value="<?php echo $row['keyset'];?>" placeholder="Enter Skill...">
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Work Experience <span style="color:red;">*</span></label>
            <input class="form-control form-control-sm" id="exp_txt" name="exp" type="text" value="<?php echo $row['experience'];?>" placeholder="Enter Experience...">
          </div>
          <div class="form-group col-md-12 text-center"><br>
            <button onclick="updateJobList()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="#" onclick="removeJobListform()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>      
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>    
