<?php include 'includes/session.php'; ?>
<?php
    function fill_table($conn) {
        $output = '';
        $sql = "SELECT * FROM student_class LEFT JOIN class ON class.class_id = student_class.class_id
                LEFT JOIN students ON students.student_id = student_class.student_id";
        $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){
                $stid = $row['student_id'];
                $output .= "
                <tr>
                    <td>".$row['class_name']."</td>
                    <td>".$row['student_id']."</td>
                    <td>".$row['firstname'].' '.$row['lastname']."</td>
                    <td>
                    <button class='btn btn-success btn-sm btn-flat edit' data-id='".$row['student_id']."'><i class='fa fa-edit'></i> Present</button>
                    <button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['student_id']."'><i class='fa fa-trash'></i> Absent</button>
                    </td>
                </tr>
                ";
            }
        return $output;
    }
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
                    <div class="form-group">
                    <label for="class" class="col-sm-2 control-label">Select Course </label>

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
                        <br>
                    </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Class ID</th>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Tools</th>
                </thead>
                <tbody id="studentDetails">
                  <?php
                    //echo fill_table($conn);
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
$(document).ready(function(){
    $('#courseName').change(function(){
            var courseName = $(this).val();        
            
            $.ajax({
            type: 'POST',
            url: 'loadDetails.php',
            data: {courseName:courseName},
            success: function(response){
                $('#studentDetails').html(response);
            }
        });
    });
});

</script>

<script>
$(document).ready(function(){
    $(document).on('click', '.edit', function(e){
      e.preventDefault();
      var classid = document.getElementById('classid').value;
      var student_id = $(this).data('id');
      $.ajax({
      type: 'POST',
      url: 'add-attendance.php',
      data: {student_id: student_id, classid: classid},
      success: OnSuccessCall,
      error: OnErrorCall
    });
  });
});
</script>
<script>
$(document).ready(function(){
    $(document).on('click', '.delete', function(e){
      e.preventDefault();
      var classid = document.getElementById('classid').value;
      var student_id = $(this).data('id');
      $.ajax({
      type: 'POST',
      url: 'absent-attendance.php',
      data: {student_id: student_id, classid: classid},
      success: OnSuccessCall,
      error: OnErrorCall
    });
  });
});

function OnSuccessCall(response) {
    alert("Recorded Successfully ");
}

function OnErrorCall(response) {
    alert("Error");
}
</script>
</body>
</html>
