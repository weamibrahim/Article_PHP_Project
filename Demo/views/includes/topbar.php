<nav class="main-header navbar navbar-expand navbar-light" style="background-color: #060C1E; ">
    <!-- Left navbar links  -->
     <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block ms-3">
        <a href="../../../../Article_PHP_Project/Demo/views/home/index.php" class="nav-link" style="color:white">Home</a>
      </li>
    </ul>

    <ul class="navbar-nav" style="margin-left: 400px;"> 
    <li class="nav-item">
      

      </li>
     
    </ul>

    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li nav-item>
          <div class="dropdown">
          <img src="../../assets/dist/img/user (1).png">
            <button class="btn  dropdown-toggle" style="color: white; font-size: 18px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
           
               <?php  
               //session_start();
              if(isset($_SESSION['auth'])){
                 echo $_SESSION['auth_user']['user_name']; 
              }
              else{
                echo "Not Logged in";
              }
              
              ?> 

            </button> 
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <form action="../../../../Article_PHP_Project/Demo/views/logout.php" method="POST">
                <button type="submit" name="logout" class="dropdown-item">Logout</button>
              </form>
            </div>
          </div>
       </li>
      
    </ul>
   </nav>