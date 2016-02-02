<?php 
    if(!isset($_GET['source'])) {
        header("Location: index.php");
    }
    else {
        require_once 'xcrud/xcrud.php';
        $xcrud = Xcrud::get_instance();
        $xcrud->table('site_pages');
        $source = $_GET['source'];
        switch($source) {
            case 'add':
                $page['title'] = 'add new page';
                $page['data'] = $xcrud->render('create');
                $page['heading'] = 'Add New Page';
                break;
            case 'edit' :
                if(!isset($_GET['id'])) {
                    header("Location: index.php");
                }
                else {
                    $page['title'] = 'Edit page';
                    $page['data'] =  $xcrud->render('edit',$_GET['id']);
                    $page['heading'] = 'Edit Page';
                    break;
                }
            default :
                if(!isset($_GET['limit'])) {
                    header("Location: index.php");
                }
                else {
                    $page['title'] = 'Pages';
                    $page['data'] =  $xcrud->render('view',$_GET['limit']);
                    $page['heading'] = 'View All Pages';
                    break;
                }
        }
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
               <?= $page['data'] ?>
                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include 'includes/footer.php'; ?>