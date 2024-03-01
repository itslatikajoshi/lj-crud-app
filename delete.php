<?php
include "./db-conn.php";

$id = $_GET['id'];
$sql = "DELETE FROM contacts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: /crud-latika/");
    exit(); // Ensure no further execution of the script
} else {
    echo "Error deleting contact: " . $conn->error;
}

$stmt->close();
$conn->close();