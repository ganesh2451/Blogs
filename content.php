<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php
    
        include 'contentheader.php';
        session_start();
        $username = $_SESSION['username'];
        echo '<br><br><center><h1>Welcome To Our Blog Website</h1></center><br><br>';

        include 'dbconfig.php';

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to retrieve blog posts
        $sql = "SELECT * FROM blogs";
        $result = $conn->query($sql);

        // Check if there are results
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $email = $row['author'];
                $sql1 = "SELECT * FROM user WHERE emailid='$email'";
                $result1 = $conn->query($sql1);
        
                // Check if there are results
                if ($result1->num_rows > 0) {
                    // Output data of each row
                    while ($row1 = $result1->fetch_assoc()) {
                        $aname = $row1['name'];
                    }
                }
                $id = $row['id'];
                $img = $row['img'];
                $likes_sql = "SELECT COUNT(*) as count FROM likes WHERE post_id='$id'";
                $likes_result = $conn->query($likes_sql);
                $likes_count = $likes_result->fetch_assoc()['count'];
        
                // Fetch comments
                $comments_sql = "SELECT comments.id, comments.comment, comments.user_id, user.name 
                                 FROM comments 
                                 JOIN user ON comments.user_id = user.id 
                                 WHERE comments.post_id='$id' 
                                 ORDER BY comments.created_at DESC";
                $comments_result = $conn->query($comments_sql);
        
                echo '<div class="content_page">';
                echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
                echo '<p><strong>Author:</strong> ' . $aname . '</p>';
                echo '<p>' . htmlspecialchars($row['content']) . '</p>';
                echo "<p><img src='$img' width='100%'/></p>";
                echo '<p><strong>Likes:</strong> ' . $likes_count . '</p>';
                echo '<form action="like.php" method="POST">';
                echo '<input type="hidden" name="post_id" value="' . $id . '">';
                echo '<button id="like" class="like" type="submit">Like</button>';
                echo '</form>';
                
                echo '<h3>Comments</h3><br>';
                if ($comments_result->num_rows > 0) {
                    while ($comment_row = $comments_result->fetch_assoc()) {
                        echo '<p><strong>' . htmlspecialchars($comment_row['name']) . ':</strong> ' . htmlspecialchars($comment_row['comment']) . '</p>';
                        if ($_SESSION['user_id'] == $comment_row['user_id']) {
                            echo "<form method='POST' action='delete_comment.php' style='display:inline;'>
                                    <input type='hidden' name='comment_id' value='" . $comment_row['id'] . "'>
                                    <input type='submit' name='delete' value='Delete'>
                                  </form>";
                        }
                    }
                } else {
                    echo '<p>No comments yet.</p>';
                }
                echo '<form action="comment.php" method="POST">';
                echo '<input type="hidden" name="post_id" value="' . $id . '">';
                echo '<textarea name="comment" placeholder="Add a comment..." required></textarea>';
                echo '<button id="comment" class="comment" type="submit">Comment</button>';
                echo '</form>';
                if ($email == $username) {
                    echo "<p><a href='delcon.php?id=$id'>Delete</a></p>";
                }
                echo '</div>';
                echo '<hr>';
            }
        } else {
            echo "No blog posts found";
        }

        // Close connection
        $conn->close();
        echo '<br><br><br>';

        include 'footer.html';
    ?>

</body>
</html>
