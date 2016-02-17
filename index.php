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
    if(isset($_GET['sid'])){
        $where = ' WHERE `snippet_id` = ' . $_GET['sid'];
        $table = 'snippets`';
        $order = '';
        $content = 'snippet_content';
    }
    else {
        $where = ' WHERE `page_id` = 1';
        $table = 'posts`';
        $order = ' ORDER BY `post_pos` ASC';
        $content = 'post_content';
    }
    $sql_posts = 'SELECT * FROM `' . TABLE_PREFIX . $table . $where . $order;
    $result_posts = mysqli_query(connect_db(), $sql_posts);
    while($row_posts = mysqli_fetch_assoc($result_posts)) {
        echo $row_posts[$content];
    }
?>
</body>
<?php include 'includes/footer.php'; ?>