 <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile user-settings">
                <h4 class="line-head">Create new Client
                  <button class="close" onclick="CloseformBox('ClientUser_formBody')" type="button" aria-label="Close" style="height: 28px;width: 36px;"><span aria-hidden="true">×</span></button>
                </h4>
            <div class="tile-body">
              <form class="row" id="ClientUserForms">
                
                <div class="form-group col-md-4">
                  <label class="control-label">Client user Name</label>
                  <input class="form-control form-control-sm" id="client_Name" name="ClientUserName" type="text" placeholder="Enter Name">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Email</label>
                  <input class="form-control form-control-sm" id="client_Email" name="ClientUserEmail" type="text" placeholder="Enter Email">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleSelect1">password</label>
                    <input class="form-control form-control-sm" id="client_password_txt" name="clientPassword" type="text" placeholder="Enter password">
                </div>
                <div class="form-group col-md-12 text-center"><hr>
                  <button onclick="addClientUser()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#ClientUserForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                </div>
              </form>
            </div>
          </div>
        </div>
