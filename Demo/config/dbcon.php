<?php

$con = mysqli_connect("localhost", "root", "", "articlewebsite", "8111");

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