<?php 
    if(!isset($_GET['task'])) {
        $_GET['task'] = 'view';
    }
    	include 'includes/functions.php';
    	include 'includes/site_config.php';
        $task = $_GET['task'];
        switch($task) {
        	case 'edit':    $page['title'] = 'Edit Plugin';
        					edit_script($_GET['lid']);
        					break;
        	case 'add':    	$page['title'] = 'Add New Plugin';
        					add_script();
        					break;
        
        	case 'delete':  delete_script($_GET['lid']);
        					break;
        	default:		view_structure();
        }
	
        function view_structure() {
        	$page['title'] = 'Site Plugins';
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
                        <h1 class="page-header">Page Plugins</h1>
                        <p id="tester"></p>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               	<div class="row">
               		<div  id="plugin-form"></div>
               		<div class="form-group">
                    	<a href="#" class="plugin-task btn btn-success" data-task="add" data-lid="0" title="Add"><i class="fa fa-plus"></i> Add New Plugin</a>
                    </div>
                    <div class="col-lg-12" id="cv-post-content">
                    	
						<table class="table table-hover">
						    <thead>
						        <tr>
						            <th>S.No.</th>
						            <th>Plugin Name</th>
						            <th>Plugin File</th>
						            <th>Plugin Sub Items</th>
				                    <th>Plugin Author</th>
				                    <th>Plugin Description</th>
						            <th colspan="2">Actions</th>
						        </tr>
						    </thead>
						    <tbody>
<?php 
            $view_query = "SELECT * FROM `".TABLE_PREFIX."plugins`";
            //echo $query;
            $all_posts_result = mysqli_query(connect_db(), $view_query);
            if(mysqli_num_rows($all_posts_result)>0) {
                while($row=mysqli_fetch_assoc($all_posts_result)) {
                    $each_nav=explode(';',$row['plugin_sub_menus']);
                    $each_head = '';
                    foreach ($each_nav as $each_item) {
                    	$every_item = explode(',',$each_item);
                    	$each_head .= ', '.$every_item[0];
                    }
                    echo '<tr>
                                <td></td>
                                <td>' . $row['plugin_name'] . '</td>
                                <td>' . $row['plugin_file'] . '</td>
                                <td>' .	trim($each_head,',') . '</td>
                                <td>' . $row['plugin_author'] . '</td>
                                <td>' . $row['plugin_desciription'] . '</td>
                                <td><div class="btn-group" role="group">
	                                <a href="#" class="plugin-task btn btn-warning" data-task="edit" data-sid="' . $row['plugin_id'] . '" title="Edit"><i class="fa fa-pencil"></i></a>
	                                <a href="#" class="plugin-task btn btn-danger" data-task="delete" data-sid="' . $row['plugin_id'] . '" title="Delete"><i class="fa fa-trash"></i></a></div>
				                </td>
			                </tr>';
                }
                
    	       echo '</tbody></table>';
            }
            else {
                    echo '<div class="text-center"><h4>No Plugins Yet. </h4></div>';
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
                    $(".plugin-task").click(function(){
                    	$(document).ajaxStart(function(){
                            $("#wait").css("display", "block");
                        });
                        $(document).ajaxComplete(function(){
                            $("#wait").css("display", "none");
                        });
                        var task = $(this).attr('data-task');
                        var url = 'plugins.php?task=' + task + '&lid=' + $(this).attr('data-sid');
                        
                        if(task=="delete") {
							if(confirm("Do you really want to remove this Item?")) {
								$.get(url, function(data, status){
	                                $('#plugin-form').html(data);
	                        	});
							}
							location.reload();
						}
						else {
							$.get(url, function(data, status){
                                $('#plugin-form').html(data);
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
    		$delete_query = "DELETE FROM `".TABLE_PREFIX."plugins` WHERE `plugin_id`='".$id."'";
    		if(mysqli_query(connect_db(), $delete_query)) {
    			echo success_message('Plugin has been deleted successfully.');
    		
    		}
    		else {
    			echo warning_message('Plugin has not been deleted. Please Try Again');
    		}
    		
    	}
    	function create_form($id) {
    		if($id!=-1) {
    			$form_query = "SELECT * FROM `".TABLE_PREFIX."plugins` WHERE `plugin_id` = '".$id."'";
    			$result_form = mysqli_query(connect_db(),$form_query);
    			$row_form = mysqli_fetch_assoc($result_form);
    			$task = 'edit_plugin';
    		}
    		else {
    			$task = 'add_plugin';
    		}
?>
									
	               			<div class="panel panel-primary">
		                    	<div class="panel-heading">
		                    		Plugin Parameters
		                    	</div>
		                    	<div class="panel-body">
			                    	<form id="new_plugin_form" action="action.php?task=<?= $task ?>" method="post">
			                    		<div class="form-group">
			                    			<label for="plugin_name">Plugin Name</label>
			                    			<input value="<?= isset($row_form['plugin_name']) ? $row_form['plugin_name'] : '' ?>" class="form-control"  type="text" id="plugin_name" name="plugin_name" placeholder="Name of the Plugin">
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="plugin_file">Plugin File</label>
			                    			<input value="<?= isset($row_form['plugin_file']) ? $row_form['plugin_file'] : '' ?>" class="form-control"  type="text" id="plugin_file" name="plugin_file" placeholder="Base File of the Plugin">
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="plugin_sub_menus">Plugin Sub Items</label>
			                    			<input value="<?= isset($row_form['plugin_sub_menus']) ? $row_form['plugin_sub_menus'] : '' ?>" class="form-control"  type="text" id="plugin_sub_menus" name="plugin_sub_menus" placeholder="Ex: Name of Plugin,plugin_script.php;Name 2,plugin_script_2.php">
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="plugin_author">Plugin Author</label>
			                    			<input value="<?= isset($row_form['plugin_author']) ? $row_form['plugin_author'] : '' ?>" class="form-control"  type="text" id="plugin_author" name="plugin_author" placeholder="Name of the Plugin Author">
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="plugin_desciription">Plugin Description</label>
			                    			<textarea class="form-control"  type="text" id="plugin_desciription" name="plugin_desciription" placeholder="Description of the Plugin"><?= isset($row_form['plugin_desciription']) ? $row_form['plugin_desciription'] : '' ?></textarea>
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="plugin_icon">Plugin Icon</label>
											<div class="input-group">
												<button class="btn btn-default iconpicker" data-iconset="fontawesome" data-icon="<?= isset($row_form['plugin_icon']) ? $row_form['plugin_icon'] : 'fa-plus' ?>" name="plugin_icon" id="plugin_icon" role="iconpicker"></button>';
											</div>
										</div>
										<script>$(".iconpicker").iconpicker();</script>
			                    		<div class="form-group">
			                    			<input value="<?= isset($row_form['plugin_id']) ? $row_form['plugin_id'] : '' ?>" class="form-control"  type="hidden" id="plugin_id" name="plugin_id">
			                    			<input class="btn btn-success"  type="submit" id="submit" name="submit" value="Submit">
			                    		</div>
			                    	</form>
			                    </div>
			              	</div>
			              	<script>
			              	$("#new_plugin_form").submit(function(event) {
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
		    									$("#plugin-form").html(data);
		    								}
		    							});
		    			    });
			              	</script>
<?php 
    	}
?>
					
