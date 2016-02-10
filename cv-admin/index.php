<?php 
    $page['title'] = 'home';
    $page['url'] = '';
    $page['heading'] = 'dashboard';
    include_once 'includes/functions.php';
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
                    <div class="col-lg-12">
                        <?php include 'includes/dash_top_notifications.php'; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>   
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include 'includes/footer.php'; ?>
