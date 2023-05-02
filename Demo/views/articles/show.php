<?php
session_start();

require_once("../../vendor/autoload.php");

//permission
if(isset($_SESSION["logged"]) ==true) {
  if ($_SESSION['type'] == 'admin') {
      $sql = "SELECT a.*, u.name as user_name FROM articles a JOIN users u ON a.user_id = u.id";
      $articles = $articles->getResults($sql);
  } 
  elseif($_SESSION['type'] == 'editor') {
      $sql = "SELECT a.*,u.name as user_name
      FROM articles a
      JOIN users u ON a.user_id = u.id
      WHERE u.group_id = 2";
      $articles = $articles->getResults($sql);
  }
}
else{
  // $_message = "you are not allowed to see this page" ;
  // header('Location: ../home/index.php? message='.urldecode($_message));
  // exit;
}

require_once('../includes/header.php');
require_once('../includes/topbar.php');
require_once('../includes/sidebar.php');
?>


<div class="content-wrapper" style="background-image: url(../../assets/dist/img/peakpx\ \(17\).jpg); background-repeat: no-repeat; height: 100%; background-size: cover">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="col-md-12">
        <?php 
            include('../../functions/message.php');
        ?>
    </div>
      <div class="container-fluid">
<div class="container">
  <div class="d-flex ">
  <button class=" btn btn-info mt-5 " style="background-color: #8487C0; border-color: #8487C0; ">
    <a  class="text-decoration-none text-white "  href="./create.php">New Article <article></article></a>
  </button>
  </div>
  <table class="table  mt-5" style="color: #BC8CE9;">
    <thead class="table-dark text-center" >
      <tr>
        <th scope="col"  style="background-color: #BC8CE9">#</th>
        <th scope="col"  style="background-color: #BC8CE9;">Title</th>
        <th scope="col"  style="background-color: #BC8CE9;"> Summery</th>
        <th scope="col"  style="background-color: #BC8CE9;">Image</th>
        <th scope="col"  style="background-color: #BC8CE9;">Full Article</th>
       
        <th scope="col"  style="background-color: #BC8CE9;">Publishing Date</th>
        <th scope="col"  style="background-color: #BC8CE9;">User Name</th>
   
        <th scope="col"  style="background-color: #BC8CE9;">Action</th>
      </tr>
    </thead>
    <tbody class="text-center" style="color: white;">
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
   
   <a class="btn btn-danger"  href="delete.php?deleteId=' . $item["id"] . '"class="text-decoration-none" "class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td></tr>';
       
  }
      ?>
    </tbody>
  </table>
</div>
      </div>
    </div>
</div>


<?php
require_once('../includes/footer.php');
?>