<?php
// Database connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'PHPNetmatters';

// Create a new connection
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($mysqli->connect_errno) {
    printf("Connection failed: %s", $mysqli->connect_error);
    exit();
}

// Handle form submission and insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clean and sanitize input
    $firstName = htmlspecialchars($_POST['firstName']);
    $companyName = htmlspecialchars($_POST['companyName']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['number']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Insert the data into the database
    $stmt = $mysqli->prepare("INSERT INTO contactform (fullName, companyName, email, phoneNumber, emailMessage) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $companyName, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch and display form data from the database
$query = "SELECT * FROM contactform";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="ROBOTS" content="NOINDEX,NOFOLLOW">
    <title>Full Service Digital Agency | Cambridgeshire & Norfolk | Netmatters</title>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="js/slick/slick.css">
    <link rel="stylesheet" href="js/slick/slick-theme.css">
    <link rel="stylesheet" href="css/contact-form.css">
    <link rel="stylesheet" href="css/contact-top-footer.css">
    <link rel="stylesheet" href="css/contact-locations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div id="body-content">
        <div id="dark-overlay" class="overlay"></div>
        <div id="blocking-overlay"></div>

        <!-- Contact Page Section -->
        <section class="contact-container">
            <div class="contact-box">
                <form method="POST" action="">
                    <div class="input-row">
                        <div class="input-group">
                            <label for="firstName">First Name *</label>
                            <label for="firstName">*</label>
                            <input type="text" name="firstName" required>
                        </div>
                        <div class="input-group">
                            <label for="companyName">Company Name</label>
                            <input type="text" name="companyName">
                        </div>
                        <div class="input-group">
                            <label for="email">Email *</label>
                            <label for="email">*</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="input-group">
                            <label for="number">Number *</label>
                            <label for="number">*</label>
                            <input type="text" name="number" required>
                        </div>

                        <label for="message">Message *</label>
                        <label for="message">*</label>
                        <textarea rows="5" name="message" required></textarea>

                        <button type="submit" name="formButton">Send Enquiry</button>
                    </div>
                </form>
            </div>

            <!-- New Text Section -->
            <div class="contact-text">
                <h3>Get in Touch</h3>
                <h2>sales@netmatters.com</h2>
                <h3>Business hours:</h3>
                <h3>Monday - Friday 07:00 - 18:00 </h3>
                <h3 id="out-of-hours-heading">Out of Hours IT Support <i class="icon-arrow-down"></i></h3>
                <p id="out-of-hours-info">Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.
                    Monday - Friday 18:00 - 22:00 Saturday 08:00 - 16:00
                    Sunday 10:00 - 18:00
                    To log a critical task, you will need to call our main line number and select Option 2 to leave an Out of Hours voicemail. A technician will contact you on the number provided within 45 minutes of your call.</p>
            </div>
        </section>

        <!-- Display the submitted contact form entries -->
        <section>
            <h2>Submitted Contact Form Entries</h2>
            <?php
            // Check if there are any records
            if ($result->num_rows > 0) {
                // Display the records in a table
                echo '<table border="1">';
                echo '<tr><th>Name</th><th>Company Name</th><th>Email</th><th>Number</th><th>Message</th></tr>';

                // Fetch and display each row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['fullName']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['companyName']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['phoneNumber']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['emailMessage']) . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo 'No submissions found.';
            }
            ?>
        </section>

    </div>

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/slick/slick.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php
// Close the connection
$mysqli->close();
?>
