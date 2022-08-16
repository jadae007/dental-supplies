<!-- Modal -->
<div class="modal fade" id="userManagementModal" tabindex="-1" aria-labelledby="userManagementModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" id="form">
        <div class="modal-header">
          <h5 class="modal-title" id="userManagementModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="username">Username </label>
            <div class="col-sm-7">
              <input type="hidden" class="form-control" id="userId" name="userId">
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
          </div>
          <div id="divForAdd">
            <div class="form-group row">
              <label class="col-sm-5 col-form-label" for="password">password </label>
              <div class="col-sm-7">
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label" for="confirmPassword">Confirm Password </label>
              <div class="col-sm-7">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="email">Email </label>
            <div class="col-sm-7">
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="firstname">ชื่อจริง </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="lastname">นามสกุล </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="role">Role </label>
            <div class="col-sm-7">
              <select class="form-control" id="role" name="role">
                <?php if ($_SESSION['role'] == 0) { ?><option value="0">Administrator</option> <?php } ?>
                <option value="1">Admin</option>
                <option value="2">User</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>