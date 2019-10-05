<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">MANAGE</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span>Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="attendance.php"><i class="fa fa-circle-o"></i> Full Attendance</a></li>
            <li><a href="take-attendance.php"><i class="fa fa-circle-o"></i> Take Attendance</a></li>
            <li><a href="class_absentee.php"><i class="fa fa-circle-o"></i> Class Absentee</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="student.php"><i class="fa fa-circle-o"></i> Students List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i>
            <span>Teacher</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="teacher.php"><i class="fa fa-circle-o"></i> Teacher List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Master Setup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="class.php"><i class="fa fa-circle-o"></i> Classes</a></li>
            <li><a href="season.php"><i class="fa fa-circle-o"></i> Academic Year</a></li>
            <li><a href="users.php"><i class="fa fa-circle-o"></i> Users</a></li>
          </ul>
        </li>
        <li class="header">PRINTABLES</li>
        <li><a href="print.php"><i class="fa fa-clock-o"></i> <span>Report</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>