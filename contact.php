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





     <!-- CONTACT PAGE LINKS, TO BE ORDERED LATER -->
    <link rel="stylesheet" href="css/contact-form.css">
    <link rel="stylesheet" href="css/contact-top-footer.css">
    <link rel="stylesheet" href="css/contact-form.css">
    <link rel="stylesheet" href="css/contact-locations.css">



    <!-- External CSS Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div id="body-content">
        <div id="dark-overlay" class="overlay"></div>
        <div id="blocking-overlay"></div>

 
  <?php


include ("inc/header.php")


?>



<div class="footer-top">
    <div class="container">
  <p><b><a href="index.php">home</a></b>  /  Our Offices </p>
    </div>
</div>



<section class="latest-location-section">
    <div class="container">
        <div class="location-header">
            <h2>Latest Locations</h2>
            <h3>View all <span class="icon-arrow-right"></span></h3>
        </div>
       
        <div class="location-flexbox">
            <!-- Location Card 1 -->
            <div class="location-card">
                <div class="location-image">
                    <img src="images/Cambridge.jpg" alt="Location Article 1">
                </div>
                <div class="location-content">
                    <h4>Cambridge Office</h4>
                    <p>Unit 1.31,<br>
                    St John's Innovation Centre,<br>
                    Cowley Road, Milton,<br>
                    Cambridge,<br>
                    CB4 0WS</p>

                   <h5>01223 37 57 72</h5>

                    <a href="#" class="location-button">VIEW MORE</a>
                </div>
                </div>
            <!-- Location Card 2 -->
            <div class="location-card">
                <div class="location-image">
                    <img src="images/Wymondham.jpg" alt="Location Article 2">
                </div>
                <div class="location-content">
                    <h4>Wymondham Office</h4>
                    <p>Unit 15,<br>
                    Penfold Drive,<br>
                    Gateway 11 Business Park,<br>
                    Wymondham, Norfolk,<br>
                    NR18 0WZ</p>

                    <h5>01603 70 40 20</h5>
                    <a href="#" class="location-button">VIEW MORE</a>
                </div>
               
            </div>
            <!-- Location Card 3 -->
            <div class="location-card">
                <div class="location-image">
                    <img src="images/yarmouth-2.jpg" alt="Location Article 3">
                </div>
                <div class="location-content">
                    <h4>Great Yarmouth Office</h4>
                    <p>Suite F23,<br>
                    Beacon Innovation Centre,<br>
                    Beacon Park, Gorleston,<br>
                    Great Yarmouth, Norfolk,<br>
                    NR31 7RA</p>

                    <h5>01493 60 32 04</h5>
                    <a href="#" class="location-button">VIEW MORE</a>
                </div>
               
                   
            </div>
        </div>
        <!-- View All Link at the Bottom (for screens under 767px) -->
        <div class="view-all-container">
            <a href="#" class="view-all-link">View All<span class="icon-arrow-right"></span></a>
        </div>
    </div>
</section>







<section>
  <div class="contact-container">
    <div class="contact-box">
      <form name="contactForm" onsubmit="return validateForm()">
        <div class="input-row">
          <div class="input-group">
            <label for="firstName">First Name </label>
            <label for="firstName">*</label>
            <input type="text" name="firstName">
          </div>
          <div class="input-group">
            <label for="companyName">Company Name</label>
            <input type="text" name="companyName">
          </div>
          <div class="input-group">
            <label for="email">Email</label>
            <label for="email">*</label>
            <input type="email" name="email">
          </div>
          <div class="input-group">
  <label for="number">Number</label>
  <label for="number">*</label>
  <input type="text" name="number">
</div>

          <label for="message">Message</label>
          <label for="message">*</label>
          <textarea rows="5" name="message"></textarea>
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
  </div>
</section>






<?php
// Database connection details
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'PHPNetmatters';

// Create connection
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if form data was sent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $companyName = $_POST['companyName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare SQL query to insert form data
    $stmt = $mysqli->prepare("INSERT INTO `contact-form` (name, companyName, email, phone_Number, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $companyName, $email, $subject, $message);

    // Execute the query
    if ($stmt->execute()) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
}
?>



<?php 
include 'inc/footer.php'

?>
  
<!-- Cookie Popup Section -->

<div id="cookie-popup">
    <div class="cookie-content">
        <h2>Cookies Policy</h2>+
        <p>Our website uses cookies. This helps us provide you with a good experience on our website. To see what cookies we use and what they do, and to opt-in on non-essential cookies, click "change settings". For a detailed explanation, click on "Privacy Policy", otherwise click "Accept Cookies" to enter.</p>
        <div class="cookie-buttons">
            <button id="change-settings">Change Settings</button>
            <button id="accept-cookies">Accept Cookies</button>
        </div>
    </div>
</div>




       <!--Consent -->
        <button id="consent">Manage Consent</button>

        
    


    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/slick/slick.min.js"></script>
    <script src="js/main.js"></script>
    
</div>



</body>
</html>



    