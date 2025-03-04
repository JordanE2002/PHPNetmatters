<?php
// Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Database connection details from .env
$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'];
$dbname = $_ENV['DB_DATABASE'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

// Create a MySQLi connection
$mysqli = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if form data was sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error array to store validation messages
    $errors = [];

    // Get form data
    $firstName = trim($_POST['firstName']);
    $companyName = trim($_POST['companyName']);
    $email = trim($_POST['email']);
    $number = trim($_POST['number']);
    $message = trim($_POST['message']);

    // Regex patterns
    $nameRegex = '/^[A-Za-z]+$/'; // Name validation (only letters)
    $emailRegex = '/^[a-zA-Z0-9_+&*-]+(?:\.[a-zA-Z0-9_+&*-]+)*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,7}$/'; // Email validation
    $phoneRegex = '/^0\d{10}$/'; // Phone validation (starts with 0 and is 11 digits)

    // Validate first name (must be letters only)
    if (empty($firstName)) {
        $errors[] = "First name is required.";
    } elseif (!preg_match($nameRegex, $firstName)) {
        $errors[] = "First name must contain only letters.";
    }

    // Validate email (must be a valid email format)
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!preg_match($emailRegex, $email)) {
        $errors[] = "Invalid email format.";
    }

    // Validate phone number (must match the regex)
    if (empty($number)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match($phoneRegex, $number)) {
        $errors[] = "Phone number must be 11 digits long and start with 0.";
    }

    // Validate message (must not be empty)
    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    } else {
        // Prepare SQL query to insert form data into the database
        $stmt = $mysqli->prepare("INSERT INTO contactform (fullName, companyName, email, phoneNumber, emailMessage) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstName, $companyName, $email, $number, $message);

        // Execute the query and check if successful
        if ($stmt->execute()) {
            echo "<p>Success! Your message has been sent.</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $mysqli->close();
}
