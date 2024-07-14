<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>



<?php include 'header.html';?>

<form action="logindb.php" method="post">
  

  <div class="about-us">
    <label for="emailid"><b>Email id</b></label>
    <input type="text" placeholder="Enter Email id" name="emailid" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    
    <button type="submit" name="login" id="login">Login</button>
    <p>Don't Have an account?<a href="register.php"> register Here</a></p>
   
    <!-- <button type="button" class="cancelbtn">Cancel</button> -->
   
    
  </div>

  

  
</form>

<?php include 'footer.html';?>

</body>
</html>
   