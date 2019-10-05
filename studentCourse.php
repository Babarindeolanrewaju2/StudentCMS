<?php include 'includes/st-session.php'; ?>
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
      Courses
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>My Courses</li>
        <li class="active">Course List</li>
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
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Course Name</th>
                  <th>Teacher</th>
                  <th>Date Added</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM student_class LEFT JOIN class ON 
                            class.class_id = student_class.class_id LEFT JOIN teachers ON 
                            teachers.id = student_class.class_teacher_id WHERE student_id = '".$stuser['student_id']."' ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?= $row['class_name'] ?></span></a></td>
                          <td><?= $row['title'].' '.$row['firstname'].' '.$row['lastname']; ?></td>
                          <td><?= date('M d, Y', strtotime($row['created_on'])) ?></td>
                          <td>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['student_class_id']; ?>"><i class="fa fa-trash"></i> Delete</button>
                          </td>
                        </tr>
                      <?php
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
  <?php include 'includes/studentCourse_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
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
    url: 'studentCourse_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.student_class_id);
      $('.del_stCourse_name').html('Remove '+response.class_name+' from Courses');
      $('#studentCourse_val').val(response.class_name).html(response.class_name);
      $('.studentName').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>
