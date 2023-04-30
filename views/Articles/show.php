<?php
include '../header.php';
include '../footer.php';
require_once("../../vendor/autoload.php");




//var_dump($items)
?>



<div class="container">
  <div class="d-flex ">
  <button class=" btn btn-info mt-5  "><a   class="text-decoration-none text-black " href="./create.php">creat <article></article></a></button>
 
  </div>
  <table class="table table-striped  mt-5 ">
    <thead class="table-dark text-center">
      <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col"> summery</th>
        <th scope="col">image</th>
        <th scope="col">full_article</th>
       
        <th scope="col">publishing_date</th>
        <th scope="col">user_name</th>
   
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php
$db = new MySQLHandler("articles");
$items = $db->get_all_record_paginated(array(), 0);
$dbs = new MySQLHandler("users");
$users = $dbs->get_all_record_paginated(array(), 0);

$user_names = array();

foreach ($users as $user) {
  $user_names[$user["id"]] = $user["name"];
}
foreach ($items as $item) {
  echo '<tr><td>' . $item["id"] . '</td>
  

  <td> ' .$item["title"].'</td>
  <td> ' .$item["summary"].'</td>
  <td ><img  style ="wigth:20px;height:20px;"src="../../uploads/image_articles/'. $item["image"]. ' "></td>
  <td> ' .$item["full_article"].'</td>

    <td>' . $item["publishing_date"] . '</td>
    <td> ' . $user_names[$item["user_id"]].'</td>
   
  <td>
   
   <button class="btn btn-danger"><a   class="text-decoration-none text-black" href="delete.php?deleteId=' . $item["id"] . '" >delete group</a></button></td></tr>';
      }
      ?>




    </tbody>
  </table>
</div>