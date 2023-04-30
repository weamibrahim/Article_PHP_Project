<?php
include '../header.php';
include '../footer.php';
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("users");
$id = $_GET['userId'];
var_dump($id);

$items = $db->get_all_record_paginated(array(), 0);

if(isset($_SESSION["logged"]) ==true) {
  if ($_SESSION['type'] == 'admin') {
  //if the user was admin , then get all the users
     
          //join groups table to i can get the group name instead of group id
          $sql = "SELECT u.*, g.name as group_name FROM users u JOIN groups g ON u.group_id = g.id";
         // $users = $db->getResults($sql);
     

  } elseif($_SESSION['type'] == 'editor') {
//if the user was editor , then get the users with type editor
      
          $sql = "SELECT u.*, g.name as group_name FROM users u JOIN groups g ON u.group_id = g.id WHERE u.type ='editor'";
          //$users = $db->getResults($sql);
      
  }
} 
else {
  die ("you are not allowed to see this page");
}
if(isset($_POST['create'])) {
  $icon = "<i><img src='../../images/group.png'style='width:2vw;height:4vh'></i>";
$name = ($_POST['name']);
$description = $_POST['description'];	
$emptyInput = $_groups_sqlhandler->check_empty($_POST, array('name', 'description'));

  if($emptyInput){
      echo    '<h5 style="text-align:center; color:red; padding:2%">'
                  .$emptyInput.
              '</h5>';
  }
  
else{
  $array = array( 
          // "icon" => "<i class='bi bi-people-fill fs-3'></i>",
          
    "name" => $name, 
    "description" => $description	
  ); 
  $_groups_sqlhandler->insert($array);  	
      ?>
     <script>
  window.location.href = "index.php";
  </script>
     <?php
}  
}
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
<script>
function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this user?")) {
    window.location.href = "delete_user.php?id=" + id + "&confirm=true";
  }
}
</script>
</body>
</html>