<?php
session_start();
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("groups");

if(isset($_GET['deleteId'])){
    $id=$_GET['deleteId'];
    $result =$db->delete($id);
if($result){
  $_SESSION['delete'] = "Deleted Successfully";
   header('location:show.php');
}
   
else{ 
  $_SESSION['warn'] = "Cannot delete: the group has users";
  header('location:show.php');
}
 }
 

?>
