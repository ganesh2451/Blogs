<?php
session_start();
if(isset($_SESSION['username']))
{
$author = $_SESSION['username'];

include 'dbconfig.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$title = $_POST['title'];

$content = $_POST['content'];

// Handle file upload
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["img"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    echo "<script>alert('File is not an image.')</script>";
    echo "<meta http-equiv='refresh' content='0;content.php'/>";
    
    $uploadOk = 0;
}

// Check if file already exists


// Check file size
if ($_FILES["img"]["size"] > 3000000) { // 500KB limit
    echo "<script>alert('Sorry, your file is too large.')</script>";
    echo "<meta http-equiv='refresh' content='0;content.php'/>";
    
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
    echo "<meta http-equiv='refresh' content='0;content.php'/>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded')</script>";
    echo "<meta http-equiv='refresh' content='0;content.php'/>";
   
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        // File uploaded successfully
        $img = $target_file;

        // Prepare and bind
        $sql = $conn->prepare("INSERT INTO blogs (title, author, content, img) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $title, $author, $content, $img);

        // Execute the statement
        if ($sql->execute()) {
            echo "<script>alert('New blog uploaded successfully')</script>";
            echo "<meta http-equiv='refresh' content='0;upload.php'/>";
        } else {
            
            echo "Error: " . $sql->error;
        }

        // Close statement
        $sql->close();
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        echo "<meta http-equiv='refresh' content='0;upload.php'/>";
        
    }
}

// Close connection
$conn->close();
}
else{
    header("location:logout.php");
}
?>
