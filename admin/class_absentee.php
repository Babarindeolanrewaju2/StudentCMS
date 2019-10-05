<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Positions
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Positions</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible' id='zaba'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible' id='zaba'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Class Name</th>
                  <th>Class Teacher</th>
                  <th>Absentee (5 times)</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM class";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $tid = $row['teacher_id'];
                      $sql1 = "SELECT * FROM teachers WHERE id = '$tid' ";
                      $query1 = $conn->query($sql1);
                      $row1 = $query1->fetch_assoc();
                      $cid = $row['class_id'];//
                      $qatt = $conn->query("SELECT DISTINCT `student_id` AS stid,  class_id FROM attendance 
                              WHERE `class_id` = '$cid' AND status = 0 ORDER BY attendance.attendance_id DESC LIMIT 5 ");
                      $count = $qatt->num_rows;

                      echo "
                        <tr>
                          <td>".$row['class_name']."</td>
                          <td>".$row1['title'].'. '.$row1['firstname'].' '.$row1['lastname']."</td>
                          <td>";
                      if($count > 0){
                        while($rw = $qatt->fetch_assoc()){
                          $sid = $rw['stid'];
                          $gst = $conn->query("SELECT * FROM students WHERE id = '$sid' ");
                          $gstr = $gst->fetch_assoc();
                          echo '<div style="color:red; padding:0; margin:0;" >'.$gstr['firstname'].' '.$gstr['lastname'].'</div>';
                          
                        }
                      }
                      echo "
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/class_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'class_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#id').val(response.class_id);
      $('#class_teacher_val').val(response.teacher_id).html(response.title+' '+response.firstname+' '+response.lastname);
      $('#edit_title').val(response.class_name);
      $('#del_classid').val(response.class_id);
      $('#del_class').html(response.class_name);
    }
  });
}
</script>
</body>
</html>
