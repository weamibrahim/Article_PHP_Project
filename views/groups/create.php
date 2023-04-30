<?php
include '../header.php';
include '../footer.php';


require_once("../../vendor/autoload.php");

$db = new MySQLHandler("groups");

if (isset($_POST['submit'])) {

  $image = $_FILES['icon']["tmp_name"];
  //var_dump($image);

  if (!empty($_FILES)) {
    //var_dump($_FILES);
    $file_name = $_FILES['icon']["name"];
    move_uploaded_file($image, "../../uploads/icon_groups/$file_name");
  }
  $name = $_POST['name'];
  $description = $_POST['description'];

  $new_values = array(
    'icon' => $file_name,
    'name' =>  $name,
    'description' => $description
  );
  // var_dump($new_values);
  $result = $db->save($new_values);
  header('location:show.php');
}


?>



<form class=" mt-5 " method="post" class="container" enctype="multipart/form-data">
  <div class="shadow p-3 mb-5 bg-body-tertiary rounded-4  container bg-info-subtle bg-opacity-50">
    <p class="text-center fs-1 fst-italic"> create Group</p>

    <div class="mb-3 mx-5  mt-5 ">
      <label for="icon" class="form-label">ICON</label>
      <input type="file" class="form-control border border-info border-start-0 rounded-end" required id="icon" name="icon">
    </div>

    <div class="mb-3 mx-5  ">
      <label for="name" class="form-label">NAME</label>
      <input type="text" class="form-control border border-info border-start-0 rounded-end" required id="name" name="name">
    </div>
    <div class="mb-3 mx-5  ">
      <label for="desc" class="form-label">DESCRIPTION</label>
      <input type="text" class="form-control border border-info border-start-0 rounded-end" required id="desc" name="description">
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-outline-info " name="submit">Submit</button>
    </div>
</form>