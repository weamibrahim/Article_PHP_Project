<?php

// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "articlewebsite";

// Connection
//$con = mysqli_connect($host,$username,$password,$database);
$con = mysqli_connect("localhost", "root", "password", "articlewebsite", "3307");

// Check Connection
if(!$con)
{
    header("Location: ../errors/db.php");
    die();
    //die(mysqli_connect_errno($con));
}
else{
    echo "Database Connected.";
}
?>