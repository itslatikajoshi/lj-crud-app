<?php
include "./db-conn.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql= "UPDATE contacts SET name = ? email = ? phone = ?  WHERE id = ?";
// modified version of update query
// ? is a placeholder for the new value of the specified column.

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }