<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadfile"><br><br>
        <input type="submit" value="upload image">
    </form>
</body>
</html>
<?php

error_reporting(0);
$imgname= $_FILES["uploadfile"]["name"];
$tmpname= $_FILES["uploadfile"]["tmp_name"];
$folder="upload/".$imgname;
 move_uploaded_file($tmpname,$folder);
 echo"<img src='$folder' height='130px' width='150px'>";
?>
