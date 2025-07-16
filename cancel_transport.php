<?php
session_start();
include 'database.php';

if (!isset($_SESSION['email'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'You must be logged in to cancel transport.']);
    exit();
}

if (isset($_POST['recordId'])) {
    $recordId = $_POST['recordId'];

    // Delete the record from the approved table
    $sql = "DELETE FROM approved WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $recordId);

    if ($stmt->execute()) {
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Transport cancellation successful.']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Error cancelling transport.']);
    }

    $stmt->close();
}
?>
