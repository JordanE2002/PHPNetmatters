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




<section class="latest-news-section">
        <div class="container">
            <div class="news-header">
                <h2>Latest News</h2>
                <h3>View all <span class="icon-arrow-right"></span></h3>
            </div>
           
            <div class="news-flexbox">
                <!-- News Card 1 -->
                <div class="news-card">
                    <div class="news-image">
                        
                        <img src="images/casestudy-box-1.webp" alt="News Article 1">
                        <a href="#" class="news-art-button">Career</a>
                        
                    </div>
                    <div class="news-content">
                        <h4>Business Development Executive</h4>
                        <p>Salary Ranges: £26-£36 per Annum + Bonus
                        Hours: 40 hours per week, Monday - Friday
                        Location: Wymondham</p>

                        <br>
                        <a href="#" class="news-button">Read More</a>
                    </div>
                    <div class="news-footer">
                        <div class="author-image">
                            <img src="images/rebecca-moore.webp" alt="Author">
                        </div>
                        <div class="author-info">
                            <p><b>Posted by Rebecca Moore</b></p>
                            <p>16th November 2024</p>
                        </div>
                    </div>
                </div>
                <!-- News Card 2 -->
                <div class="news-card">
                    <div class="news-image">
                        <img src="images/casestudy-box-2.webp" alt="News Article 2">
                        <a href="#" class="news-art-button">Career</a>
                    </div>
                    <div class="news-content">
                        <h4>Web Project Manager</h4>
                        <p>Salary Ranges: £26k-30k (DOE) + Bonus
                        Hours: 40 hours per week, Monday - Friday
                        Location: Cambridge</p>

                        <br>
                        <a href="#" class="news-button">Read More</a>
                    </div>
                    <div class="news-footer">
                        <div class="author-image">
                            <img src="images/bethany-shakespeare.webp" alt="Author">
                        </div>
                        <div class="author-info">
                            <p><b>Posted by Bethany-Shakespeare</b></p>
                            <p>12th November 2024</p>
                        </div>
                    </div>
                </div>
                <!-- News Card 3 -->
                <div class="news-card">
                    <div class="news-image">
                        <img src="images/casestudy-box-3.webp" alt="News Article 3">
                        <a href="#" class="news-art-button">Career</a>
                    </div>
                    <div class="news-content">
                        <h4>IT Support Technician</h4>
                        <p>Salary Ranges: £24k-28k (DOE) + Bonus
                         Hours: 40 hours per week, Monday - Friday
                        Location: Great Yarmouth</p>

                        <br>
                        <a href="#" class="news-button">Read More</a>
                    </div>
                    <div class="news-footer">
                        <div class="author-image">
                            <img src="images/netmatters-small-logo.webp" alt="Author">
                        </div>
                        <div class="author-info">
                            <p><b>Posted by Netmatters</b></p>
                            <p>25th November 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View All Link at the Bottom (for screens under 767px) -->
<div class="view-all-container">
    <a href="#" class="view-all-link">View All<span class="icon-arrow-right"></span></a>
</div>
        </div>
    </section>








<!-- Contact Section -->
<section>
<section>
    <div class="contact-container">
        <div class="contact-box">
            <div class="contact-text">
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
                            <label for="subject">Subject</label>
                            <label for="subject">*</label>
                            <input type="text" name="subject">
                        </div>
                        <label for="message">Message</label>
                        <label for="message">*</label>
                        <textarea rows="5" name="message"></textarea>
                        <button type="submit" name="formButton">Send Enquiry</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
            







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



    