<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the SQL file
$sql = file_get_contents('database_setup.sql');

// Execute the multi-query
if ($conn->multi_query($sql)) {
    echo "Database setup successful!";
} else {
    echo "Error setting up database: " . $conn->error;
}

$conn->close();
?>
