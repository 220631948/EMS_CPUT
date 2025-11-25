


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Sanitizes input data by trimming whitespace, removing backslashes, and converting special characters to HTML entities.
 *
 * @param string $data The input data to be sanitized.
 * @return string The sanitized data.
 */
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

    // Validating for empty fields
    if (empty($firstName) || empty($lastName) || empty($studentEmail) || empty($phoneNumber) || empty($password)) {
        echo "Please fill in all fields.";
    } elseif (!filter_var($studentEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'ems_db');
        if ($conn->connect_error) {
            echo "$conn->connect_error";
            die("Connection Failed : " . $conn->connect_error);
        } else {
            // Corrected SQL query and prepare statement
            $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, studentEmail, phoneNumber, password) VALUES (?, ?, ?, ?, ?)");
            // Binding parameters to the prepared statement
            $stmt->bind_param("sssss", $firstName, $lastName, $studentEmail, $phoneNumber, $password);

            // Executing the prepared statement
            $execval = $stmt->execute();

            if ($execval) {
                //alert ("Data uploaded successfully!");
                // You can redirect the user to another page using header if needed
                 header("Location: login.html");
                 exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
    }
}
?>