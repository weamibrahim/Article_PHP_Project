<?php
include '../header.php';
include '../footer.php';


require_once("../../vendor/autoload.php");

$db = new MySQLHandler("articles");

if (isset($_POST['submit'])) {


  $title = $_POST['title'];
  $summary = $_POST['summary'];
  $image = $_FILES['image']["tmp_name"];
  var_dump($image);

  if (!empty($_FILES)) {
    //var_dump($_FILES);
    $file_name = $_FILES['image']["name"];
    move_uploaded_file($image, "../../uploads/image_articles/$file_name");
  }
  $full_article = $_POST['full_article'];
  //$date = $_POST['date'];
  $user_id = $_POST['user_id'];
 

  $new_values = array(
   
    'title' =>  $title,
    'summary' =>  $summary,
    'image' => $file_name,
    'full_article' =>  $full_article,
  
    //'publishing_date' =>  $date,
    'user_id' =>  $user_id,
  
  );
  var_dump($new_values);
  $result = $db->save($new_values);
  var_dump($result);
 header('location:show.php');
}


?>



<form class=" mt-5 " method="post" class="container" enctype="multipart/form-data">
  <div class="shadow p-3 mb-5 bg-body-tertiary rounded-4  container bg-info-subtle bg-opacity-50">
    <p class="text-center fs-1 fst-italic"> create article</p>

    <div class="mb-3 mx-5  mt-5 ">
      <label for="title" class="form-label">title</label>
      <input type="text" class="form-control border border-info border-start-0 rounded-end" required id="title" name="title">
    </div>

    <div class="mb-3 mx-5  ">
      <label for="summary" class="form-label">summary</label>
      <input type="text" class="form-control border border-info border-start-0 rounded-end" required id="name" name="summary">
    </div>
    <div class="mb-3 mx-5  ">
      <label for="full_article" class="form-label">full_article</label>
      <input type="text" class="form-control border border-info border-start-0 rounded-end" required id="full_article" name="full_article">
    </div>
    <div class="mb-3 mx-5  ">
      <label for="image" class="form-label">image</label>
      
      <input type="file" class="form-control border border-info border-start-0 rounded-end" required id="image" name="image">

     </div>
   <!-- <div class="mb-3 mx-5  ">
      <label for="date" class="form-label">date</label>
      <input type="date"   class="form-control border border-info border-start-0 rounded-end" required id="desc" name="date">

    </div> -->
    <div class="mb-3 mx-5  ">
      <label for="user_id" class="form-label">user_name</label>
      <select  class="form-control border border-info border-start-0 rounded-end" id="user_id" name="user_id">

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
      <button type="submit" class="btn btn-outline-info " name="submit">Submit</button>
    </div>
</form> 