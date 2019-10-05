<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>iQ</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HiQ</b> Tech</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo (!empty($stuser['photo'])) ? 'images/'.$stuser['photo'] : 'images/profile.jpg'; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $stuser['firstname'].' '.$stuser['lastname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo (!empty($stuser['photo'])) ? 'images/'.$stuser['photo'] : 'images/profile.jpg'; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $stuser['firstname'].' '.$stuser['lastname']; ?>
                  <small>Member since <?php echo date('M. Y', strtotime($stuser['created_on'])); ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>