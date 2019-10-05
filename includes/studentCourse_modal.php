<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Me New Course</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="studentCourse_crud.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="class" class="col-sm-3 control-label">Course </label>

                  <div class="col-sm-9">
                    <select class="form-control" name="courseName" id="courseName">
                    <option selected>-- Select --</option>
                    <?php
                      $sql = "SELECT * FROM class";
                      $query = $conn->query($sql);
                      while($prow = $query->fetch_assoc()){
                      echo "
                        <option value='".$prow['class_id']."'>".$prow['class_name']."</option>
                      ";
                      }
                    ?>
                    </select>
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

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="studentName"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="studentCourse_crud.php">
            		<input type="hidden" class="id" name="id">
            		<div class="text-center">
	                	<p>DELETE STUDENT COURSE</p>
	                	<h2 class="bold del_stCourse_name"></h2>
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