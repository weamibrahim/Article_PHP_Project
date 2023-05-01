<?php
include '../header.php';
include '../footer.php';
//include 'connect.php';

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
  
  // var_dump($new_values);
  $result = $db->update($edited_values, $id);
  //var_dump($result);
  header('location:user_show.php');


}



//}
?>



<form class=" mt-5 " method="post" class="container" enctype="multipart/form-data">
  <div class="shadow p-3 mb-5 bg-body-tertiary rounded-4  container bg-info-subtle bg-opacity-50">
    <p class="text-center fs-1 fst-italic"> Register user</p>

    <div class="mb-3 mx-5  mt-5 ">
      <label for="name" class="form-label">name</label>
      <input type="text" class="form-control border border-info border-start-0 rounded-end" required id="name" name="name" value="<?php echo $users[0]['name'] ?>">
    </div>

    <div class="mb-3 mx-5  ">
      <label for="username" class="form-label">username</label>
      <input type="text" class="form-control border border-info border-start-0 rounded-end" required id="username" name="username"value="<?php echo $users[0]['username'] ?>">
    </div>
    <div class="mb-3 mx-5  ">
      <label for="email" class="form-label">email</label>
      <input type= "email" class="form-control border border-info border-start-0 rounded-end" required id="email" name="email" value="<?php echo $users[0]['email'] ?>">
    </div>

    <div class="mb-3 mx-5  ">
      <label for="password" class="form-label">password</label>
      <input type= "password" class="form-control border border-info border-start-0 rounded-end" required id="password" name="password" value="<?php echo $users[0]['password'] ?>">
    </div>

   
    <div class="mb-3 mx-5  ">
      <label for="user_id" class="form-label">group_name</label>
      <select  class="form-control border border-info border-start-0 rounded-end" id="user_id" name="groupid">

      <?php 
      $dbs = new MySQLHandler("groups");
      $groups = $dbs->get_all_record_paginated(array(), 0);
      foreach($groups as $group){
        echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
      }
      ?>
      </select>
    

    </div>
  
    <div class="mb-3 mx-5  ">
      <label for="type" class="form-label">type</label>
      <select id="type" class="form-control border border-info border-start-0 rounded-end" name="type">
        <option value="admin">admin</option>
        <option value="user">user</option>
        <option value="guest">guest</option></select>
    </div>

    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-outline-info " name="submit">Submit</button>
    </div>
</form>