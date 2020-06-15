<div class="clearix"></div>
<div class="col-md-12">
  <div class="tile user-settings">
  	<h4 class="line-head">Update Career
    </h4>
    <div class="tile-body">
    <form class="row" id="careerForm">
        <div class="form-group col-md-12">
          <label class="control-label">Career Title</label>
          <input class="form-control form-control-sm" id="career_title_txt" name="career_title" type="text" value="<?php echo $result['title'];?>" placeholder="Enter Title...">
        </div>
        <div class="form-group col-md-12">
          <label class="control-label"> Description</label>
          <textarea class="form-control form-control-sm" rows="5" id="career_desc_txt" name="career_desc" placeholder="Enter Description..."><?php echo $result['desc'];?></textarea>
        </div>
        <div class="form-group col-md-12 text-center"><br>
           <button onclick="updateCareer()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#careerForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
        </div>
      </form>
    </div>  
 </div>
</div>
  
