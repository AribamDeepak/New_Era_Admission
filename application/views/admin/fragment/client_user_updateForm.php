<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Update Client 
                  <button class="close" onclick="CloseformBox('ClientUser_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">
		<form class="row" id="ClientUserFormsUpdate">
		<?php  foreach ($result as $row)   { ?>
		<input type="hidden" name="ClientUser_id" id="txt_ClientUser_id" value="<?php echo $row['ID'];?>">
				        <div class="form-group col-md-4">
                  <label class="control-label">User Name</label>
                  <input class="form-control form-control-sm" id="client_Name" name="clientName" type="text" placeholder="Enter Name" value="<?php echo $row['User_Name'];?>">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Email</label>
                  <input class="form-control form-control-sm" id="client_Email" name="clientEmail" type="text" placeholder="Enter Email" value="<?php echo $row['Email'];?>">
                </div>
          <!--       <div class="form-group col-md-3">
                    <label for="exampleSelect1">password (Update only)</label>
                    <input class="form-control form-control-sm" id="client_password_txt" name="clientPassword" type="text" placeholder="Enter password" >
                </div>   -->
           <!--      <div class="form-group col-md-12 text-center"><hr>
                  <button onclick="updateClientUser()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="removeClientUserform()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div> -->
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>    
