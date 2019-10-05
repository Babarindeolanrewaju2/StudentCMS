<?php include 'includes/session.php'; ?>
<?php
    if(isset($_POST['startattendance'])){
        $classSel = $_POST['courseName'];
        $_SESSION['class'] = $classSel;
        header('location: take-attendance.php');
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
                    Select Class
            </div>
            <div class="box-body">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
              <div class="form-group">
                <form method="POST" action="select-course.php" >
                    <label for="class" class="col-sm-2 control-label">Select Course </label>

                    <div class="col-sm-3">
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
                    <div class="form-group">
                    <button type='submit' name='startattendance' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Start Now</button>
                    <br>
                    </div>
                </form>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          </div>
        </div>
      </div>
    </section>   
  </div>
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

</body>
</html>