<?php 
    // Fetch links from site_links table
    $sql_link = 'SELECT * FROM `' . TABLE_PREFIX . 'links`;';
    $result_link = mysqli_query(connect_db(),$sql_link);
    $links = array();
    while($row_link = mysqli_fetch_assoc($result_link)) {
        $links[] = array('link_rel' => $row_link['link_rel'], 'link_type' => $row_link['link_type'], 'link_href' => $row_link['link_href']);
    }
    //print_r ($links);
    // Fetch meta tags from site_meta table
    $sql_meta = 'SELECT * FROM `' . TABLE_PREFIX . 'meta`;';
    $result_meta = mysqli_query(connect_db(),$sql_meta);
    $metas = array();
    while($row_meta = mysqli_fetch_assoc($result_meta)) {
        $metas[] = array('meta_name' => $row_meta['meta_name'], 'meta_content' => $row_meta['meta_content']);
    }
    //print_r ($metas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=<?= strtolower(CHARSET) ?>">
    
    <?php
        foreach($metas as $meta) {
    ?>
    <meta name="<?= $meta['meta_name'] ?>" content="<?= $meta['meta_content'] ?>">
    <?php } ?>
    <meta name="description" content="<?= DESCRIPTION ?>">
    <meta name="author" content="<?= AUTHOR ?>">
    <title><?= TITLE ?></title>
    <?php
        foreach($links as $link) {
    ?>
    <link rel="<?= $link['link_rel'] ?>" href="<?= $link['link_href'] ?>" type="<?= $link['link_type'] ?>">
    <?php } ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>