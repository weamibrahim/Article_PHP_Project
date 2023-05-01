<?php
session_start();
include('../config/dbcon.php');
if(isset($_POST['logout']))
{
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    session_destroy();
    header('Location: login.php');
    exit(0);
}
