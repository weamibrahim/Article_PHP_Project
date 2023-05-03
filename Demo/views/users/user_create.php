<?php
session_start();
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("users");

if (isset($_POST['submit'])) {



  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $groupid = $_POST['groupid'];
  $type = $_POST['type'];


  $new_values = array(

    'userName' => $username,
    'password' => $password,
    'Email' => $email,
    'name' => $name,

    'groupId' => $groupid,
    'type' => $type


  );
  $result = $db->save($new_values);
  $_SESSION['status'] = "Created Successfully";
  header('location:user_show.php');
}
include('../includes/sidebar.php');
include('../includes/header.php');
include('../includes/topbar.php');
?>



<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <!-- <div class="container-fluid"> -->
    <form class=" mt-5 " method="post" class="container" enctype="multipart/form-data">
      <div class="shadow p-3 mb-5  rounded-4  container ">
        <p class="text-center fs-1 fst-italic" style="color: #BC8CE9; text-shadow: 1px 2px #A8BBC9; margin-top: -50px"> Register user</p>

        <div class="mb-3 mx-5  mt-3 " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control  rounded-end" required style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" id="name" name="name">
        </div>

        <div class="mb-3 mx-5 mt-3 " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
          <label for="username" class="form-label">User Name</label>
          <input type="text" class="form-control  rounded-end" required style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" id="username" name="username">
        </div>
        <div class="mb-3 mx-5 mt-3 " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control border  rounded-end" required style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" id="email" name="email">
        </div>

        <div class="mb-3 mx-5 mt-3 " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control  rounded-end" required id="password" style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" name="password">
        </div>



        <div class="mb-3 mx-5 mt-3 " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
          <label for="user_id" class="form-label">Group Name</label>
          <select class="form-control  rounded-end" id="user_id" style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" name="groupid">

            <?php
            $dbs = new MySQLHandler("groups");
            $groups = $dbs->get_all_record_paginated(array(), 0);
            foreach ($groups as $group) {
              echo '<option value="' . $group['id'] . '">' . $group['name'] . '</option>';
            }
            ?>
          </select>


        </div>

        <div class="mb-3 mx-5 mt-3 " style="color: #BC8CE9; font-size: 20px; margin-top: -30px">
          <label for="type" class="form-label">Type</label>
          <select id="type" class="form-control  rounded-end" style="background-color: rgba(0, 0, 0, 0.1); border-color: #B988E9; color:white" name="type">
            <option value="admin">admin</option>
            <option value="user">user</option>
            <option value="editor">editor</option>
          </select>
        </div>

        <div class="d-flex justify-content-center">
          <button type="submit" class="btn " name="submit" style="background-color: #B988E9; border-color: #B988E9; color:white" >Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
require_once('../includes/footer.php');
?>