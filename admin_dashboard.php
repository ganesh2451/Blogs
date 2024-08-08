<?php
session_start();

if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}

include 'dbconfig.php';

if (isset($_POST['delete'])) {
    if (isset($_POST['blog_id']) && is_numeric($_POST['blog_id'])) {
        $blog_id = (int)$_POST['blog_id']; // Ensure it is an integer

        // Start transaction
        $conn->begin_transaction();

        try {
            // Delete related comments
            $stmt = $conn->prepare("DELETE FROM comments WHERE post_id = ?");
            $stmt->bind_param("i", $blog_id);
            $stmt->execute();
            $stmt->close();

            // Delete related likes
            $stmt = $conn->prepare("DELETE FROM likes WHERE post_id = ?");
            $stmt->bind_param("i", $blog_id);
            $stmt->execute();
            $stmt->close();

            // Delete blog post
            $stmt = $conn->prepare("DELETE FROM blogs WHERE id = ?");
            $stmt->bind_param("i", $blog_id);
            $stmt->execute();
            $stmt->close();

            // Commit transaction
            $conn->commit();

            echo "<script>alert('Blog deleted Successfully')</script>";
            echo "<meta http-equiv='refresh' content='0;admin_dashboard.php'/>";
        } catch (mysqli_sql_exception $exception) {
            // Rollback transaction if any error occurs
            $conn->rollback();
            echo "Error deleting blog: " . $exception->getMessage();
        }
    } else {
        echo "Invalid blog ID";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="admin-dash">
    <center><h1>Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?></h1>
    <p>This is the admin dashboard.</p></center>
    <a href="logout.php">Logout</a>

    <h2>Submitted Feedbacks</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Country</th>
            <th>Feedback</th>
            <th>Submitted At</th>
        </tr>
        <?php
        $sql = "SELECT * FROM contact_form";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['country']) . "</td>";
                echo "<td>" . htmlspecialchars($row['subject']) . "</td>";
                echo "<td>" . $row['submitted_at'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No feedback submitted</td></tr>";
        }
        ?>
    </table>

    <h2>Blog Posts</h2>
    <table border="1">
        <tr>
            
            <th>Title</th>
            <th>Content</th>
            
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM blogs";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['content']) . "</td>";
                
                echo "<td>
                    <form method='POST' action='' style='display:inline;'>
                        <input type='hidden' name='blog_id' value='" . $row['id'] . "'>
                        <input type='submit' name='delete' value='Delete'>
                    </form>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No blogs available</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    </div>
    <?php include 'footer.html';?>
</body>
</html>
