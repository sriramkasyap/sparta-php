<?php 
    if(!isset($_GET['source'])) {
        header("Location: index.php");
    }
    else {
    	include 'includes/functions.php';
    	include 'includes/site_config.php';
        require_once 'xcrud/xcrud.php';
        $xcrud = Xcrud::get_instance();
        $xcrud->table('site_posts');
        $source = $_GET['source'];
        spl_autoload_register(function ($class_name) {
        	include 'includes/classes/' . $class_name. '.php';
        });
        switch($source) {
            case 'add':
                $page['title'] = 'add new post';
                $xcrud->unset_list();
                $page['data'] = $xcrud->render('create');
                $page['heading'] = 'Add New post';
                break;
            default :
                    $page['title'] = 'post';
                    $new_post = new start_bootstrap_header(1);
                    $xcrud->unset_add();
                    $xcrud->unset_csv();
                    $xcrud->unset_print();
                    $xcrud->join('page_id','site_pages','page_id');
                    $page['data'] =  $xcrud->columns('post_heading,site_pages.page_title, post_content');
                    $page['heading'] = 'View All posts';
                    break;
        }
    }
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
               <?php
//                $parameters = array('main_heading' => array('string','Sriram Kasyap Meduri'), 'main_description' => array('text','') );
//                $new_post->post_url = '#header';
//                $new_post->page_id = 1;
//                $new_post->post_heading = "Header";
//                $new_post->
               $new_post->create_post(); 
               			//$new_post->printer();?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include 'includes/footer.php'; ?>