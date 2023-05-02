<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
    <!-- Brand Logo -->
    <a href="../../../../Article_PHP_Project/Demo/views/home/index.php" class="brand-link"  style="text-decoration: none;">
      <img src="../../assets/dist/img/article.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8; margin-top: 3px; width: 50px; height:50px">
      <h2 class="brand-text font-weight-light" style="color:white">Articles</h2>
    </a>

    <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info" style="margin-left:45px">
        <!-- <p style="color:white; display:inline ">User Name:</p> -->
        <img src="../../assets/dist/img/user (1).png">
        <span style="color:white; font-size:20px; margin-left:5px">
        <?php  
               //session_start();
              if(isset($_SESSION['auth'])){
                 echo $_SESSION['auth_user']['user_name']; 
              }
              else{
                echo "Not Logged in";
              }
              ?> 

            </span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    

    <!-- home -->
    <li class="nav-item">
          <a href="../../../../Article_PHP_Project/Demo/views/home/index.php" class="nav-link">
          <img src="../../assets/dist/img/home.png" class="nav-icon" style="width: 27px; margin-bottom: 10px">
            <p style="font-size: 18px; margin-left: 6px;">
              Home
            </p>
          </a>
        </li>
    <!-- groups menu -->
        <li class="nav-item">
          <a href="../../../../Article_PHP_Project/Demo/views/groups/show.php" class="nav-link">
          <img src="../../assets/dist/img/user-group.png" class="nav-icon" style="width: 30px; margin-bottom: 10px">
            <p style="font-size: 18px; margin-left: 6px; color:white">
              Groups
            </p>
            </a>
        </li>

    <!-- users menu -->
        <li class="nav-item">
          <a href="../../../../Article_PHP_Project/Demo/views/users/user_show.php" class="nav-link">
          <img src="../../assets/dist/img/user.png" class="nav-icon" style="width: 30px; margin-bottom: 10px">
            <p style="font-size: 18px; margin-left: 6px; color:white">
              Users
            </p>
          </a>
        </li>
        

        <!-- articles menu -->
        <li class="nav-item">
          <a href="../../../../Article_PHP_Project/Demo/views/articles/show.php" class="nav-link">
          <img src="../../assets/dist/img/content-writing.png" class="nav-icon" style="width: 30px; margin-bottom: 10px">
            <p style="font-size: 18px; margin-left: 6px; color:white">
              Articles
            </p>
          </a>
        </li>


        <!-- chartss menu -->
        <li class="nav-item">
          <a href="../../../../Article_PHP_Project/Demo/views/charts/chart.php" class="nav-link">
          <img src="../../assets/dist/img/bar-graph.png" class="nav-icon" style="width: 30px; margin-bottom: 10px">
            <p style="font-size: 18px; margin-left: 6px; color:white">
              Charts
            </p>
          </a>
        </li>

        <!-- logout -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <form action="../../../../Article_PHP_Project/Demo/views/logout.php" method="POST">
                <img src="../../assets/dist/img/logout (1).png" class="nav-icon"  style="width: 27px; margin-bottom: 10px; display:inline;">
                <button type="submit" name="logout" class="dropdown-item" style="font-size: 18px; margin-left: 6px; color:white;display:inline">Logout</button>
            </form>
          </a>
        </li>
        
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  </aside>
