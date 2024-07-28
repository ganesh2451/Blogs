<?php
session_start();

if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}

include 'dbconfig.php';
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

    <h2>Submitted Contact Forms</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Country</th>
            <th>Subject</th>
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
            echo "<tr><td colspan='6'>No contact forms submitted</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    </div>
    
</body>
</html>
