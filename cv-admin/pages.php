<?php 
    if(!isset($_GET['task'])) {
        header("Location: index.php");
    }
    else {
    	include 'includes/functions.php';
    	include 'includes/site_config.php';
        $task = $_GET['task'];
        switch($task) {
            case 'add':     $page['title'] = 'add new Page';
                            $page['data'] = add_page();
                            $page['heading'] = 'Add New Page';
                            break;
                
            case 'edit':    edit_page($_GET['pid']);
                            break;
                
            case 'delete':  delete_page($_GET['pid']);
                            break;
                
            default :       $page['title'] = 'posts';
//                             $page['data'] =  view_all_pages();
                            $page['heading'] = 'View All posts';
                            break;
        }
    }
    include 'includes/header.php';
    
    function view_all_pages() {
    	$data = '<hr>
				<h3>Approved Posts</h3>
				   <table class="table table-hover">
				    <thead>
				        <tr>
				            <th>S.No.</th>
				            <th>Page Name</th>
				            <th>Page URL</th>
		                    <th>Page Type</th>
		                    <th>Page Description</th>
				            <th colspan="2">Actions</th>
				        </tr>
				    </thead>
				    <tbody>';
            $view_query = "SELECT * FROM `".TABLE_PREFIX."pages`";
            //echo $query;
            $all_posts_result = mysqli_query(connect_db(), $view_query);
            while($row=mysqli_fetch_assoc($all_posts_result)) {
                $data .= '<tr>
		                    <td>' . $row['page_id'] . '</td>
		                    <td>' . $row['page_heading'] . '</td>
		                    <td>' . $row['page_url'] . '</td>
		                    <td>' . $row['page_type'] . '</td>
		                    <td>' . $row['page_description'] . '</td>
		                    <td><a class="page-task" data-task="edit" data-sid="' . $row['post_id'] . '">Edit</a></td>
		                    <td><a class="page-task" data-task="delete" data-sid="' . $row['post_id'] . '">Delete</a></td>
		                </tr>';
            }
    	$data .= '</tbody></table>';
  		return $data;
    }

    function edit_page($pid) {
    	
    }
    
    function delete_page($pid) {
    	
    }
    
    function create_page_form() {
    	$form_structure = '';
    }
    function add_page() {
    	
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
                    <div class="col-lg-12" id="cv-page-content">
                    	<form action=""></form>
                   
                    <script type="text/javascript">
                    $(".page-task").click(function(){
                    	$(document).ajaxStart(function(){
                            $('#cv-post-content').html('');
                            $("#wait").css("display", "block");
                        });
                        $(document).ajaxComplete(function(){
                            $("#wait").css("display", "none");
                        });

                        var url = 'pages.php?task=' + $(this).attr('data-task') + '&sid=' + $(this).attr('data-sid');
                        $.get(url, function(data, status){
                                $('#cv-page-content').html(data);
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