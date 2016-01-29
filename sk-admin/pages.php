<?php 
    $source = $_GET['source'];
    switch($source) {
        case 'add':
            $page['title'] = 'add new page';
            $page['url'] = 'includes/add_page.php';
            $page['heading'] = 'Add New Page';
            break;
        case 'edit' :
            $page['title'] = 'Edit page';
            $page['url'] = 'includes/edit_page.php?edit=' . $_GET['edit'];
            $page['heading'] = 'Edit Page';
            break;
        default : 
            $page['title'] = 'Pages';
            $page['url'] = 'includes/view_all_pages.php';
            $page['heading'] = 'View All Pages';
            break;
    }
    
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
                        <h1 class="page-header"><?= $page['heading'] ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               <?php include $page['url']; ?>
                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include 'includes/footer.php'; ?>