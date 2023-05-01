<?php
session_start();
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("users");
$id = $_GET['updateId'];
$users = $db->get_record_by_id($id);

//var_dump($groups[0]['icon']);
if (isset($_POST['submit'])) {


  $name = $_POST['name'];
  $username= $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $subscriptionDate = $_POST['subscriptionDate'];
  $groupid = $_POST['groupid'];
  $type= $_POST['type'];



  $edited_values = array(
    'userName' =>$username,
    'password' => $password,
    'Email' => $email,
    'name' => $name,
   
    'groupId' => $groupid,
    'type' => $type
  );
  
  $result = $db->update($edited_values, $id);
  $_SESSION['status'] = "Updated Successfully";
  header('location:user_show.php');
}

include('../includes/header.php');
include('../includes/topbar.php');
include('../includes/sidebar.php');
?>



<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
  <!-- Content Header (Page header) -->
  <div class="content-header">
<form class=" mt-5 " method="post" class="container" enctype="multipart/form-data">
  <div class="shadow p-3 mb-5 rounded-4  container ">
    <p class="text-center fs-1 fst-italic" style="color: #BC8CE9; text-shadow: 1px 2px #A8BBC9; margin-top: -50px"> Update User</p>

    <div class="mb-3 mx-5  mt-4 " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control rounded-end" required style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" id="name" name="name" value="<?php echo $users[0]['name'] ?>">
    </div>

    <div class="mb-3 mx-5  mt-3 " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
      <label for="username" class="form-label">User Nname</label>
      <input type="text" class="form-control rounded-end" required style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" id="username" name="username"value="<?php echo $users[0]['username'] ?>">
    </div>
    <div class="mb-3 mx-5 mt-3  " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
      <label for="email" class="form-label">Email</label>
      <input type= "email" class="form-control  rounded-end"  style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" required id="email" name="email" value="<?php echo $users[0]['email'] ?>">
    </div>

    <div class="mb-3 mx-5 mt-3  " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
      <label for="password" class="form-label">Password</label>
      <input type= "password" class="form-control rounded-end" style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" required id="password" name="password" value="<?php echo $users[0]['password'] ?>">
    </div>

   
    <div class="mb-3 mx-5 mt-3  " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
      <label for="user_id" class="form-label">Group Name</label>
      <select  class="form-control  rounded-end" style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" id="user_id" name="groupid">

      <?php 
      $dbs = new MySQLHandler("groups");
      $groups = $dbs->get_all_record_paginated(array(), 0);
      foreach($groups as $group){
        echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
      }
      ?>
      </select>
    

    </div>
  
    <div class="mb-3 mx-5 mt-3  " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
      <label for="type" class="form-label">Type</label>
      <select id="type" class="form-control  rounded-end"  style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" name="type">
        <option value="admin">admin</option>
        <option value="user">user</option>
        <option value="guest">guest</option></select>
    </div>

    <div class="d-flex justify-content-center">
      <button type="submit" class="btn  "  style="background-color: #B988E9; border-color: #B988E9; color:white"  name="submit">Submit</button>
    </div>
  </div>
</form>
</div>
</div>


<?php
require_once('../includes/footer.php');
?>