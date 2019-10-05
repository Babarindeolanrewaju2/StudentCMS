<?php include 'includes/session.php'; ?>
<?php
  include '../timezone.php';
  $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
?>
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
        Attendance Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendance Report</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
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
              <div class="pull-right">
                <form method="POST" class="form-inline" id="payForm">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from.' - '.$range_to; ?>">
                  </div>
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll"><span class="glyphicon glyphicon-print"></span> Attendance</button>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Class Name</th>
                  <th>Present</th>
                  <th>Absent</th>
                  <th>Percentage</th>
                </thead>
                <tbody>
                  <?php
  
                    
                    $to = date('Y-m-d');
                    $from = date('Y-m-d', strtotime('-30 day', strtotime($to)));

                    if(isset($_GET['range'])){
                      $range = $_GET['range'];
                      $ex = explode(' - ', $range);
                      $from = date('Y-m-d', strtotime($ex[0]));
                      $to = date('Y-m-d', strtotime($ex[1]));
                    }

                    $sql = "SELECT DISTINCT `student_id` AS stid, class_id FROM attendance ";

                    /*$sql2 = "SELECT DISTINCT `student_id` AS stid FROM attendance LEFT JOIN students ON students.id=attendance.student_id 
                            LEFT JOIN class ON class.class_id=attendance.class_id WHERE date BETWEEN '$from' AND '$to' 
                             ORDER BY students.lastname ASC, students.firstname ASC";*/

                    $query = $conn->query($sql);
                    $count = $query->num_rows;
                    $total = 20;
                    while($row = $query->fetch_assoc()){   
                      $st = $row['stid'];
                      $cn = $row['class_id'];
                      
                      
                      $sql1 = $conn->query("SELECT * FROM students WHERE students.id='$st'
                                ORDER BY students.lastname ASC, students.firstname ASC");
                      $sdetail = $sql1->fetch_assoc(); 
                      
                      $sql2 = $conn->query("SELECT * FROM class WHERE class.class_id='$cn'");
                      $cname = $sql2->fetch_assoc(); 

                      $sel = $conn->query("SELECT * FROM attendance WHERE student_id = '$st' AND class_id = '$cn' AND status = 1 ");   
                      $cnt = $sel->num_rows;         
                      
                      $sel1 = $conn->query("SELECT * FROM attendance WHERE student_id = '$st' AND class_id = '$cn' AND status = 0 ");   
                      $cnt1 = $sel1->num_rows;         
                      echo "
                        <tr>
                          <td>".$sdetail['student_id']."</td>
                          <td>".$sdetail['lastname'].", ".$sdetail['firstname']."</td>
                          <td>".$cname['class_name']."</td>
                          <td>".$cnt."</td>
                          <td>".$cnt1."</td>
                          <td>".(($cnt/$total) * 100).'%'."</td>
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

  /*$("#reservation").on('change', function(){
    var range = encodeURI($(this).val());
    window.location = 'attendance_report.php?range='+range;
  });*/

  $('#payroll').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'attendance_report.php');
    $('#payForm').submit();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'position_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#posid').val(response.id);
      $('#edit_title').val(response.description);
      $('#edit_rate').val(response.rate);
      $('#del_posid').val(response.id);
      $('#del_position').html(response.description);
    }
  });
}


</script>
</body>
</html>
