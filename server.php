<?php
/**
 * Handles user login verification.
 *
 * This script receives a user's email and password via a POST request,
 * connects to the database, and verifies the credentials against the
 * 'registration' table. If the credentials are valid, the user is
 * redirected to the 'Transport-.php' page.
 */
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
                // You can set session variables or perform other actions here
                echo "Login successful!";
                header("Location: Transport-.php");
                 exit();
            } //else {
               // echo "Incorrect password!";
                //echo "Entered Password: " . $password . "<br>";
               // echo "Stored Password: " . $storedPassword . "<br>";
           // }
        } else {
            echo "Email not found!";
        }
 
        $stmt->close();
        $conn->close();
    }
}
?>