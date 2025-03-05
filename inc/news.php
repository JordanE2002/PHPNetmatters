<?php
require_once 'connection.php'; 

// Fetch the latest 3 news posts from the database
$query = "SELECT title, description, category, author, post_date FROM news_posts ORDER BY post_date DESC LIMIT 3";
$result = $mysqli->query($query); 
?>



<!--  Nor,al css to get titles and the images-->
<section class="latest-news-section">
    <div class="container">
        <div class="news-header">
            <h2>Latest News</h2>
            <h3>View all <span class="icon-arrow-right"></span></h3>
        </div>

        <div class="news-flexbox">
            <?php
            $image_paths = [
                'images/casestudy-box-1.webp',
                'images/casestudy-box-2.webp',
                'images/casestudy-box-3.webp'
            ];
            
            $author_images = [
                'images/rebecca-moore.webp',
                'images/bethany-shakespeare.webp',
                'images/netmatters-small-logo.webp'
            ];
            
            $index = 0; // starts at the index 0
            while ($row = $result->fetch_assoc()): //goes through each table row
            ?>
                <div class="news-card">
                    <div class="news-image">
                        <img src="<?php echo $image_paths[$index]; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                        <a href="#" class="news-art-button"><?php echo htmlspecialchars($row['category']); ?></a>
                    </div>
                    <div class="news-content">
                        <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                        <br>
                        <a href="#" class="news-button">Read More</a>
                    </div>
                    <div class="news-footer">
                        <div class="author-image">
                            <img src="<?php echo $author_images[$index]; ?>" alt="Author">
                        </div>
                        <div class="author-info">
                            <p><b>Posted by <?php echo htmlspecialchars($row['author']); ?></b></p>
                            <p><?php echo date('jS F Y', strtotime($row['post_date'])); ?></p>
                        </div>
                    </div>
                </div>

                <!--after getting the details, on to the next-->
            <?php 
            $index++; 
            endwhile; 
            ?>
        </div>

        <div class="view-all-container">
            <a href="#" class="view-all-link">View All<span class="icon-arrow-right"></span></a>
        </div>
    </div>
</section>

<?php
$mysqli->close(); // Close the database connection
?>
