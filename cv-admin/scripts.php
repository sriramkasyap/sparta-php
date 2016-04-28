<?php 
    if(!isset($_GET['task'])) {
        $_GET['task'] = 'view';
    }
    	include 'includes/functions.php';
    	include 'includes/site_config.php';
        $task = $_GET['task'];
        switch($task) {
        	case 'edit':    $page['title'] = 'Edit Script';
        					edit_script($_GET['lid']);
        					break;
        	case 'add':    	$page['title'] = 'Add New Script';
        					add_script();
        					break;
        
        	case 'delete':  delete_script($_GET['lid']);
        					break;
        	default:		view_structure();
        }
	
        function view_structure() {
        	$page['title'] = 'Site Scripts';
        	include 'includes/header.php';
        
  ?> 
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/nav.php'; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid"  id="cv-page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Page Scripts</h1>
                        <p id="tester"></p>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               	<div class="row">
               		<div  id="script-form"></div>
               		<div class="form-group">
                    	<a href="#" class="script-task btn btn-success" data-task="add" data-lid="0" title="Add"><i class="fa fa-plus"></i> Add New Script</a>
                    </div>
                    <div class="col-lg-12" id="cv-post-content">
                    	
						<table class="table table-hover">
						    <thead>
						        <tr>
						            <th>S.No.</th>
						            <th>Script Name</th>
						            <th>Script Type</th>
				                    <th>Script Source</th>
						            <th colspan="2">Actions</th>
						        </tr>
						    </thead>
						    <tbody>
<?php 
            $view_query = "SELECT * FROM `".TABLE_PREFIX."scripts`";
            //echo $query;
            $all_posts_result = mysqli_query(connect_db(), $view_query);
            if(mysqli_num_rows($all_posts_result)>0) {
                while($row=mysqli_fetch_assoc($all_posts_result)) {
                    
                    echo '<tr>
                                <td></td>
                                <td>' . $row['script_name'] . '</td>
                                <td>' . $row['script_type'] . '</td>
                                <td>' . strip_tags($row['script_src']) . '</td>
                                <td><div class="btn-group" role="group">
	                                <a href="#" class="script-task btn btn-warning" data-task="edit" data-sid="' . $row['script_id'] . '" title="Edit"><i class="fa fa-pencil"></i></a>
	                                <a href="#" class="script-task btn btn-danger" data-task="delete" data-sid="' . $row['script_id'] . '" title="Delete"><i class="fa fa-trash"></i></a></div>
				                </td>
			                </tr>';
                }
                
    	       echo '</tbody></table>';
            }
            else {
                    echo '<div class="text-center"><h4>No Scripts Yet. </h4></div>';
            }
     ?>
                    
                    </div>
                    
                    <div id="wait" style="display:none;position:absolute;top:50%;left:55%;padding:2px;">
                    	<img src='img/default.svg' width="64" height="64" /><br>Loading..</div>

                    <!-- /.col-lg-12 -->
                </div>   
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <script type="text/javascript">
                    $(".script-task").click(function(){
                    	$(document).ajaxStart(function(){
                            $("#wait").css("display", "block");
                        });
                        $(document).ajaxComplete(function(){
                            $("#wait").css("display", "none");
                        });
                        var task = $(this).attr('data-task');
                        var url = 'scripts.php?task=' + task + '&lid=' + $(this).attr('data-sid');
                        
                        if(task=="delete") {
							if(confirm("Do you really want to remove this Item?")) {
								$.get(url, function(data, status){
	                                $('#script-form').html(data);
	                        	});
							}
							location.reload();
						}
						else {
							$.get(url, function(data, status){
                                $('#script-form').html(data);
                        	});
						}
                    });
    				
            		</script>
<?php 
		include 'includes/footer.php'; 
        }
    	function add_script(){
    		create_form(-1);	
    	}
    	function edit_script($id) {
    		create_form($id);
    	}
    	function delete_script($id) {
    		$delete_query = "DELETE FROM `site_scripts` WHERE `script_id`='".$id."'";
    		if(mysqli_query(connect_db(), $delete_query)) {
    			echo success_message('Script has been deleted successfully.');
    		
    		}
    		else {
    			echo warning_message('Script has not been deleted. Please Try Again');
    		}
    		
    	}
    	function create_form($id) {
    		if($id!=-1) {
    			$form_query = "SELECT * FROM `".TABLE_PREFIX."scripts` WHERE `script_id` = '".$id."'";
    			$result_form = mysqli_query(connect_db(),$form_query);
    			$row_form = mysqli_fetch_assoc($result_form);
    			$task = 'edit_script';
    		}
    		else {
    			$task = 'add_script';
    		}
?>
									
	               			<div class="panel panel-primary">
		                    	<div class="panel-heading">
		                    		Script Parameters
		                    	</div>
		                    	<div class="panel-body">
			                    	<form id="new_script_form" action="action.php?task=<?= $task ?>" method="post">
			                    		<div class="form-group">
			                    			<label for="script_name">Script Name</label>
			                    			<input value="<?= isset($row_form['script_name']) ? $row_form['script_name'] : '' ?>" class="form-control"  type="text" id="script_name" name="script_name" placeholder="Name of the Script">
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="script_type">Script Type</label>
			                    			<input value="<?= isset($row_form['script_type']) ? $row_form['script_type'] : '' ?>" class="form-control"  type="text" id="script_type" name="script_type" placeholder="Type attribute of the Script">
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="script_src">Script URL</label>
			                    			<input value="<?= isset($row_form['script_src']) ? $row_form['script_src'] : '' ?>" class="form-control"  type="text" id="script_src" name="script_src" placeholder="href attribute of the Script">
			                    		</div>
			                    		<div class="form-group">
			                    			<input value="<?= isset($row_form['script_id']) ? $row_form['script_id'] : '' ?>" class="form-control"  type="hidden" id="script_id" name="script_id">
			                    			<input class="btn btn-success"  type="submit" id="submit" name="submit" value="Submit">
			                    		</div>
			                    	</form>
			                    </div>
			              	</div>
			              	<script>
			              	$("#new_script_form").submit(function(event) {
		    				    		/* stop form from submitting normally */
		    							event.preventDefault();
		    							var url = $(this).attr('action');
		            					$.ajax({
		    								url: url,
		    								type: "POST",
		    								data: new FormData(this),
		    								contentType: false,
		    								cache: false,
		    								processData:false,
		    								success: function(data)
		    								{
		    									$("#script-form").html(data);
		    								}
		    							});
		    			    });
			              	</script>
<?php 
    	}
?>
					
