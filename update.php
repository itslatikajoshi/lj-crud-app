<!-- UPDATE contacts
SET name="Gaurav"
WHERE id=3; -->
<?php
include "./db-conn.php";
$sql= "UPDATE contacts SET name='Joshi' WHERE id=3";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }