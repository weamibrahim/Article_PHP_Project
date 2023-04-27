<?php
include '../header.php';
include '../footer.php';
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("users");
$items = $db->get_all_record_paginated(array(), 0);
$groupId = $_GET['groupId'];
var_dump($items)
?>



<div class="container">
<h1>Users belonging to group <?php echo $groupId ?></h1>
  <div class="d-flex ">
  <button class=" btn btn-info mt-5  "><a   class="text-decoration-none text-black " href="./create.php">creat group</a></button>
  <button class="btn btn-success mt-5 ms-2"><a  class="text-decoration-none text-black " href="./search.php">search group</a></button>
  </div>
  <table class="table table-striped  mt-5 ">
    <thead class="table-dark text-center">
      <tr>
        <th scope="col">#</th>
        <th scope="col">username</th>
        <th scope="col">email</th>
        <th scope="col">password</th>
        <th scope="col">name</th>
        <th scope="col">date</th>
        <th scope="col">group id</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php

      foreach ($items as $item) {
        echo '<tr><td>' . $item["id"] . '</td>
   
        <td>' . $item["username"] . '</td>
        <td>' . $item["email"] . '</td>
        <td>' . $item["password"] . '</td>
        <td>' . $item["name"] . '</td>

 
    <td>' . $item["subscriptiondate"] . '</td>
    <td>' . $item["groupid"] . '</td>
     <td><button class="btn btn-secondary"><a  class="text-decoration-none text-black" href="update.php?updateId=' . $item["id"] . '" >update group</a></button>
   <button class="btn btn-danger"><a   class="text-decoration-none text-black" href="delete.php?deleteId=' . $item["id"] . '" >delete group</a></button></td></tr>';
      }
      ?>




    </tbody>
  </table>
</div>