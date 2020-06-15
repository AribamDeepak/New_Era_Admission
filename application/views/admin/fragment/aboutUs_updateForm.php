<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
            <div class="tile-body">
            <form class="row" id="AboutUsForm">
                <?php  foreach ($result as $row)   { ?>
                <div class="form-group col-md-12">
                  <label class="control-label">About Us Description 1</label>
                  <textarea class="form-control form-control-sm" rows="4" id="about_txt" name="about" placeholder="Enter Comment..."><?php echo $row['about_message'];?></textarea>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">About Us Description 2</label>
                  <textarea class="form-control form-control-sm" rows="4" id="about_txt2" name="about2" placeholder="Enter Comment..."><?php echo $row['about_message'];?></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">Our Mission Description</label>
                  <textarea class="form-control form-control-sm" rows="6" id="mission_txt" name="mission" placeholder="Enter Comment..."><?php echo $row['mission_message'];?></textarea> 
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Photo</label>
                  <input class="form-control" onchange="imagetoBase64AboutUs(this)" id="file" name="fileImg" type="file" accept=".png, .jpg, .jpeg">
                  <input type="hidden" name="fileUpload" id="fileUploadAboutUs">
                  <input type="hidden" name="fileUploadName" id="fileUploadName">
                </div>
                <div class="form-group col-md-2">
                  <div class="tutors_thumb">
                    <img width="130" height="130" style="border: solid 2px #ced4da;" id="imgThumb" <?php if($row['about_image'] != ''){echo "src='".$row['about_image']."'";  } else { echo "src='".base_url()."assets/img/NoImage.png"."'"; } ?> >
                  </div>
                </div>
                <div class="form-group col-md-12 text-center"><hr>
                   <button onclick="updateAboutUs()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#AboutUsForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                </div>
                <?php  } ?>    
              </form>
            </div>  
		
         </div>
        </div>
  
