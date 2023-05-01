<?php

require_once("../../vendor/autoload.php");

$db = new MySQLHandler("groups");

if(isset($_GET['deleteId'])){
    $id=$_GET['deleteId'];
  //var_dump($id);
    $result =$db->delete($id);
     var_dump($result);
if($result){
   // echo"sucess";
   header('location:show.php');
}
else{ 
  $_SESSION['status'] = "Access Denied";
}
   

 }
 

?>