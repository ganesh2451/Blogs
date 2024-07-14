<?php
include "dbconfig.php";
$id=$_GET['id'];
$sql="DELETE FROM blogs WHERE `id` = '$id';";
if($conn->query($sql))
{
    echo "<script>alert('Delted Succesfully')</script>";
    echo "<meta http-equiv='refresh' content='0;content.php'/>";

}
else{
    echo "<script>alert('Error to delete File')</script>";
    echo "<meta http-equiv='refresh' content='0;content.php'/>";
}
?>