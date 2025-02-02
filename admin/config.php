<?php
// admin/config.php

$servername = "localhost";
$db_username = "root"; // Replace with your DB username
$db_password = "";     // Replace with your DB password
$dbname = "sasen_migration";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
