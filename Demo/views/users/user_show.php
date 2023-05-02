<?php
session_start();
include('../includes/header.php');
include('../includes/topbar.php');
include('../includes/sidebar.php');
require_once("../../vendor/autoload.php");
$db = new MySQLHandler("users");
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
  <div class="d-flex justify-content-left">
  <button class=" btn btn-info mt-5 ms-1"  style="background-color: #8487C0; border-color: #8487C0; "><a class="text-decoration-none text-white"   href="./user_create.php">New User</a></button>
  <button class="btn btn-success mt-5  ms-2"  style="background-color: #A3BCCC; border-color: #A3BCCC; "><a  class="text-decoration-none text-white" href="./user_search.php">Search User</a></button>
  </div>
  <table class="table mt-5" style="color: white;">
    <thead class="table-dark text-center" >
      <tr>
        <th scope="col" style="background-color: #BC8CE9">Id</th>
        <th scope="col" style="background-color: #BC8CE9">User Name</th>
        <th scope="col" style="background-color: #BC8CE9">Email</th>
        <th scope="col" style="background-color: #BC8CE9">Name</th>
       
        <th scope="col" style="background-color: #BC8CE9">Group Name</th>
        <th scope="col" style="background-color: #BC8CE9">Type</th>
        <th scope="col" style="background-color: #BC8CE9">Action</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php



$dbs = new MySQLHandler("groups");
$groups = $dbs->get_all_record_paginated(array(), 0);

$group_names = array();

foreach($groups as $group) {
  $group_names[$group["id"]] = $group["name"];
}
      foreach ($items as $item) {
        echo '<tr><td>' . $item["id"] . '</td>
   <td>' . $item["username"] . '</td>
   <td>' . $item["email"] . '</td>
   <td>' . $item["name"] . '</td>

   <td> ' . $group_names[$item["groupid"]].'</td>
   <td>'  .$item["type"]   . '</td>  
   
     <td>          
     <a class="btn btn-danger"  href="user_delete.php?deleteId=' . $item["id"] . '"class="text-decoration-none" "class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
      <a class="btn btn-info" style="margin-left:20px" href="user_update.php?updateId=' . $item["id"] . '"class="text-decoration-none" "class="btn btn-danger"><i class="fa fa-edit "></i> </a>
     </td></tr>'; 
    }
      ?>
    </tbody> 
  </table>
</div>
      
    </div>
</div>

<?php
include('../includes/footer.php');
?>

