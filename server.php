<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'ems_db');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT * FROM registration WHERE studentEmail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
 
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];
 
            // Verify password
            if (password_verify($password, $storedPassword)) {
                // Password is correct, perform login
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_email'] = $row['studentEmail'];
                header("Location: transport.php");
                 exit();
            } else {
                header("Location: login.php?error=1");
                exit();
           }
        } else {
            header("Location: login.php?error=1");
            exit();
        }
 
        $stmt->close();
        $conn->close();
    }
}
?>