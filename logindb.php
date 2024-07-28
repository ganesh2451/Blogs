<?php
if(isset($_POST['login']))
{
    $emailid=$_POST['emailid'];
    $password=$_POST['password'];
    include'dbconfig.php';
    $sql="select * FROM user WHERE emailid='$emailid' and password='$password';";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
        session_start();
        $user = $result->fetch_assoc();
        $_SESSION['username']=$emailid;
        $_SESSION['user_id'] = $user['id'];
        
        echo "<meta http-equiv='refresh' content='0;content.php'/>";
    }
else{
    echo "<script>alert('Invalid Username ot Password')</script>";
    echo "<meta http-equiv='refresh' content='0;login.php'/>";
}
}
else{
    header("location:login.php");
}
?>