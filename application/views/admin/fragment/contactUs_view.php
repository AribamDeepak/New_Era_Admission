<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Contact us Detail
                  <button class="close" onclick="CloseformBox('ContactUs_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">

		<?php  foreach ($result as $row)   { ?>
          <div class="row"> 
              <div class="form-group col-md-4">
                <label class="control-label">First Name </label>
                <input class="form-control form-control-sm" type="text" value="<?php echo $row['fname'];?>" disabled>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Last Name </label>
                <input class="form-control form-control-sm"  type="text" value="<?php echo $row['lname'];?>" disabled>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Email </label>
                <input class="form-control form-control-sm" type="text" value="<?php echo $row['email'];?>" disabled>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Date </label>
                <input class="form-control form-control-sm" type="text" value="<?php $date = date("Y-m-d", strtotime($row['added_on'])); echo $date; ?>" disabled>
              </div>
              <div class="form-group col-md-8">
                <label class="control-label">Message</label>
                <textarea class="form-control form-control-sm" rows="5" disabled><?php echo $row['message'];?></textarea>
              </div> 
              
          </div>     
		    <?php  } ?>             

           </div>
      </div>
    </div>    
