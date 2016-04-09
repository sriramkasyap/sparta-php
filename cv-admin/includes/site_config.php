<?php
    /* 
        File Name: site_config.php
        Author: Sriram Kasyap Meduri
        Organisation: Cove Venture
        Date: 06/02/2016
        Description: Configuration File for CV CMS.Consists of all the site related Data. This file is generated automatically from User on installation. Loaded every time any page in the website is requested, these values can be edited on any change in extenal configurations.
    */
    
    // Name of the Database of the website
    define ('DB_NAME', 'coveventure');

    // MySQL database User Name
    define ('DB_USER', 'root');
    
    // MySQL database Password
    define ('DB_PASS', 'admin');
    
    // MySQL Database Host Name
    define ('DB_HOST', 'localhost');
    
    // Prefix for all the tables belonging to the site
    define ('TABLE_PREFIX', 'site_');

    // Prefix for all the tables belonging to the site
    define ('ABS_PATH', 'http://localhost:8000/coveventure/');
    
    // Prefix for all the tables belonging to the site
    define ('ADMIN_PATH', ABS_PATH . 'cv-admin/');

    // Prefix for all the tables belonging to the site
    define ('CSS_PATH', ABS_PATH . 'css/');
    
    // Prefix for all the tables belonging to the site
    define ('JS_PATH', ABS_PATH . 'js/');
    
    // Prefix for all the tables belonging to the site
    define ('IMG_PATH', ABS_PATH . 'img/');

    // Prefix for all the tables belonging to the site
    define ('AUTHOR','Sriram Kasyap');
    
    //Fetch site configuration details from site_config table
    $sql_config = 'SELECT * FROM `' . TABLE_PREFIX . 'config`;';
    $result_config = mysqli_query(connect_db(),$sql_config);
    while($row_config = mysqli_fetch_assoc($result_config)) {
        define(strtoupper($row_config['config_name']), $row_config['config_content']);
    }
    //print_r ($configs);
?>
