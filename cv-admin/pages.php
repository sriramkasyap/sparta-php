<?php 
    if(!isset($_GET['task'])) {
        $_GET['task'] = 'view';
    }
    	include 'includes/functions.php';
    	include 'includes/site_config.php';
        $task = $_GET['task'];
        switch($task) {
            case 'add':     $page['title'] = 'add new Page';
                            $page['data'] = add_page();
                            $page['heading'] = 'Add New Page';
                            total_structure($page);
                            break;
                
            case 'edit':    edit_page($_GET['pid']);
                            break;
                
            case 'delete':  delete_page($_GET['pid']);
                            break;
                
            default :       $page['title'] = 'posts';
                            $page['data'] =  view_all_pages();
                            $page['heading'] = 'View All Pages';
                            total_structure($page);
                            break;
        }
    
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
		                    <td><a class="page-task" data-task="edit" data-sid="' . $row['page_id'] . '">Edit</a></td>
		                    <td><a class="page-task" data-task="delete" data-sid="' . $row['page_id'] . '">Delete</a></td>
		                </tr>';
            }
    	$data .= '</tbody></table>';
  		return $data;
    }
    function add_page() {
    	return create_page_form('add', false);
    }
    function edit_page($pid) {
   ?>
   		<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Page</h1>
                        <p id="tester"></p>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               	<div class="row">
                    <div class="col-lg-12">
   <?php
   			echo create_page_form('edit', $pid);
   	?>                    
                    </div>
                    
                    <div id="wait" style="display:none;position:absolute;top:50%;left:55%;padding:2px;"><img src='img/default.svg' width="64" height="64" /><br>Loading..</div>

                    <!-- /.col-lg-12 -->
                </div>   
                <!-- /.row -->
    <?php }
    
    function delete_page($pid) {
    	
    }
    
    function create_page_form($action,$page_id) {
    	$form_structure ='<div class="row"><div class="col-sm-10 col-md-8 col-sm-push-1 col-md-push-2">' ;
    	$page_form = new FormBuilder(['action.php?task='.$action,'post','']);
    	if($action=='add') {
    		$page_form->addObject(['varchar','page_heading','Heading of the page']);
    		$page_form->addObject(['varchar','page_url','URL address of the page']);
    		$page_form->addObject(['varchar', 'page_type','Type of Page']);
    		$page_form->addObject(['text','page_description', 'Detailed Description of page']);
    	}
    	else{
    		$page_result = mysqli_query(connect_db(), 'SELECT * FROM `'.TABLE_PREFIX.'pages` WHERE `page_id` = "'.$page_id.'"');
    		$page_row = mysqli_fetch_assoc($page_result);
    		$page_form->addObject(['varchar','page_heading','Heading of the page', $page_row['page_heading']]);
    		$page_form->addObject(['varchar','page_url','URL address of the page', $page_row['page_url']]);
    		$page_form->addObject(['varchar', 'page_type','Type of Page', $page_row['page_type']]);
    		$page_form->addObject(['text','page_description', 'Detailed Description of page', $page_row['page_description']]);
    	}
    	$page_form->addSubmit(ucfirst($action).' Page');
    	$form_structure .= $page_form->renderForm();
    	$form_structure .= '</div></div>';
    	return $form_structure;
    	
    }
    function total_structure($page) {
    	include 'includes/header.php';
?>
<script type="text/javascript">
	$(document).ready(function() { 
		$('#page_heading').blur(function() {
			var headline = $('#page_heading').val();
			headline = headline.trim();
			if(headline == '' || headline == ' ') {
				url = '';
			}
			else {
				var url = headline.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
				url = url.replace(/ /gi, "-");
				url = url.toLowerCase();
				document.getElementById('page_url').value = '/'+url+'/';
			}
		});
		$('#page_url').blur(function() {
			var url = $('#page_url').val();
			if(url == '' || url == ' ') {
				selecturl();
			}
			else {;
				var new_url = url.toString();
				new_url = new_url.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\]/gi, ' ');
				new_url = new_url.replace(/ /gi, "-");
				new_url = new_url.toLowerCase();
				document.getElementById('page_url').value = new_url;
			}
		});
	});
</script>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/nav.php'; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid"  id="cv-page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?= $page['heading'] ?></h1>
                        <p id="tester"></p>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               	<div class="row">
                    <div class="col-lg-12">
                   	<?php echo $page['data']; ?>
                    
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
<?php 
		include 'includes/footer.php'; 
    }
?>
<script type="text/javascript">
                    $(".page-task").click(function(){
                    	$(document).ajaxStart(function(){
                            $('#cv-post-content').html('');
                            $("#wait").css("display", "block");
                        });
                        $(document).ajaxComplete(function(){
                            $("#wait").css("display", "none");
                        });

                        var url = 'pages.php?task=' + $(this).attr('data-task') + '&pid=' + $(this).attr('data-sid');
                        $.get(url, function(data, status){
                                $('#cv-page-content').html(data);
                        });
                        
                    });
                    </script>