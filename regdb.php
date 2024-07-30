<?php
if(isset($_POST['register'])) 
{
    $emailid = $_POST['emailid'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $repass = $_POST['repass'];
    $description = $_POST['description'];
    $dob = $_POST['dob'];

    include 'dbconfig.php';
    
    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM user WHERE emailid = ?");
    $stmt->bind_param("s", $emailid);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0) 
    {
        echo "<script>alert('Email ID already exists. Please try a different email ID.')</script>";
        echo "<meta http-equiv='refresh' content='0;register.php'/>";
    }
    else 
    {
        if($password == $repass) 
        {
            $stmt = $conn->prepare("INSERT INTO user (emailid, name, password, description, dob) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $emailid, $name, $password, $description, $dob);
            if($stmt->execute()) 
            {
                echo "<script>alert('Data added successfully')</script>";
                echo "<meta http-equiv='refresh' content='0;login.php'/>";
            } 
            else 
            {
                echo "<script>alert('Error adding data')</script>";
                echo "<meta http-equiv='refresh' content='0;register.php'/>";
            }
        } 
        else 
        {
            echo "<script>alert('Passwords do not match')</script>";
            echo "<meta http-equiv='refresh' content='0;register.php'/>";
        }
    }
    $stmt->close();
    $conn->close();
}
else 
{
    header("location:register.php");
}
?>
