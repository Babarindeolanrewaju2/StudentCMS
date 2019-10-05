<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Class</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="class_add.php">
          		  <div class="form-group">
                  	<label for="title" class="col-sm-3 control-label">Class Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="title" name="title" required>
                  	</div>
                </div>
				<div class="form-group">
					<label for="class" class="col-sm-3 control-label">Class Teacher</label>

					<div class="col-sm-9">
						<select class="form-control" name="class_teacher" id="class_teacher">
						<option selected>-- Select --</option>
						<?php
							$sql = "SELECT * FROM teachers";
							$query = $conn->query($sql);
							while($prow = $query->fetch_assoc()){
							echo "
								<option value='".$prow['id']."'>".$prow['title'].'. '.$prow['firstname'].' '.$prow['lastname']."</option>
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

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Update Class</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="class_edit.php">
            		<input type="hidden" id="id" name="id">
                <div class="form-group">
                    <label for="edit_title" class="col-sm-3 control-label">Class Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_title" name="title">
                    </div>
                </div>
				<div class="form-group">
                    <label for="edit_class_teacher" class="col-sm-3 control-label">Class Teacher</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="class_teacher" id="edit_class_teacher">
                        <option selected id="class_teacher_val"></option>
                        <?php
                          $sql = "SELECT * FROM teachers";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['title'].'. '.$prow['firstname'].' '.$prow['lastname']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
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
            	<h4 class="modal-title"><b>Deleting...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="class_delete.php">
            		<input type="hidden" id="del_classid" name="id">
            		<div class="text-center">
	                	<p>DELETE CLASS</p>
	                	<h2 id="del_class" class="bold"></h2>
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


     