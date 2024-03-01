<?php
include "./db-conn.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql= "UPDATE contacts SET name = ? ,email = ? ,phone = ?  WHERE id = ?";
// modified version of update query
// ? is a placeholder for the new value of the specified column.
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $email, $phone, $id);

if ($stmt->execute()) {
  // Redirect back to the contacts list or another appropriate page
  header("Location: /crud-latika");
  exit();
} else {
  echo "Error updating contact: " . $conn->error;
}
$stmt->close();
$conn->close();