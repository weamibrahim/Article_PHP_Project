<?php
session_start();
include('../config/dbcon.php');

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email =  $_POST['email'];
    $password = $_POST['password'];

    $log_query = "select * FROM users WHERE Email='$email' AND password='$password'";
    $log_query_run = mysqli_query($con,$log_query);

    if(mysqli_num_rows($log_query_run) > 0)
    {
        foreach($log_query_run as $row){

            $user_id = $row['id'];
            $user_name = $row['userName'];
            $user_email = $row['Email'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email
        ];

        if(isset($_POST['remember_me'])){
            setcookie('email', $_POST['email'], time() + (86400 * 30), "/"); 
            setcookie('password', $_POST['password'], time() + (86400 * 30), "/");
        }
        else{
                setcookie('email' ,"" , time()-1, "/");
                setcookie('password' , "", time()-1, "/");
            }

        $_SESSION["email"] = $email;
        $_SESSION['status'] = "Logged in Sucessfully";

        header('Location: ../views/home/index.php');
    }
    else{
        $_SESSION['status'] = "Invalid Email or Password";
        header('Location: ../views/login.php');
    }
}
else{
    $_SESSION['status'] = "Access Denied";
    header('Location: ../views/login.php');
    exit();
}

?>



