<!-- UPDATE contacts
SET name="Gaurav"
WHERE id=3; -->
<?php
include "./db-conn.php";

$sql= "UPDATE contacts SET name = ? email = ? phone = ?  WHERE id = ?";
// modified version of update query
// ? is a placeholder for the new value of the specified column.

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }