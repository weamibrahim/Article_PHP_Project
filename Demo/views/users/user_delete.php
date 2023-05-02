<?php
session_start();
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("users");

if(isset($_GET['deleteId'])){
    $id=$_GET['deleteId'];
    $result =$db->delete($id);
if($result){
  $_SESSION['delete'] = "Deleted Successfully";
   header('location:user_show.php');
}
   
else{ 
  $_SESSION['warn'] = "Cannot delete: the users has articles";
  header('location:user_show.php');
}
 }
 

?>
