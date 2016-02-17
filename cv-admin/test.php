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
                    	if(isset($_POST['submit'])){
                    		print_r($_POST);
                    	}
                    	//post::demo_view();
                    	$new_form = new FormBuilder(['','post']);
                    	$new_form->addObject(['select','trial','Try It',['1'=>'Home','2'=>'About','3'=>'Services']]);
                    	$new_form->addSubmit('Submit');
                    	echo $new_form->renderForm();
                    	
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