 <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Create new Testimonial
                  <button class="close" onclick="CloseformBox('testimonial_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">
              <form class="row" id="TestimonialForms">
                 <div class="form-group col-md-6">
                  <label class="control-label">Client Name <span style="color:red;">*</span></label>
                  <input class="form-control form-control-sm" id="name_txt" name="name" type="text" placeholder="Enter Name...">
                </div>
                 <div class="form-group col-md-3">
                  <label class="control-label">Star</label>
                  <select class="form-control" id="star_txt" name="star">
                      <option value="">--Select--</option>   
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label class="control-label">Date</label>
                  <input class="form-control form-control-sm" id="tesDate_txt" name="tesDate" type="date" placeholder="Enter Date...">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">Comment</label>
                  <textarea class="form-control form-control-sm" rows="6" id="comment_txt" name="comment" placeholder="Enter Comment..."></textarea>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Photo</label>
                  <input class="form-control" onchange="imagetoBase64Testimonial(this)" id="file" name="fileImg" type="file" accept=".png, .jpg, .jpeg">
                  <input type="hidden" name="fileUpload" id="fileUploadTestimonial">
                  <input type="hidden" name="fileUploadName" id="fileUploadName">
                </div>
                <div class="form-group col-md-2">
                  <div class="tutors_thumb" id="testi_img_body">
                    <img width="130" height="130" style="border: solid 2px #ced4da;" id="imgThumb" src="<?php echo base_url();?>assets/img/NoImage.png">  
                  </div>
                  <button type="button" id="testi_img_remove_btn" onclick="RemoveTestimonialImage(this)" class="btn btn-danger btn-sm" style="visibility: hidden;"> Remove Image</button>
                </div>
                <div class="form-group col-md-12 text-center"><hr>
                  <button onclick="addTestimonial()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#TestimonialForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                </div>
              </form>
            </div>
          </div>
        </div>
