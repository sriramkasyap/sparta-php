<?php 
    include 'includes/functions.php';    
    include 'includes/site_config.php';
    
    $request_array = explode('/',$_SERVER['REQUEST_URI']);
    if(empty(end($request_array))) {
        array_pop($request_array);
    }
    //print_r ($request_array);
    include 'includes/head.php';
?>
<body id="page-top">

<?php
    include 'includes/nav.php';
    $sql_posts = 'SELECT * FROM `' . TABLE_PREFIX . 'posts` WHERE `page_id` = 1 ORDER BY `post_pos` ASC';
    $result_posts = mysqli_query(connect_db(), $sql_posts);
    while($row_posts = mysqli_fetch_assoc($result_posts)) {
        echo $row_posts['post_content'];
    }
?>
</body>
<?php include 'includes/footer.php'; ?>