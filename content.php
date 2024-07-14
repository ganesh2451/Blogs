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
        $username=$_SESSION['username'];
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
            while($row = $result->fetch_assoc()) {
                $email=$row['author'];
                $sql1 = "SELECT * FROM user WHERE emailid='$email'";
                $result1 = $conn->query($sql1);
        
                // Check if there are results
                if ($result1->num_rows > 0) {
                    // Output data of each row
                    while($row1 = $result1->fetch_assoc()) {
                        $aname=$row1['name'];
                    }
                }
                $id=$row['id'];
            $img=$row['img'];
                echo '<div class="content_page">';
                echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
                echo '<p><strong>Author:</strong> ' . $aname . '</p>';
                echo '<p>' . htmlspecialchars($row['content']) . '</p>';
                echo "<p><img src='$img' width='100%'/></p>";
                if($email==$username)
                {
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