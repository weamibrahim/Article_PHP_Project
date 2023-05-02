<?php
session_start();


require_once("../../vendor/autoload.php");


include('../includes/header.php');
include('../includes/topbar.php');
include('../includes/sidebar.php');

?>


<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
  <!-- Content Header (Page header) -->
  <div class="content-header">
  <p class="text-center fs-1 fst-italic" style="color: #BC8CE9; text-shadow: 1px 2px #A8BBC9;"> Profile</p>
<section class="vh-70" >
  <div class="container py-5 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">

        <div class="card" style="border-radius: 15px;background-color: rgba(1, 0, 1, 0.1);margin-top: -50px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-4">
              <img src="../../assets/dist/img/22 (1).png"
                class="rounded-circle img-fluid" style="width: 300px;" />
            </div>
            <h2 class="mb-2" style="color:white; margin-top: -40px;"><?php  
               //session_start();
              if(isset($_SESSION['auth'])){
                 echo $_SESSION['auth_user']['user_name']; 
              }
              else{
                echo "Not Logged in";
              }
              ?> </h2>
            <h3 style="color: #060C1E;">Member in <span style="color: #BC8CE9;"><?php  echo $_SESSION['auth_user']['user_role'];  ?></span></h3>
            <div class="d-flex justify-content-between text-center mt-5 mb-2">
              <div>
                <h1 class="mb-2 h5" style="color: #060C1E;">Email</h1>
                <h5 style="color: white"><?php  echo $_SESSION['auth_user']['user_email'];  ?></h5>
              </div>
              <div class="px-3" style="color: #060C1E;">
              <h1 class="mb-2 h5" style="color: #060C1E;">Phone</h1>
              <h5 style="color: white">0128388436</h5>              
            </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
  </div>
</div>



<?php
require_once('../includes/footer.php');
?>