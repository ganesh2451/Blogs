<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];

    // Check if the user has already liked the post
    $check_sql = "SELECT * FROM likes WHERE post_id='$post_id' AND user_id='$user_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows == 0) {
        $like_sql = "INSERT INTO likes (post_id, user_id) VALUES ('$post_id', '$user_id')";
        if ($conn->query($like_sql) === TRUE) {
            echo "Liked successfully";
        } else {
            echo "Error: " . $like_sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
header("Location: content.php");
?>
