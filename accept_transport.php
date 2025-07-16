<?php
session_start();
include 'database.php';

if (!isset($_SESSION['email'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'You must be logged in to accept transport.']);
    exit();
}

if (isset($_POST['recordId'])) {
    $recordId = $_POST['recordId'];

    // Retrieve the selected record from the original table
    $sql = "SELECT * FROM transport WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $recordId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $selectedRecord = $result->fetch_assoc();

        // Insert the selected record into the new table
        $insertSql = "INSERT INTO approved (title, description, description2, description3) VALUES (?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ssss", $selectedRecord['title'], $selectedRecord['description'], $selectedRecord['description2'], $selectedRecord['description3']);

        if ($insertStmt->execute()) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Record accepted and inserted into the new table.']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Error accepting the record.']);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Record not found.']);
    }

    $stmt->close();
}
?>
