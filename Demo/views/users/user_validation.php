
<?php
function validateName($name) {
    if (strlen($name) > MAX_LENGTH) {
        return "Name is too long";
    } elseif (strlen($name) < MIN_LENGTH) {
        return "Name is too short";
    } else {
        return "";
    }
}

//-----------------------------------------------------------------------------------------------------------
function validatePassword($password) {
    if (strlen($password) < PASS_MIN_LENGTH ) {
        return "Password must be at least 5 characters long";
    } elseif (strlen($password) > PASS_MAX_LENGTH) {
        return "Password is too long it must be less than 10";
    }
    elseif ( !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        return "Password must contain at least one uppercase letter, one lowercase letter, and one number.";
    } 
     else {
        return "";
    }
}

//-----------------------------------------------------------------------------------------------------------
function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Please enter a valid email ";
    } 
}

//-----------------------------------------------------------------------------------------------------------
function validateUsername($username) {
    if (strlen($username) > MAX_LENGTH) {
        return "Username is too long it must be less than 20";
    } elseif (strlen($username) < MIN_LENGTH) {
        return "Username must be at least 5 characters long";
    } else {
        return "";
    }
}
?>