<?php
	$page['title'] = 'Configuration';
	$page['heading'] = 'Site Configuration';
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
                        <h1 class="page-header"><?= $page['heading'] ?></h1>
                    </div>
                </div>
            </div>
       	</div>
    </div>
<?php include 'includes/footer.php'; ?>