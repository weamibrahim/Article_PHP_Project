<?php
session_start();
include('../includes/header.php');
include('../includes/topbar.php');
include('../includes/sidebar.php');
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("groups");
$items = $db->get_all_record_paginated(array(), 0);

?>


<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      
<div class="col-md-12">
                    <?php 
                      include('../../functions/message.php');
                    ?>
                  </div>
 
<div class="container">
  <div class="d-flex ">
  <button class=" btn btn-info mt-5 ms-1"  style="background-color: #8487C0; border-color: #8487C0; "><a   class="text-decoration-none text-black " href="./create.php">New Group</a></button>
  <button class="btn btn-success mt-5 ms-2" style="background-color: #A3BCCC; border-color: #A3BCCC; " ><a  class="text-decoration-none text-black " href="./search.php">Search Group</a></button>
  </div>
  <table class="table   mt-5 " style="color: white;">
    <thead class="table-dark text-center">
      <tr>
        <th scope="col" style="background-color: #BC8CE9">#</th>
        <th scope="col" style="background-color: #BC8CE9">icon</th>
        <th scope="col" style="background-color: #BC8CE9"> name</th>
        <th scope="col" style="background-color: #BC8CE9">decription</th>
        <th scope="col" style="background-color: #BC8CE9">action</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php

      foreach ($items as $item) {
        echo '<tr><td>' . $item["id"] . '</td>
   <td ><img  style ="wigth:20px;height:20px;" src="../../uploads/'. $item["icon"]. ' "></td>

  <td> <a class="text-decoration-none" style="color: #BC8CE9"  href="users.php?userId=' . $item["id"] .'">' .$item["name"].'</td>
    <td>' . $item["description"] . '</td>
    
     <td><button class="btn " style="background-color:#D3B2B7"><a  class="text-decoration-none text-black" href="update.php?updateId=' . $item["id"] . '" >Update Group</a></button>
   <button class="btn btn-danger"><a   class="text-decoration-none text-black" href="delete.php?deleteId=' . $item["id"] . '" >Delete Group</a></button></td></tr>';
      }
      ?>




    </tbody>
  </table>
</div>
    </div>
</div>



<?php
require_once('../includes/footer.php');
?>