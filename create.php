<?php
include "./db-conn.php";

$name = $_REQUEST["fullname"];
$email = $_REQUEST["email"];
$phone = $_REQUEST["phone"];

/* 
Notes:
We get form data by

$_GET
$_POST
$_REQUEST

*/
if (empty($name)) {
    echo "Please fill name";
}
if (empty($email)) {
    echo "Please fill email";
}
if (empty($phone)) {
    echo "Please fill phone";
} else {
    if (strlen($phone) > 10) {
        echo "Please enter a valid phone number of 10 digits";
        die;
    }
    try {
        $sql = "INSERT INTO contacts(name, email, phone) VALUES ('$name', '$email', '$phone')";
        if ($conn->query($sql) === TRUE) {
            header("Location: ./display.php");
        }
    } catch (Exception $e) {
        if ($conn->errno == 1062) {
            // Duplicate entry error
            header("Location: ./index.php?error=Error: Duplicate entry detected.");
            // Handle the error 
        } else {
            echo $e->getMessage() . " on line " . $e->getLine();
        }
        die;
    }
}
