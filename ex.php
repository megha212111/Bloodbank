<?php

// Load an image from jpeg URL 
$im = imagecreatefromjpeg(
    "C:/xampp/xammp/htdocs/bloodbank/images/image.jpg"
);

// Flip the image 
imageflip($im, 1);

// View the loaded image in browser 
header('Content-type: image/jpg');
imagejpeg($im);
imagedestroy($im);
?>