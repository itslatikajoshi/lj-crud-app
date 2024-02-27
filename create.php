<?php
include "./db-conn.php";
// echo '<pre>';
// print_r($_REQUEST);
// die;
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

$sql = "INSERT INTO contacts(name,email,phone) VALUES 
('$name', '$email','$phone')";

// echo $sql;die;

if ($conn->query($sql) === TRUE) {
    header("Location: ./index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
