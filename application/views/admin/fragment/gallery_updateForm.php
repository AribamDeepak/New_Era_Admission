<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Update Image.
                  <button class="close" onclick="CloseformBox('gallery_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">
            <form class="row" id="GalleryForms">
                <?php  foreach ($result as $row)   { ?>
                  <input class="form-control form-control-sm" id="gallery_id_txt" name="gallery_id" type="hidden" value="<?php echo $row['ID'];?>">
                <div class="form-group col-md-5">
                  <label class="control-label">Image title <span style="color:red;">*</span></label>
                  <input class="form-control form-control-sm" id="title_txt" name="title" type="text" value="<?php echo $row['img_title'];?>" placeholder="Enter Name...">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Photo</label>
                  <input class="form-control" onchange="imagetoBase64Gallery(this)" id="file" name="fileImg" type="file" accept=".png, .jpg, .jpeg">
                  <input type="hidden" name="fileUpload" id="fileUploadGallery">
                  <input type="hidden" name="fileUploadName" id="fileUploadName">
                </div>
                <div class="form-group col-md-2">
                  <div class="tutors_thumb">
                    <img width="130" height="130" style="border: solid 2px #ced4da;" id="imgThumb" <?php if($row['img_url'] != ''){echo "src='".$row['img_url']."'";  } else { echo "src='".base_url()."assets/img/NoImage.png"."'"; } ?> >
                  </div>
                </div>
                <div class="form-group col-md-12 text-center"><hr>
                   <button onclick="updateGallery()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="#" onclick="removeGalleryform()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
                <?php  } ?>    
              </form>
            </div>  
		
         </div>
        </div>
  
