<?php
session_start();
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("articles");

if (isset($_POST['submit'])) {


  $title = $_POST['title'];
  $summary = $_POST['summary'];
  $image = $_FILES['image']["tmp_name"];

  if (!empty($_FILES)) {
    $file_name = $_FILES['image']["name"];
    move_uploaded_file($image, "../../uploads/image_articles/$file_name");
  }
  $full_article = $_POST['full_article'];
  $user_id = $_POST['user_id'];


  $new_values = array(
   
    'title' =>  $title,
    'summary' =>  $summary,
    'image' => $file_name,
    'full_article' =>  $full_article,
    'user_id' =>  $user_id,
  );
  $result = $db->save($new_values);
  $_SESSION['status'] = "Created Successfully";
  header('location:show.php');
}

include('../includes/header.php');
require_once('../includes/topbar.php');
require_once('../includes/sidebar.php');
?>


<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <!-- <div class="container-fluid"> -->
      
<form class=" mt-5 " method="post" class="container" enctype="multipart/form-data" >
  <div class="shadow p-3 mb-5  rounded-4  container ">
    <p class="text-center fs-1 fst-italic" style="color: #BC8CE9; text-shadow: 1px 2px #A8BBC9; margin-top: -50px"> Create Article</p>

    <div class=" mx-5  mt-5 " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control   rounded-end" style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" required id="title" name="title">
    </div>

    <div class="mb-3 mx-5  " style="color: #BC8CE9; font-size: 20px;">
      <label for="summary" class="form-label">Summary</label>
      <input type="text" class="form-control rounded-end" required style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" id="name" name="summary">
    </div>
    <div class="mb-3 mx-5  " style="color: #BC8CE9; font-size: 20px;">
      <label for="full_article" class="form-label">Full Article</label>
      <input type="text" class="form-control  rounded-end" required id="full_article" style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" name="full_article">
    </div>
    <div class="mb-3 mx-5  " style="color: #BC8CE9; font-size: 20px;">
      <label for="image" class="form-label">Image</label>
      
      <input type="file" class="form-control  rounded-end" required  style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" id="image" name="image">

    </div>
    <div class="mb-3 mx-5  " style="color: #BC8CE9; font-size: 20px;">
      <label for="user_id" class="form-label">User Name</label>
      <select  class="form-control   rounded-end" id="user_id" style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" name="user_id">

      <?php 
      $dbs = new MySQLHandler("users");
      $users = $dbs->get_all_record_paginated(array(), 0);
      foreach($users as $user){
        echo '<option value="'.$user['id'].'">'.$user['name'].'</option>';
      }
      ?>
      </select>
    

    </div>
  

    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-outline-info " name="submit" style="background-color: #B988E9; border-color: #B988E9; color:white" >Submit
    </button>
    </div>
</form> 
      </div>
    </div>
</div>



<?php
require_once('../includes/footer.php');
?>