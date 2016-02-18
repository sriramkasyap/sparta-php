<?php
$page['title'] = 'test';
    $page['url'] = 'test.php';
    $page['heading'] = 'Test';
include 'includes/functions.php';
include 'includes/site_config.php';
include 'includes/header.php';
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
                    	$new_post = new start_bootstrap_about();
                    	$new_post->create_form();
                    	
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
<style>
	.fa {
		-webkit-transition: all 0.2s ease-in-out;
		-moz-transition: all 0.2s ease-in-out;
		-ms-transition: all 0.2s ease-in-out;
		-o-transition: all 0.2s ease-in-out;
		transition: all 0.2s ease-in-out;
	}
	.fa:hover {
		color: #004d7f;
	}
</style>

   <?php include 'includes/footer.php'; ?>