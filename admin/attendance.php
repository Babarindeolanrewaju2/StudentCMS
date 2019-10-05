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
        Attendance
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendance</li>
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
              
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Class</th>
                  <th>Status</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, students.student_id AS stid, attendance.attendance_id AS attid, 
                            attendance.student_id AS said FROM attendance 
                            LEFT JOIN students ON students.id=attendance.student_id 
                            LEFT JOIN class ON class.class_id=attendance.class_id 
                            ORDER BY attendance.date DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $status = ($row['status'] == 1)?'<span class="label label-warning pull-left">present</span>':'<span class="label label-danger pull-right">absent</span>';
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M d, Y', strtotime($row['date']))."</td>
                          <td>".$row['stid']."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".$row['class_name']."</td>
                          <td>".$status."</td>
                          <td>
                            <button class='btn btn-success btn-sm btn-flat edit' data-id='".$row['attid']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['attid']."'><i class='fa fa-trash'></i> Delete</button>
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
  <?php include 'includes/attendance_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(document).ready(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'attendance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      if(response.status == 1){
        $('#status_val').val(response.status).html('Present');
      } else {
        $('#status_val').val(response.status).html('Absent');
      }
      $('#attendance_date').html(response.date);
      $('#status_edit').html(response.date);
      $('#attid').val(response.attendance_id);
      $('#student_name').html(response.firstname+' '+response.lastname);
      $('#del_attid').val(response.attendance_id);
      $('#del_attendance_name').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>
