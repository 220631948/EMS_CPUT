


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to sanitize input data
function sanitizeData($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Checking if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = sanitizeData($_POST['firstName']);
    $lastName = sanitizeData($_POST['lastName']);
    $studentEmail = sanitizeData($_POST['studentEmail']);
    $phoneNumber = sanitizeData($_POST['phoneNumber']);
    $password = sanitizeData($_POST['password']);
    $confirmPassword = sanitizeData($_POST['confirmPassword']);

    // Validating for empty fields
    if (empty($firstName) || empty($lastName) || empty($studentEmail) || empty($phoneNumber) || empty($password) || empty($confirmPassword)) {
        echo "Please fill in all fields.";
    } elseif (!filter_var($studentEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } elseif ($password !== $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'ems_db');
        if ($conn->connect_error) {
            echo "$conn->connect_error";
            die("Connection Failed : " . $conn->connect_error);
        } else {
            // Corrected SQL query and prepare statement
            $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, studentEmail, phoneNumber, password) VALUES (?, ?, ?, ?, ?)");
            // Binding parameters to the prepared statement
            $stmt->bind_param("sssss", $firstName, $lastName, $studentEmail, $phoneNumber, $hashedPassword);

            // Executing the prepared statement
            $execval = $stmt->execute();

            if ($execval) {
                // Redirect to a success page
                header("Location: success.html");
                exit();
            } else {
                // Redirect to a failure page
                header("Location: failure.html");
                exit();
            }

            $stmt->close();
            $conn->close();
        }
    }
}
?>