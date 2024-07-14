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
    if($password == $repass) 
    {
        $sql = "INSERT INTO user (emailid, name, password, description, dob) VALUES ('$emailid', '$name', '$password', '$description', '$dob')";
        if($conn->query($sql)) 
        {
            echo "<script>alert('Data added successfully')</script>";
            echo "<meta http-equiv='refresh' content='0;login.html'/>";
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
else 
{
    header("location:register.php");
}
?>
