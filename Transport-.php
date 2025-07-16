<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <header class="header">
        <h1>Transport</h1>
    </header>
    <nav class="nav">
        <a href="Home.html">Home</a>
        <a href="Schedule.html">Schedule</a>
        <a href="Transport-.php">Transport</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
        <div class="tabs">
            <a href="Transport-.php" class="active">Available</a>
            <a href="Approved.php">Approved</a>
        </div>
        <div id="notification" class="notification"></div>
        <?php
            session_start();
            include 'database.php';

            if (!isset($_SESSION['email'])) {
                header("Location: login.html");
                exit();
            }

            function fetchDataFromDatabase($conn) {
                $sql = "SELECT * FROM transport";
                $result = $conn->query($sql);
                return $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];
            }

            $dataFromDatabase = fetchDataFromDatabase($conn);
        ?>
        <?php foreach ($dataFromDatabase as $record) : ?>
            <div class="transport-item">
                <h3><?php echo $record['title']; ?></h3>
                <p><?php echo $record['description']; ?></p>
                <p><?php echo $record['description2']; ?></p>
                <p><?php echo $record['description3']; ?></p>
                <button class="accept-button" data-record-id="<?php echo $record['id']; ?>">Accept</button>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        $(document).ready(function () {
            $(".accept-button").on("click", function () {
                var recordId = $(this).data("record-id");
                $.ajax({
                    url: "accept_transport.php",
                    method: "POST",
                    data: { recordId: recordId },
                    dataType: "json",
                    success: function (response) {
                        $("#notification").text(response.message).fadeIn().delay(3000).fadeOut();
                    },
                    error: function (error) {
                        console.error(error);
                        $("#notification").text("An error occurred.").fadeIn().delay(3000).fadeOut();
                    }
                });
            });
        });
    </script>
</body>
</html>