<?php
include "./db-conn.php";

$id = $_GET['id'];
$sql = "DELETE FROM contacts WHERE id = ?";