 <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Add new Image
                  <button class="close" onclick="CloseformBox('gallery_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">
              <form class="row" id="GalleryForms">
                 <div class="form-group col-md-5">
                  <label class="control-label">Image title <span style="color:red;">*</span></label>
                  <input class="form-control form-control-sm" id="title_txt" name="title" type="text" placeholder="Enter Name...">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Photo</label>
                  <input class="form-control" onchange="imagetoBase64Gallery(this)" id="file" name="fileImg" type="file" accept=".png, .jpg, .jpeg">
                  <input type="hidden" name="fileUpload" id="fileUploadGallery">
                  <input type="hidden" name="fileUploadName" id="fileUploadName">
                </div>
                <div class="form-group col-md-2">
                  <div class="tutors_thumb">
                    <img width="130" height="130" style="border: solid 2px #ced4da;" id="imgThumb" src="<?php echo base_url();?>assets/img/NoImage.png">
                  </div>
                </div>
                <div class="form-group col-md-12 text-center"><hr>
                  <button onclick="addGallery()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#GalleryForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                </div>
              </form>
            </div>
          </div>
        </div>
