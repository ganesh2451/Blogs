<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Registration Form</title>
</head>
<body>

<?php include 'header.html';?>


    <div class="about-us">
        <h1>Register</h1>
        <br>
        <form action="regdb.php" method="POST">
            <label for="emailid"><b>Email-Id</b></label>
            <input type="text" placeholder="Enter email id" name="emailid" id="emailid" required>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter name" name="name" id="name" required>

            <label for="dob"><b>Date Of Birth</b></label>
            <input type="date" name="dob" id="dob" required>

            <label for="description"><b>Description</b></label>
            <input type="text" placeholder="Enter description" name="description" id="description" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <label for="repass"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="repass" id="repass" required>

           
            
            <button type="submit" class="register" name="register"><span>Register</span></button>
            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
            <br>
            <br>
        </form>
        
        <br>
    </div>


<?php include 'footer.html';?>

</body>
</html>
