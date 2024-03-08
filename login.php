<?php
include "./db-conn.php";
session_start();
// Check if the user is not logged in and they are trying to access a page other than the login page
if (!isset($_SESSION['valid']) && basename($_SERVER['PHP_SELF']) != 'login.php') {
    header("Location: login.php");
    exit();
}

$msg = '';
// check whether username and password is empty or not , if it has a value then compare with the value in db
if ( !empty($_POST['email']) && !empty($_POST['password'])) {

    if (
        $_POST['email'] == 'itslatikajoshi@gmail.com' &&
        $_POST['password'] == 'admin'
    ) {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        if(isset($_SESSION['username']))
        {
            header("Location: ./display.php");
        }
        else{
            header("Location: ./login.php");
        }
       // $_SESSION['username'] = 'latika';

        header("Location: ./display.php");
    } else {
       echo $msg = 'Wrong username or password';
    }
}
