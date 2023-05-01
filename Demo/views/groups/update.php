<?php
session_start();
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
  

  $edited_values = array(
    'icon' => $file_name,
    'name' =>  $name,
    'description' => $description
  );
  }
  else {
    $edited_values = array(
        'name' => $name,
        'description' => $description
    );
}
  $result = $db->update($edited_values, $id);
  $_SESSION['status'] = "Updated Successfully";
  header('location:show.php');
}


include('../includes/header.php');
include('../includes/topbar.php');
include('../includes/sidebar.php');
?>



<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
  <!-- Content Header (Page header) -->
  <div class="content-header">
<form class=" mt-5 " method="post" class="container" enctype="multipart/form-data">
  <div class="shadow p-3 mb-5   rounded-4  container ">
    <p class="text-center fs-1 fst-italic" style="color: #BC8CE9; text-shadow: 1px 2px #A8BBC9; margin-top: -50px"> Update Group</p>

    <div class="mb-3 mx-5 mt-4 " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
      <label for="icon" class="form-label">ICON</label>
      <input type="file" class="form-control" id="icon"  style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" name="icon" >
   
    </div>
    <div class="mb-3 mx-5 mt-3" style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
      <label for="name" class="form-label  ">NAME</label>
      <input type="text" class="form-control" id="name"  style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" name="name" value="<?php echo $groups[0]['name'] ?>">
    </div>
    <div class="mb-3 mx-5 mt-3" style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
      <label for="desc" class="form-label"> DESCRIPTION</label>
      <input type="text" class="form-control"  style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" id="desc" name="description" value="<?php echo $groups[0]['description'] ?>">
      
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" style="background-color: #B988E9; border-color: #B988E9; color:white"  class="btn btn-outline-info" name="submit">Submit</button>
    </div>
  </div>
</form>
  </div>
</div>


<?php
require_once('../includes/footer.php');
?>