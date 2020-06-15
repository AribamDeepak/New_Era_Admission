 <div class="clearix"></div>
  <div class="col-md-12">
    <div class="tile user-settings">
          <h4 class="line-head">Create new Employee
            <button class="close" onclick="CloseformBox('AdminUser_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
          </h4>
      <div class="tile-body">
        <form class="row" id="AdminUserForms">
          
          <div class="form-group col-md-4">
            <label class="control-label">User Name</label>
            <input class="form-control form-control-sm" id="AdminUser_Name" name="AdminUserName" type="text" placeholder="Enter Name">
          </div>
          <div class="form-group col-md-4">
            <label class="control-label">Email</label>
            <input class="form-control form-control-sm" id="AdminUser_Email" name="AdminUserEmail" type="text" placeholder="Enter Email">
          </div>
          <div class="form-group col-md-3">
              <label for="exampleSelect1">password</label>
              <input class="form-control form-control-sm" id="password_txt" name="password" type="text" placeholder="Enter password">
          </div>
          <div class="form-group col-md-4">
            <label class="control-label">Team Name</label>
            <input class="form-control form-control-sm" id="team_txt" name="team" type="text" placeholder="Enter team Name">
          </div>
          <div class="form-group col-md-4">
            <label class="control-label">Wave</label>
            <input class="form-control form-control-sm" id="wave_txt" name="wave" type="text" placeholder="Enter wave Name">
          </div>
          <div class="form-group col-md-12 text-center"><hr>
            <button onclick="addEmpUser()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#AdminUserForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
          </div>
        </form>
      </div>
    </div>
  </div>
