<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
 
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'ems_db');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Prepare a SQL statement to select the user with the given email
        $stmt = $conn->prepare("SELECT * FROM registration WHERE studentEmail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
 
        // Check if a user with the given email exists
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];
 
            // Verify the password
            if (password_verify($password, $storedPassword)) {
                // Password is correct, perform login and redirect to the transport page
                echo "Login successful!";
                header("Location: Transport-.php");
                 exit();
            }
        } else {
            // Display an error message if the email is not found
            echo "Email not found!";
        }
 
        // Close the statement and the connection
        $stmt->close();
        $conn->close();
    }
}
?>