<?php

$con = mysqli_connect("localhost", "root", "password", "articlewebsite", "3307");

// Check Connection
if(!$con)
{
    // header("Location: ../errors/db.php");
    // die();
    //die(mysqli_connect_errno($con));
    echo "Database Connection failed!.";
}
// else{
//     echo "Database Connected.";
// }
?>