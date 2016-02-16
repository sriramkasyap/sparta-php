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
                    <div class="col-lg-6">
                     <?php 
						$string = 'start_bootstrap_header';
						$new_post = new $string();
						
							//$new_post->create_post();
							//$new_post->printer();
						if(isset($_POST['submit'])) {
							//print_r ($_POST);
							
							$new_post->submit_form($_POST);
							//$new_post->printer();
							//$new_post->publish_post();
						}
						else {
							$new_post->create_form();
						}
						
						
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