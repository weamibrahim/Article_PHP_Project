<?php

require_once("../../vendor/autoload.php");

$db = new MySQLHandler("users");

if(isset($_GET['deleteId'])){
    $id=$_GET['deleteId'];

    $result =$db->delete($id);
     var_dump($result);
if($result){

   header('location:user_show.php');
}
else{ 
    die ( mysqli_connect_error());
}
   

 }
 

?>