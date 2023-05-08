

<?php


  
include '../header.php';
include '../footer.php';

require_once("../../vendor/autoload.php");
$db = new MySQLHandler("users");
$items = $db->get_all_record_paginated(array(), 0);

?>



<div class="container">
  <div class="d-flex justify-content-center">
  <button class=" btn btn-info mt-5  "><a class="text-decoration-none text-black"   href="./user_create.php">creat user</a></button>
  <button class="btn btn-success mt-5  ms-2"><a  class="text-decoration-none text-black" href="./user_search.php">search user</a></button>
  </div>
  <table class="table  table-striped  mt-5">
    <thead class="table-dark text-center" >
      <tr>
        <th scope="col">Id</th>
        <th scope="col">userName</th>
        <th scope="col">Email</th>
        <th scope="col">name</th>
       
        <th scope="col">group name</th>
        <th scope="col">type</th>
        <th scope="col">action</th>
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
   
     <td><button class="btn btn-secondary"><a  class="text-decoration-none text-black"href="user_update.php?updateId=' . $item["id"] . '" >update user</a></button>

     <button class="btn btn-danger"><a class="text-decoration-none text-black"  class="text-decoration-non text-black" href="user_delete.php?deleteId=' . $item["id"] . '" >delete user</a></button></td></tr>';
    }
      ?>




