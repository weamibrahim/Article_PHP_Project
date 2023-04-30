<?php
include '../header.php';
include '../footer.php';
//include 'connect.php';

require_once("../../vendor/autoload.php");

$db = new MySQLHandler("groups");
$id = $_GET['updateId'];
$groups = $db->get_record_by_id($id);
//var_dump($groups[0]['icon']);
if (isset($_POST['submit'])) {


  $image = $_FILES['icon']["tmp_name"];
  //var_dump($image);
  $name = $_POST['name'];
  $description = $_POST['description'];
  if (!empty($_FILES['icon']['name'])) {
    //var_dump($_FILES);
    $file_name = $_FILES['icon']["name"];
    move_uploaded_file($image, "../../uploads/$file_name");
  

  //var_dump($name);

  $edited_values = array(
    'icon' => $file_name,
    'name' =>  $name,
    'description' => $description
  );
  }
  else {
    // user did not upload a new icon, so use the old one
    $edited_values = array(
        'name' => $name,
        'description' => $description
    );
}
  // var_dump($new_values);
  $result = $db->update($edited_values, $id);
  //var_dump($result);
  header('location:show.php');
}

//}
?>



<form class=" mt-5 " method="post" class="container" enctype="multipart/form-data">
  <div class="shadow p-3 mb-5 bg-body-tertiary  rounded-4  container bg-info-subtle bg-opacity-75 ">
    <p class="text-center fs-1 fst-italic"> update Group</p>
    <div class="mb-3 mx-5 ">

      <label for="icon" class="form-label">ICON</label>
      <input type="file" class="form-control" id="icon" name="icon" >
   
    </div>
    <div class="mb-3 mx-5">
      <label for="name" class="form-label  ">NAME</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $groups[0]['name'] ?>">
    </div>
    <div class="mb-3 mx-5 ">
      <label for="desc" class="form-label"> DESCRIPTION</label>
      <input type="text" class="form-control" id="desc" name="description" value="<?php echo $groups[0]['description'] ?>">
      
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-outline-info" name="submit">Submit</button>
    </div>
  </div>
</form>