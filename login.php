<?php
include "./db-conn.php";
session_start();
$msg = '';
// check whether username and password is empty or not , if it has a value then compare with the value in db
if ( !empty($_POST['email']) && !empty($_POST['password'])) {

    if (
        $_POST['email'] == 'itslatikajoshi@gmail.com' &&
        $_POST['password'] == 'admin'
    ) {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'latika';

        header("Location: ./display.php");
    } else {
       echo $msg = 'Wrong username or password';
    }
}
