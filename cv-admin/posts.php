<?php 
    if(!isset($_GET['task'])) {
        header("Location: index.php");
    }
    else {
    	include 'includes/functions.php';
    	include 'includes/site_config.php';
        $source = $_GET['task'];
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
    	$data = '
		   <table class="table table-hover">
		    <thead>
		        <tr class="text-center">
		            <th class="text-center">S.No.</th>
		            <th class="text-center">Post Heading</th>
		            <th class="text-center">Page Name</th>
		            <th class="text-center">Author name</th>
		            <th class="text-center">Post URL</th>
		            <th class="text-center" colspan="3">Actions</th>
		        </tr>
		    </thead>
		    <tbody class="text-center">';
            $view_query = "SELECT `post_id`, `page_id`, `page_title`, `user_id`, `user_display_name`, `snippet_id`, `snippet_display_name`, `post_url`, `post_heading`, `post_pos` FROM `".TABLE_PREFIX."posts` JOIN `".TABLE_PREFIX."pages` USING (`page_id`) JOIN `".TABLE_PREFIX."users` USING (`user_id`) JOIN `".TABLE_PREFIX."snippets` USING (`snippet_id`) ORDER BY `post_pos`";
            //echo $query;
            $all_posts_result = mysqli_query(connect_db(), $view_query);
            if(mysqli_num_rows($all_posts_result)>0) {
	            while($row=mysqli_fetch_assoc($all_posts_result)) {
	                $data .= '<tr>
			                    <td>' . $row['post_pos'] . '</td>
			                    <td>' . $row['post_heading'] . '</td>
			                    <td>' . $row['page_title'] . '</td>
			                    <td>' . $row['user_display_name'] . '</td>
			                    <td>' . $row['post_url'] . '</td>
			                   	<td><div class="btn-group" role="group">
					                    <a class="simple-ajax-popup btn btn-primary" href="snippet.php?task=preview_post&pid=' . $row['post_id'] . '" title="View"><i class="fa fa-eye"></i></a>
					                    <a class="snippet-task  btn btn-warning" data-task="edit_post_arg" data-sid="' . $row['post_id'] . '" title="Edit"><i class="fa fa-pencil"></i></a>
					                    <a class="snippet-task btn btn-danger" data-task="delete_post" data-sid="' . $row['post_id'] . '" title="Delete"><i class="fa fa-trash"></i></a>
				                    </div>
				                </td>
			                </tr>';
	            }
    			$data .= '</tbody></table>';
            }
            else {
            	$data = '<div class="text-center"><h4>No Posts Yet. Click <a href="posts.php?task=add">Add New Post</a> to create new Posts.</h4></div>';
            }
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
                    
                    </div>
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