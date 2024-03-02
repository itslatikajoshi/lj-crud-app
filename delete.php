<?php
include "./db-conn.php";
// print_r($_REQUEST);die;
$id = $_GET['id'];

try {
    // echo "testing";
    // die;
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
} catch (Exception $e) {

    echo "An error occurred: " . $e->getMessage() . $e->getLine();
}

$stmt->close();
$conn->close();
