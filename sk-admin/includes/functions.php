<?php
    function connect_db($db_name) {
        $un = 'root';
        $pw = 'admin';
        $host = 'localhost';
        $link = mysqli_connect($host,$un,$pw,$db_name) or die(mysqli_error($link));
        date_default_timezone_set('Asia/Kolkata');
        return $link;
    }
?>