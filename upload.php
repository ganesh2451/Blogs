<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
<?php include 'contentheader.php';?>
    <div class="container-wel">
        <h1>Upload Your Blog</h1><br><br>       
        <form action="uploaddb.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Blog Title</label>
                <input type="text" id="title" name="title" required>
            </div>
           
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="img">Upload Image</label>
                <input type="file" id="img" name="img" accept="img/*">
            </div>
            <button type="submit" id="upload" name="upload">Submit Blog</button>
        </form>
    </div>
    <?php include 'footer.html';?>
    <br><br><br>
</body>
</html>

