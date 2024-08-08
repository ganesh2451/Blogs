<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    if (isset($_POST['comment_id']) && is_numeric($_POST['comment_id'])) {
        $comment_id = (int)$_POST['comment_id'];

        // Ensure the comment belongs to the logged-in user
        $stmt = $conn->prepare("SELECT * FROM comments WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $comment_id, $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt->close();

            // Proceed to delete the comment
            $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
            $stmt->bind_param("i", $comment_id);
            if ($stmt->execute()) {
                echo "<script>alert('Comment deleted successfully');</script>";
            } else {
                echo "<script>alert('Error deleting comment');</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('You can only delete your own comments');</script>";
        }
    } else {
        echo "<script>alert('Invalid comment ID');</script>";
    }
}

$conn->close();
header("Location: content.php"); // Adjust the redirection as needed
exit();
?>
