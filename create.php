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
if( empty($name))
{
    echo"Please fill name";
}
if( empty($email))
{
    echo"Please fill email";
}
if( empty($phone))
{
    echo"Please fill phone";
}
else
{
    if(strlen($phone)>10){
      echo "Please enter a valid phone number of 10 digits";die;
    }

    $sql = "INSERT INTO contacts(name,email,phone) VALUES 
    ('$name', '$email','$phone')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}




