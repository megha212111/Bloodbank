<?php
session_start();
unset($_SESSION['donate']);
header('location:index.php');
?>