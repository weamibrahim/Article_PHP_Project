<?php
session_start();
if (empty($_SESSION['auth'])) {
  $_SESSION['status'] = "You are not loggeed In";
  header('Location: ../login.php');
}

include('../includes/header.php');
include('../includes/topbar.php');
include('../includes/sidebar.php');
?>


<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="col-md-12">
        <!-- <script>
         
          swal.fire({
  icon: 'success',
  title: 'Login Successful',
  text: "Welcome",

});

        </script> -->
    </div>

    <div class="col-md-12">
        <?php 
            include('../../functions/message.php');
        ?>
    </div>

    <div class="col-md-12">
    <?php
$message = isset($_GET['message']) ? $_GET['message'] : "";
// Display the message
if ($message) {
    echo '
    <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Hey!</strong>' . htmlentities($message) .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    ';
}
?>
    </div>


<div class="container mt-5">
      <!-- Main content -->
    <h1 style="color: #BC8CE9; text-shadow: 1px 2px #A8BBC9; margin-left:300px; font-size: 40px">Lets write about our passions!</h1><br><br>
    <p style="color: white; margin-left:150px; font-size: 22px;line-height: 45px;">Your Articles offers high quality articles submitted by experts and talented writers on different topics.<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Submit & Publish your best articles for free. Free article directory and free article submissi...</p><br><br>
    <!-- <img src="../../assets/dist/img/22 (1).png" style="margin-left: 340px; margin-top: -90px;"> -->
    <br>
    <a href="../articles/show.php">
      <button style="background-color: rgba(100,0,100,0.5); color:white; padding: 20px; border: 1px solid #4D1781; margin-left: 490px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-size: 18px;">Enjoy your Experience</button>
    </a>
      
    </div>
</div>
    </div>
</div>

<?php
include('../includes/footer.php');
?>

