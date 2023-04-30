<?php
include '../header.php';
include '../footer.php';
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("users");
$id = $_GET['userId'];
var_dump($id);

$items = $db->get_all_record_paginated(array(), 0);

//var_dump($items)
?>



<div class="container">

  <div class="d-flex ">

  </div>
  <table class="table table-striped  mt-5 ">
    <thead class="table-dark text-center">
      <tr>
        <th scope="col">#</th>
        <th scope="col">username</th>
        <th scope="col">email</th>
       
      </tr>
    </thead>
    <tbody class="text-center">
      <?php

      foreach ($items as $item) {
        if($id==$item['groupid']){
        echo '<tr><td>' . $item["id"] . '</td>
   
        <td>' . $item["username"] . '</td>
        <td>' . $item["email"] . '</td>
     
 
  
    </tr>';}
      }
      ?>




    </tbody>
  </table>
</div>