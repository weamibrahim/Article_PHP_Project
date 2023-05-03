<?php

$con = mysqli_connect("localhost", "root", "", "articlewebsite", "3307");

// Check Connection
if(!$con)
{
    echo "Database Connection failed!.";
}
// else{
//     echo "Database Connected.";
// }
?>