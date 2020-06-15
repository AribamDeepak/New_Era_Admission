<div class="clearix"></div>
  <div class="col-md-12">
    <div class="tile user-settings">
          <h4 class="line-head">Update Solution 
            <button class="close" onclick="CloseformBox('Solution_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
          </h4>
      <div class="tile-body">
      <form class="row" id="SolutionForms">
          <?php  foreach ($result as $row)   { ?>

            <input class="form-control form-control-sm" id="solution_id_txt" name="solution_id" type="hidden" value="<?php echo $row['ID'];?>">

            <div class="form-group col-md-6">
              <label class="control-label">Heading <span style="color:red;">*</span></label>
              <input class="form-control form-control-sm" id="name_txt" name="name" type="text" value="<?php echo $row['title'];?>"  placeholder="Enter Heading...">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Sub Heading <span style="color:red;">*</span></label>
              <input class="form-control form-control-sm" id="sub_name_txt" name="sub_name" type="text" value="<?php echo $row['subTitle'];?>"  placeholder="Enter Sub Heading...">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Description</label>
              <textarea class="form-control form-control-sm" rows="6" id="desc_txt" name="desc" placeholder="Enter Description..."><?php echo $row['description'];?></textarea>
            </div>
          <div class="form-group col-md-4">
            <label class="control-label">Photo</label>
            <input class="form-control" onchange="imageShow(this)" id="file" name="files" type="file" accept=".svg, .ico, .png, .jpg, .jpeg">
   <!--          <input type="hidden" name="fileUpload" id="fileUpload">
            <input type="hidden" name="fileUploadName" id="fileUploadName"> -->
          </div>
          <div class="form-group col-md-2">
            <div class="tutors_thumb">
              <img width="130" height="130" style="border: solid 2px #ced4da;" id="imgThumb" <?php if($row['img_url'] != ''){echo "src='".$row['img_url']."'";  } else { echo "src='".base_url()."assets/img/NoImage.png"."'"; } ?> >
            </div>
          </div>
          <div class="form-group col-md-12 text-center"><hr>
             <button onclick="updateSolution()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
              &nbsp;&nbsp;&nbsp;
              <a class="btn btn-secondary" href="#" onclick="removeSolutionform()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>
          <?php  } ?>    
        </form>
      </div>  

   </div>
  </div>
  
