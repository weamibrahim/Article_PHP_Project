<?php
session_start();
include '../includes/header.php';
include('../includes/topbar.php');
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("users");
$id = $_GET['userId'];
//var_dump($id);

$items = $db->get_all_record_paginated(array(), 0);

//var_dump($items)
?>



<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
  <!-- Content Header (Page header) -->
  <div class="content-header">
<div class="container">

  <div class="d-flex ">

  </div>
  <table class="table  mt-5 ">
    <thead class="table-dark text-center">
      <tr>
        <th scope="col" style="background-color: #BC8CE9">#</th>
        <th scope="col" style="background-color: #BC8CE9">User Name</th>
        <th scope="col" style="background-color: #BC8CE9">Email</th>
       
      </tr>
    </thead>
    <tbody class="text-center"  style="color: white;">
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
  </div>
</div>

  
<?php
include('../includes/sidebar.php');
require_once('../includes/footer.php');
?>