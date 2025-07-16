<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Design Perfection, Design Perfection">
    <meta name="description" content="">
    <title>Transport </title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Transport-.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.16.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".accept-button").on("click", function () {
                // Get the record ID from the data attribute
                var recordId = $(this).data("record-id");

                // AJAX request to handle the "Accept" functionality
                $.ajax({
                    url: "Transport-.php", // Replace with your actual PHP script file
                    method: "POST",
                    data: { acceptButton: true, recordId: recordId },
                    success: function (response) {
                        alert(response); // You can replace this with a more user-friendly notification
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    
    
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/unnamed.jpg"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Transport">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-white u-xl-mode" data-lang="en">
    
    <?php
    session_start();
    include 'database.php';

    // Check if the user is logged in
    if (!isset($_SESSION['email'])) {
        header("Location: login.html");
        exit();
    }

    // Function to retrieve data from the database
    function fetchDataFromDatabase($conn)
    {
        $sql = "SELECT * FROM transport";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
    }

    // Function to insert data into a different table
function insertDataIntoNewTable($conn, $data)
{
    $sql = "INSERT INTO approved (title, description, description2, description3) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Assuming you have columns in your_new_table that match the data you want to insert
    $stmt->bind_param("ssss", $data['title'], $data['description'], $data['description2'], $data['description3']);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Main logic
$dataFromDatabase = fetchDataFromDatabase($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acceptButton"])) {
    $recordId = $_POST["recordId"];

    // Retrieve the selected record from the original table
    $sql = "SELECT * FROM transport WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $recordId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $selectedRecord = $result->fetch_assoc();

        // Insert the selected record into the new table
        if (insertDataIntoNewTable($conn, $selectedRecord)) {
            echo "Record accepted and inserted into the new table.";
        } else {
            echo "Error accepting the record.";
        }
    } else {
        echo "Record not found.";
    }

    $stmt->close();
}

    ?>
    
    <header class="u-clearfix u-header u-header" id="sec-316f"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="Home.html" class="u-image u-logo u-image-1" data-image-width="900" data-image-height="900">
          <img src="images/unnamed.jpg" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1" data-responsive-from="MD">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700;">
            <a class="u-button-style u-custom-border u-custom-border-color u-custom-borders u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-20 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="Home.html" style="padding: 10px;">Home</a>
</li><li class="u-nav-item"><a class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="Schedule.html" style="padding: 10px;">Schedule</a>
</li><li class="u-nav-item"><a class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="Transport-.php" style="padding: 10px;">Transport </a>
</li><li class="u-nav-item"><a class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="logout.php" style="padding: 10px;">Logout</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Schedule.html">Schedule</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Transport-.php">Transport </a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-section-1" id="sec-f291">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <a href="Transport-.php" class="u-align-center u-border-none u-btn u-button-style u-grey-15 u-text-palette-1-base u-btn-1">Available</a>
        <a href="Approved.php" class="u-align-center u-border-none u-btn u-button-style u-hover-grey-25 u-text-palette-1-base u-white u-btn-2">Approved</a>
      </div>
    </section>

    <?php foreach ($dataFromDatabase as $record) : ?>

    <section class="u-align-center u-clearfix u-white u-section-2" id="sec-830e">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-custom-color-1 u-expanded-width u-group u-shape-rectangle u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h4 class="u-text u-text-body-color u-text-1"><?php echo $record['title']; ?></h4>
          </div>
        </div>
        <div class="u-container-style u-expanded-width u-grey-15 u-group u-shape-rectangle u-group-2">
          <div class="u-container-layout u-container-layout-2">
            

          
          <button class="u-border-none u-btn u-btn-rectangle u-button-style u-color-scheme-summer-time u-hover-custom-color-1 u-palette-1-base u-radius-0 u-text-grey-90 u-btn-1 accept-button"
                            data-record-id="<?php echo $record['id']; ?>">Accept</button>
           <p class="u-text u-text-2"><?php echo $record['description']; ?><br><?php echo $record['description2']; ?><br><?php echo $record['description3']; ?>
            </p>
          </div>
        </div>
      </div>
    </section>
    <?php endforeach; ?>
   
    
    <footer class="u-align-center u-clearfix u-footer u-white u-footer" id="sec-ddd5"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Cape Peninsula University of Technology</p>
      </div></footer>
  
</body></html>