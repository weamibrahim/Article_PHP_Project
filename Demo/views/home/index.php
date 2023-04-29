<?php
session_start();

if (empty($_SESSION['auth'])) {
  //$_SESSION['status'] = "You are not loggeed In";
  header('Location: ../login.php');
}



include('../includes/header.php');
include('../includes/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: -24px; margin-left: 0px; height: 680px; width:1536px;">
    <!-- Content Header (Page header) -->
    <img class="" src="../../assets/dist/img/peakpx (8).jpg" height="100%"  alt="" style="width: 100%;"> 
    <!-- Main content -->
    <section class="content" style="text-align: center;">
    <div class="purpule" >
    </div>
    <h1 style="color: white; margin-top: -530px; margin-left: 220px; font-size: 50px">Lets write about our passions!</h1><br>
    <p style="color: white; margin-left:250px; font-size: 18px">Your Articles offers high quality articles submitted by experts and talented writers on different topics. Submit & Publish your best<br> articles for free. Free article directory and free article submissi...</p><br><br>
    <a href="../articles/article.php">
      <button style="background-color: rgba(100,0,100,0.5); color:white; padding: 20px; border: 1px solid #4D1781; margin-left: 220px; margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-size: 18px;">Enjoy your Experience</button>
    </a>
    </section>
</div>


<?php
include('../includes/footer.php');
?>