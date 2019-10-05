<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Teacher</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="teacher_crud.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Title</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="title" id="title">
                        <option selected id="gender">--Select--</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Dr">Dr</option>
                        <option value="Prof">Prof</option>
                      </select>
                    </div>
                </div>
          		  <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="address" name="address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" name="photo" id="photo">
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>User Teacher Update</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="teacher_crud.php" enctype="multipart/form-data">
              <input type="hidden" class="id" name="id">
              <div class="form-group">
                    <label for="edit_title" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9"> 
                      <select class="form-control" name="title" id="edit_title">
                        <option selected id="title_val"></option>
                        <option value="Mr">Mr</option>
                        <option value="Miss">Miss</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Dr">Dr</option>
                        <option value="Prof">Prof</option>>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_firstname" name="firstname">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_lastname" name="lastname">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="edit_address" class="col-sm-3 control-label">Address</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_address" name="address">
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="teacher_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="teacher_crud.php">
            		<input type="hidden" class="id" name="id">
            		<div class="text-center">
	                	<p>DELETE USER</p>
	                	<h2 class="bold del_teacher_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_teacher_name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="teacher_crud.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>    
