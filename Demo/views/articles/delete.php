<?php
session_start();
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("articles");

if(isset($_GET['deleteId'])){
    $id=$_GET['deleteId'];
    $result =$db->delete($id);
     var_dump($result);
if($result){
  $_SESSION['delete'] = "Deleted Successfully";
   header('location:show.php');
}
else{ 
    die ( mysqli_connect_error());
}

 }


?>