<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];

    // Check admin credentials
    $login_sql = "SELECT * FROM admin WHERE admin_name='$admin_name' AND admin_password='$admin_password'";
    $login_result = $conn->query($login_sql);

    if ($login_result->num_rows > 0) {
        $_SESSION['admin_name'] = $admin_name;
        header("Location: admin_dashboard.php");
    } else {
        $error_message = "Invalid admin name or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.html';?>
    <div class="about-us">
        <h2>Admin Login</h2>
        <?php if (isset($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>
        <form action="admin_login.php" method="POST">
            <label for="admin_name">Admin Name:</label>
            <input type="text" id="admin_name" name="admin_name" required>
            
            <label for="admin_password">Password:</label>
            <input type="password" id="admin_password" name="admin_password" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
    <?php include 'footer.html';?>
</body>
</html>
