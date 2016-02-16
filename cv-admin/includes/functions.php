<?php
    function connect_db() {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("ERROR: " . mysqli_error());
        return $link;
    } 
    
    function underToUpper($str) {
    	$str = str_replace('_', ' ', $str);
    	$str = ucwords($str);
    	return $str;
    }
?>