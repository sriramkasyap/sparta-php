<?php
    $host = 'localhost';
    $username = 'root';
    $pass = 'admin';
    $dbname = 'cv_cms';
    $link = mysqli_connect($host,$username,$pass,$dbname) or die("ERROR: " . mysqli_error());
?>