<?php
session_start();
require_once("../../vendor/autoload.php");

$db = new MySQLHandler("groups");

if(isset($_GET['deleteId'])){
    $id=$_GET['deleteId'];
    $result =$db->delete($id);
if($result){
  $_SESSION['status'] = "Deleted Successfully";
   header('location:show.php');
}
   
else{ 
  $_SESSION['status'] = "Cannot delete: the group has transactions";
  header('location:show.php');
}
 }
 

?>