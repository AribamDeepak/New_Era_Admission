 <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Create new Slider
                  <button class="close" onclick="CloseformBox('Home_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">
              <form class="row" id="HomeForms">
                <div class="form-group col-md-6">
                  <label class="control-label">Heading <span style="color:red;">*</span></label>
                  <input class="form-control form-control-sm" id="name_txt" name="name" type="text" placeholder="Enter Heading...">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">Sub Heading <span style="color:red;">*</span></label>
                  <input class="form-control form-control-sm" id="sub_name_txt" name="sub_name" type="text" placeholder="Enter Sub Heading...">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">Description</label>
                  <textarea class="form-control form-control-sm" rows="6" id="desc_txt" name="desc" placeholder="Enter Description..."></textarea>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Image</label>
                  <input class="form-control" onchange="imageShow(this)" id="file" name="files" type="file" accept=" .png, .jpg, .jpeg">
                </div>
                <div class="form-group col-md-2">
                  <div class="tutors_thumb">
                    <img width="130" height="130" style="border: solid 2px #ced4da;" id="imgThumb" src="<?php echo base_url();?>assets/img/NoImage.png">
                  </div>
                </div>
                <div class="form-group col-md-12 text-center"><hr>
                  <button onclick="addHome()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#HomeForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                </div>
              </form>
            </div>
          </div>
        </div>
