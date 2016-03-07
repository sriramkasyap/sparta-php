<?php 
    if(!isset($_GET['source'])) {
        header("Location: index.php");
    }
    else {
    	include 'includes/functions.php';
    	include 'includes/site_config.php';
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
                    $page['data'] =  view_all_posts();
                    //$page['data'] = $xcrud->render();
                    $page['heading'] = 'View All posts';
                    break;
        }
    }
    include 'includes/header.php';
    
    function view_all_posts() {
    	$data = '<hr>
		<h3>Approved Posts</h3>
		   <table class="table table-hover">
		    <thead>
		        <tr>
		            <th>S.No.</th>
		            <th>Post Heading</th>
		            <th>Page Name</th>
		            <th>Author name</th>
		            <th>Post URL</th>
		            <th colspan="2">Actions</th>
		        </tr>
		    </thead>
		    <tbody>';
            $view_query = "SELECT `post_id`, `page_id`, `page_title`, `user_id`, `user_display_name`, `snippet_id`, `snippet_display_name`, `post_url`, `post_heading`, `post_pos` FROM `".TABLE_PREFIX."posts` JOIN `".TABLE_PREFIX."pages` USING (`page_id`) JOIN `".TABLE_PREFIX."users` USING (`user_id`) JOIN `".TABLE_PREFIX."snippets` USING (`snippet_id`) ORDER BY `post_pos`";
            //echo $query;
            $all_posts_result = mysqli_query(connect_db(), $view_query);
            while($row=mysqli_fetch_assoc($all_posts_result)) {
                $data .= '<tr>
		                    <td>' . $row['post_pos'] . '</td>
		                    <td>' . $row['post_heading'] . '</td>
		                    <td>' . $row['page_title'] . '</td>
		                    <td>' . $row['user_display_name'] . '</td>
		                    <td>' . $row['post_url'] . '</td>
		                    <td><a class="snippet-task" data-task="edit_post_arg" data-sid="' . $row['post_id'] . '">Edit</a></td>
		                    <td><a class="snippet-task" data-task="delete_post" data-sid="' . $row['post_id'] . '">Delete</a></td>
		                </tr>';
            }
    	$data .= '</tbody></table>';
  		return $data;
    }

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