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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>

<h2>Contact Form</h2>

<!-- Contact form -->
<form method="POST" action="">
    <label for="firstName">First Name *</label>
    <input type="text" name="firstName" required><br><br>

    <label for="companyName">Company Name</label>
    <input type="text" name="companyName"><br><br>

    <label for="email">Email *</label>
    <input type="email" name="email" required><br><br>

    <label for="subject">Number *</label>
    <input type="text" name="number" required><br><br>

    <label for="message">Message *</label>
    <textarea name="message" required></textarea><br><br>

    <button type="submit">Send Enquiry</button>
</form>

<h2>Submitted Contact Form Entries</h2>

<?php
// Check if there are any records
if ($result->num_rows > 0) {
    // Display the records in a table
    echo '<table border="1">';
    echo '<tr><th>Name</th><th>Company Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>';

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

// Close the connection
$mysqli->close();

?>

</body>
</html>
