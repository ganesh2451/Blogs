<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment'];

    $comment_sql = "INSERT INTO comments (post_id, user_id, comment) VALUES ('$post_id', '$user_id', '$comment')";
    if ($conn->query($comment_sql) === TRUE) {
        echo "Comment added successfully";
    } else {
        echo "Error: " . $comment_sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: content.php");
?>
