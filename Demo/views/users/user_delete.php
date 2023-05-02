<?php
session_start();
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("users");

if(isset($_GET['deleteId'])){
    $id=$_GET['deleteId'];
    $result =$db->delete($id);
if($result){
  $_SESSION['status'] = "Deleted Successfully";
   header('location:user_show.php');
}
   
else{ 
  $_SESSION['status'] = "Cannot delete: the users has transactions";
  header('location:user_show.php');
}
 }
 

?>
