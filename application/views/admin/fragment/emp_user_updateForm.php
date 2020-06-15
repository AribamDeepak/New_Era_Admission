<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Update Employee 
                  <button class="close" onclick="CloseformBox('AdminUser_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">
		<form class="row" id="AdminUserFormsUpdate">
		<?php  foreach ($result as $row)   { ?>
		<input type="hidden" name="AdminUser_id" id="txt_AdminUser_id" value="<?php echo $row['ID'];?>">
				        <div class="form-group col-md-4">
                  <label class="control-label">User Name</label>
                  <input class="form-control form-control-sm" id="AdminUser_Name" name="AdminUserName" type="text" placeholder="Enter Name" value="<?php echo $row['User_Name'];?>">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Email</label>
                  <input class="form-control form-control-sm" id="AdminUser_Email" name="AdminUserEmail" type="text" placeholder="Enter Email" value="<?php echo $row['Email'];?>">
                </div>
      <!--           <div class="form-group col-md-3">
                    <label for="exampleSelect1">password (Update only)</label>
                    <input class="form-control form-control-sm" id="password_txt" name="password" type="text" placeholder="Enter password" >
                </div> -->
                <?php if($row['Role'] == "admin"){?>
                <div class="form-group col-md-4">
                  <input class="form-control form-control-sm" id="team_txt" name="team" type="hidden" value="">
                </div>
		            <?php }else{ ?>   
                <div class="form-group col-md-4">
                  <label class="control-label">Team Name</label>
                  <input class="form-control form-control-sm" id="team_txt" name="team" type="text" placeholder="Enter team Name"  value="<?php echo $row['team'];?>">
                </div> 
                <div class="form-group col-md-4">
                  <label class="control-label">wave</label>
                  <input class="form-control form-control-sm" id="team_txt" name="team" type="text" placeholder="Enter team Name"  value="<?php echo $row['wave'];?>">
                </div>  
                <?php } ?> 
           <!--      <div class="form-group col-md-12 text-center"><hr>
                  <button onclick="updateEmpUser()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="removeAdminUserform()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div> -->
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>    
