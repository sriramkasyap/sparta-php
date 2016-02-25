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
        switch($source) {
            case 'add':
                $page['title'] = 'add new post';
                $page['data'] = '<h3>Select a Layout for the new post.</h3><br/>';
                $page['data'] .= post::demo_view();
                $page['heading'] = 'Add New post';
                break;
            default :
                    $page['title'] = 'posts';
                    $xcrud->unset_add();
                    $xcrud->unset_csv();
                    $xcrud->unset_title();
                    $xcrud->unset_remove();
                    $xcrud->unset_edit();
                    $xcrud->unset_print();
                    $xcrud->join('page_id','site_pages','page_id');
                    $xcrud->join('author_id','site_users','user_id');
                    $page['data'] =  $xcrud->columns('post_heading,site_pages.page_title, site_users.user_display_name, post_content');
                    //$page['data'] = $xcrud->render();
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
               	<div class="row">
                    <div class="col-lg-12" id="cv-post-content">
                    
                    <?= $page['data'] ?>
                    <script type="text/javascript">
                    $(".snippet-task").click(function(){
                    	$(document).ajaxStart(function(){
                            $('#cv-post-content').html('');
                            $("#wait").css("display", "block");
                        });
                        $(document).ajaxComplete(function(){
                            $("#wait").css("display", "none");
                        });
                        var url = 'snippet.php?task=' + $(this).attr('data-task') + '&sid=' + $(this).attr('data-sid');
                        $.get(url, function(data, status){
                                $('#cv-post-content').html(data);
                        });
                        
                    });
                    </script>
                    </div>
                    <div id="wait" style="display:none;position:absolute;top:50%;left:55%;padding:2px;"><img src='img/default.svg' width="64" height="64" /><br>Loading..</div>

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