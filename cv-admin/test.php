<?php
$page['title'] = 'test';
    $page['url'] = 'test.php';
    $page['heading'] = 'Test';
include 'includes/functions.php';
include 'includes/site_config.php';
include 'includes/header.php';
spl_autoload_register(function ($class_name) {
	include 'includes/classes/' . $class_name. '.php';
});
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php include 'includes/nav.php'; ?>
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?= ucwords($page['heading']) ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12" id="cv-post-content">
                    <?php 
                    	post::demo_view();
                    ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>   
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

</div>

   <?php include 'includes/footer.php'; ?>