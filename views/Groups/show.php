<?php
include '../header.php';
include '../footer.php';
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("groups");
$items = $db->get_all_record_paginated(array(), 0);

//var_dump($items)
?>



<div class="container">
  <div class="d-flex ">
  <button class=" btn btn-info mt-5  "><a   class="text-decoration-none text-black " href="./create.php">creat group</a></button>
  <button class="btn btn-success mt-5 ms-2"><a  class="text-decoration-none text-black " href="./search.php">search group</a></button>
  </div>
  <table class="table table-striped  mt-5 ">
    <thead class="table-dark text-center">
      <tr>
        <th scope="col">#</th>
        <th scope="col">icon</th>
        <th scope="col"> name</th>
        <th scope="col">decription</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php

      foreach ($items as $item) {
        echo '<tr><td>' . $item["id"] . '</td>
   <td ><img  style ="wigth:20px;height:20px;"src="../../uploads/image_articles'. $item["icon"]. ' "></td>

  <td> <a  href="users.php?userId=' . $item["id"] .'">' .$item["name"].'</td>
    <td>' . $item["description"] . '</td>
     <td><button class="btn btn-secondary"><a  class="text-decoration-none text-black" href="update.php?updateId=' . $item["id"] . '" >update group</a></button>
   <button class="btn btn-danger"><a   class="text-decoration-none text-black" href="delete.php?deleteId=' . $item["id"] . '" >delete group</a></button></td></tr>';
      }
      ?>




    </tbody>
  </table>
</div>