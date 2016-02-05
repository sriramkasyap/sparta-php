<?php 
    include 'includes/site_config.php';
    define(SITE, $site);
    $page_self = explode('/',$_SERVER['REQUEST_URI']);
    array_pop($page_self);
    //print_r ($page_self);
    include 'includes/head.php';
?>
<body id="page-top">

<?php
    include 'includes/connect.php';
    include 'includes/nav.php';
    $sql_posts = 'SELECT * FROM `site_posts` ORDER BY `post_pos` ASC';
    $result_posts = mysqli_query($link, $sql_posts);
    while($row_posts = mysqli_fetch_assoc($result_posts)) {
        echo $row_posts['post_content'];
    }
?>
</body>
<?php include 'includes/footer.php'; ?>