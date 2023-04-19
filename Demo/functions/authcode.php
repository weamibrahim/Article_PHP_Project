<?php
include('../config/dbcon.php');
// echo $_POST['name'];
// echo $_POST['email'];
// echo $_POST['password'];
if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $group = mysqli_real_escape_string($con, $_POST['group']);
    $insert_query = "Insert INTO users(userName,Email,password,groupId) VALUES('$name','$email','$password','$group')";
    $insert_query_run = mysqli_query($con, $insert_query);
}
?>