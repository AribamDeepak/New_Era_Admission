<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Update Testimonial 
                  <button class="close" onclick="CloseformBox('job_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">
            <form class="row" id="TestimonialForms">
                <?php  foreach ($result as $row)   { ?>
                  <input class="form-control form-control-sm" id="testi_id_txt" name="testi_id" type="hidden" value="<?php echo $row['ID'];?>">
                 <div class="form-group col-md-6">
                  <label class="control-label">Client Name <span style="color:red;">*</span></label>
                  <input class="form-control form-control-sm" id="name_txt" name="name" type="text" value="<?php echo $row['name'];?>" placeholder="Enter Name...">
                </div>
                 <div class="form-group col-md-3">
                  <label class="control-label">Star</label>
                  <select class="form-control" id="star_txt" name="star">
                      <option value="">--Select--</option>   
                      <option value="1" <?php if($row['star'] == 1){ echo "selected";}?> >1</option>
                      <option value="2" <?php if($row['star'] == 2){ echo "selected";}?> >2</option>
                      <option value="3" <?php if($row['star'] == 3){ echo "selected";}?> >3</option>
                      <option value="4" <?php if($row['star'] == 4){ echo "selected";}?> >4</option>
                      <option value="5" <?php if($row['star'] == 5){ echo "selected";}?> >5</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label class="control-label">Date</label>
                  <input class="form-control form-control-sm" id="tesDate_txt" name="tesDate" type="date" value="<?php if($row['testi_date']!='0000-00-00'){echo date("Y-m-d", strtotime($row['testi_date']));}?>" placeholder="Enter Date...">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">Comment</label>
                  <textarea class="form-control form-control-sm" rows="6" id="comment_txt" name="comment" placeholder="Enter Comment..."><?php echo $row['comment'];?></textarea>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Photo</label>
                  <input class="form-control" onchange="imagetoBase64Testimonial(this)" id="file" name="fileImg" type="file" accept=".png, .jpg, .jpeg">
                  <input type="hidden" name="fileUpload" id="fileUploadTestimonial">
                  <input type="hidden" name="fileUploadName" id="fileUploadName">
                </div>
                <div class="form-group col-md-2" >
                  <div class="tutors_thumb" id="testi_img_body">
                    <img width="130" height="130" style="border: solid 2px #ced4da;" id="imgThumb" <?php if($row['img_url'] != ''){echo "src='".$row['img_url']."'";  } else { echo "src='".base_url()."assets/img/NoImage.png"."'"; } ?> >
                  </div>
                  <?php if($row['img_url'] != ''){ ?>
                    <button type="button"  id="testi_img_remove_btn" onclick="RemoveTestimonialImage(this)" style="visibility: visible;" class="btn btn-danger btn-sm"> Remove Image</button>
                  <?php } ?>
                </div>
                <div class="form-group col-md-12 text-center"><hr>
                   <button onclick="updateTestimonial()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="#" onclick="removeTestimonialform()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
                <?php  } ?>    
              </form>
            </div>  
		
         </div>
        </div>
  
