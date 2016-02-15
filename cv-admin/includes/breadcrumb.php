<ol class="breadcrumb">
<?php 
    $url = $_SERVER['REQUEST_URI'];
    $uri = explode('/',$url);
    foreach ($uri as $bread) {
?>
    <li><i class="fa fa-dashboard"></i> <a href="#"><?= $bread ?></a></li>
<?php } ?>	
</ol>