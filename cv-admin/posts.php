<?php 
    if(!isset($_GET['source'])) {
        header("Location: index.php");
    }
    else {
        require_once 'xcrud/xcrud.php';
        $xcrud = Xcrud::get_instance();
        $xcrud->table('site_posts');
        $source = $_GET['source'];
        switch($source) {
            case 'add':
                $page['title'] = 'add new post';
                $xcrud->unset_list();
                $page['data'] = $xcrud->render('create');
                $page['heading'] = 'Add New post';
                break;
            default :
                    $page['title'] = 'post';
                    $xcrud->unset_add();
                    $xcrud->unset_print();
                    $xcrud->unset_csv();
                    $xcrud->unset_sortable();
                    $xcrud->join('page_id', 'site_pages', 'page_id');
                    $page['data'] =  $xcrud->columns('post_heading,site_pages.page_title, post_content');
                    $page['heading'] = 'View All posts';
                    break;
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