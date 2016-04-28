<?php 
    include '../includes/functions.php';
    	include '../includes/site_config.php';
        if(isset($_GET['source'])) {
        	$source = $_GET['source'];
        }
        else {
        	header("Location: ".ADMIN_PATH."index.php");
        }
        if(isset($_GET['task'])) {
    		$task = $_GET['task'];
        }
        else {
        	$task = 'view';
        }
        switch ($source) {
        	case 'site_top_panel' : switch_top_panel($task);
        							break;
        	case 'site_topnav' : switch_topnav($task);
        							break;
        }
        
        function switch_topnav($task) {
	        switch($task) {
	        	case 'edit':    $page['title'] = 'Edit Nav Item';
	        					edit_nav_item($_GET['lid']);
	        					break;
	        	case 'add':    	$page['title'] = 'Add New Nav Item';
	        					add_nav_item();
	        					break;
	        
	        	case 'delete':  delete_nav_item($_GET['lid']);
	        					break;
	        	default:		view_structure_topnav();
	        }
        }
        
        function switch_top_panel($task) {
        	switch($task) {
        		case 'edit':    $page['title'] = 'Edit Top Panel Item';
        						edit_top_panel_item($_GET['lid']);
        						break;
        		case 'add':    	$page['title'] = 'Add New Top Panel Item';
        						add_top_panel_item();
        						break;
        		 
        		case 'delete':  delete_top_panel_item($_GET['lid']);
        						break;
        		default:		view_structure_top_panel();
        	}
        }

        function view_structure_topnav() {
        	$page['title'] = 'Top Nav Items';
//         	include '../header.php';
        
  ?> 

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nav Items</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               	<div class="row">
               		<div  id="topnav-form"></div>
               		<div class="form-group">
                    	<a href="#" class="topnav-task btn btn-success" data-task="add" data-lid="0" title="Add"><i class="fa fa-plus"></i> Add New Nav Item</a>
                    </div>
                    <div class="col-lg-12" id="cv-post-content">
                    	
						<table class="table table-hover">
						    <thead>
						        <tr>
						            <th>S.No.</th>
						            <th>Nav Item Name</th>
						            <th>Nav Item Link</th>
						            <th>Parent Item</th>
						            <th colspan="2">Actions</th>
						        </tr>
						    </thead>
						    <tbody>
<?php 
            $view_query = "SELECT * FROM `".TABLE_PREFIX."topnav`";
            //echo $query;
            $all_posts_result = mysqli_query(connect_db(), $view_query);
            if(mysqli_num_rows($all_posts_result)>0) {
                while($row=mysqli_fetch_assoc($all_posts_result)) {
                    $all_items[$row['topnav_id']] = $row;
                    echo '<tr>
                                <td></td>
                                <td>' . $row['topnav_name'] . '</td>
                                <td>' . $row['topnav_link'] . '</td>
       							<td>' . ($row['topnav_parent_id']==0 ? 'Main Menu Item' : $all_items[$row['topnav_parent_id']]['topnav_name']) . '</td>
                                <td><div class="btn-group" role="group">
	                                <a href="#" class="topnav-task btn btn-warning" data-task="edit" data-sid="' . $row['topnav_id'] . '" title="Edit"><i class="fa fa-pencil"></i></a>
	                                <a href="#" class="topnav-task btn btn-danger" data-task="delete" data-sid="' . $row['topnav_id'] . '" title="Delete"><i class="fa fa-trash"></i></a></div>
				                </td>
			                </tr>';
                }
                
    	       echo '</tbody></table>';
            }
            else {
                    echo '<div class="text-center"><h4>No Items Yet. </h4></div>';
            }
     ?>
                    
                    </div>
                    
                    <div id="wait" style="display:none;position:absolute;top:50%;left:55%;padding:2px;">
                    	<img src='img/default.svg' width="64" height="64" /><br>Loading..</div>

                    <!-- /.col-lg-12 -->
                </div>   
                <!-- /.row -->
    <!-- /#wrapper -->
    <script type="text/javascript">
                    $(".topnav-task").click(function(){
                    	$(document).ajaxStart(function(){
                            $("#wait").css("display", "block");
                        });
                        $(document).ajaxComplete(function(){
                            $("#wait").css("display", "none");
                        });
						var task = $(this).attr('data-task');
						var url = 'plugins/header.php?source=site_topnav&task=' + task + '&lid=' + $(this).attr('data-sid');
						if(task=="delete") {
							if(confirm("Do you really want to remove this Item?")) {
		                        $.get(url, function(data, status){
		                                $('#topnav-form').html(data);
		                        });
							}
							//location.reload();
						}
						else {
							 $.get(url, function(data, status){
	                                $('#topnav-form').html(data);
	                        });
						}
                        
						$.get('plugins/header.php?source=site_topnav',function(data) {
							$("#cv-page-content").html(data);
				
						});
                        
                    });
    				
            		</script>
<?php 
// 			include '../includes/footer.php'; 
        }
    	
    	function add_nav_item(){
    		create_form_nav(-1);	
    	}
    	
    	function edit_nav_item($id) {
    		create_form_nav($id);
    	}
    	
    	function delete_nav_item($id) {
    		$delete_query = "DELETE FROM `".TABLE_PREFIX."topnav` WHERE `topnav_id`='".$id."'";
    		if(mysqli_query(connect_db(), $delete_query)) {
    			echo success_message('Nav Item has been deleted successfully.');
    		
    		}
    		else {
    			echo warning_message('Nav Item has not been deleted. Please Try Again');
    		}
    		
    	}
    	function create_form_nav($id) {
    		if($id!=-1) {
    			$form_query = "SELECT * FROM `".TABLE_PREFIX."topnav` WHERE `topnav_id` = '".$id."'";
    			$result_form = mysqli_query(connect_db(),$form_query);
    			$row_form = mysqli_fetch_assoc($result_form);
    			$task = 'edit_topnav';
    		}
    		else {
    			$task = 'add_topnav';
    		}
?>
									
	               			<div class="panel panel-primary">
		                    	<div class="panel-heading">
		                    		Nav Item Parameters
		                    	</div>
		                    	<div class="panel-body">
			                    	<form id="new_nav_item_form" action="plugins/header_action.php?source=site_topnav&task=<?= $task ?>" method="post">
			                    		<div class="form-group">
			                    			<label for="topnav_name">Nav Item Name</label>
			                    			<input required value="<?= isset($row_form['topnav_name']) ? $row_form['topnav_name'] : '' ?>" class="form-control"  type="text" id="topnav_name" name="topnav_name" placeholder="Name of the Nav Item">
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="topnav_link">Nav Item URL</label>
			                    			<!-- <input value=" //isset($row_form['topnav_link']) ? $row_form['topnav_link'] : '' " class="form-control"  type="text" id="topnav_link" name="topnav_link" placeholder="Link of the Nav Item">-->
			                    			<select required class="form-control" name="topnav_link" id="topnav_link">
			                    				<option disabled selected>Select Page</option>
			                    				<option value="#">#</option>
			                    				<?php
			                    					$select_topnav_link = "SELECT `page_url`,`page_title` FROM `site_pages` WHERE 1";
			                    					$topnav_links = mysqli_query(connect_db(),$select_topnav_link);
			                    					while ($row_of_links = mysqli_fetch_array($topnav_links)) {
			                    				?>
			                    				<option <?= (isset($row_form['topnav_link']) && ($row_form['topnav_link']==$row_of_links['page_url'])) ? 'selected' : ''?> value="<?= $row_of_links['page_url'] ?>"><?= $row_of_links['page_title'] ?></option>
			                    				<?php }?>
			                    			</select>
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="topnav_parent_id">Nav Item Parent</label>
			                    			<!-- <input value=" //isset($row_form['topnav_link']) ? $row_form['topnav_link'] : '' " class="form-control"  type="text" id="topnav_link" name="topnav_link" placeholder="Link of the Nav Item">-->
			                    			<select class="form-control" name="topnav_parent_id" id="topnav_parent_id">
			                    				<option disabled selected>Select Parent Item</option>
			                    				<option <?= (isset($row_form['topnav_parent_id']) && ($row_form['topnav_parent_id']==0)) ? 'selected' : '' ?>  value="0">Main Menu Item </option>
			                    				<?php
			                    					$select_topnav_item = "SELECT `topnav_id`,`topnav_name` FROM `".TABLE_PREFIX."topnav` WHERE `topnav_parent_id`=0";
			                    					$topnav_items = mysqli_query(connect_db(),$select_topnav_item);
			                    					while ($row_of_items = mysqli_fetch_array($topnav_items)) {
			                    				?>
			                    				<option <?= (isset($row_form['topnav_parent_id']) && ($row_form['topnav_parent_id']==$row_of_items['topnav_id'])) ? 'selected' : ''?> value="<?= $row_of_items['topnav_id'] ?>"><?= $row_of_items['topnav_name'] ?></option>
			                    				<?php }?>
			                    			</select>
			                    		</div>
			                    		<div class="form-group">
			                    			<input value="<?= isset($row_form['topnav_id']) ? $row_form['topnav_id'] : '' ?>" class="form-control"  type="hidden" id="topnav_id" name="topnav_id">
			                    			<input class="btn btn-success"  type="submit" id="submit" name="submit" value="Submit">
			                    		</div>
			                    	</form>
			                    </div>
			              	</div>
			              	<script>
			              	$("#new_nav_item_form").submit(function(event) {
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
		    									$("#topnav-form").html(data);
		    								}
		    							});
		    			    });
			              	</script>
<?php 
    	}
    	
    	function view_structure_top_panel() {
    		$page['title'] = 'Top Panel Items';
    		//         	include '../header.php';
    	
    		?>
    	
    	                <div class="row">
    	                    <div class="col-lg-12">
    	                        <h1 class="page-header">Top Panel Items</h1>
    	                    </div>
    	                    <!-- /.col-lg-12 -->
    	                </div>
    	               	<div class="row">
    	               		<div  id="top_panel-form"></div>
    	               		<div class="form-group">
    	                    	<a href="#" class="top-panel-task btn btn-success" data-task="add" data-lid="0" title="Add"><i class="fa fa-plus"></i> Add New Top Panel Item</a>
    	                    </div>
    	                    <div class="col-lg-12" id="cv-post-content">
    	                    	
    							<table class="table table-hover">
    							    <thead>
    							        <tr>
    							            <th>S.No.</th>
    							            <th>Top Panel Item Name</th>
    							            <th>Top Panel Item Link</th>
    							            <th>Top Panel Item Icon</th>
    							            <th colspan="2">Actions</th>
    							        </tr>
    							    </thead>
    							    <tbody>
    	<?php 
    	            $view_query = "SELECT * FROM `".TABLE_PREFIX."top_panel`";
    	            //echo $query;
    	            $all_posts_result = mysqli_query(connect_db(), $view_query);
    	            if(mysqli_num_rows($all_posts_result)>0) {
    	                while($row=mysqli_fetch_assoc($all_posts_result)) {
    	                    $all_items[$row['top_panel_id']] = $row;
    	                    echo '<tr>
    	                                <td></td>
    	                                <td>' . $row['top_panel_name'] . '</td>
    	                                <td>' . $row['top_panel_link'] . '</td>
    	       							<td><span class="fa ' . $row['top_panel_icon'] . '"></span></td>
    	                                <td><div class="btn-group" role="group">
    		                                <a href="#" class="top-panel-task btn btn-warning" data-task="edit" data-sid="' . $row['top_panel_id'] . '" title="Edit"><i class="fa fa-pencil"></i></a>
    		                                <a href="#" class="top-panel-task btn btn-danger" data-task="delete" data-sid="' . $row['top_panel_id'] . '" title="Delete"><i class="fa fa-trash"></i></a></div>
    					                </td>
    				                </tr>';
    	                }
    	                
    	    	       echo '</tbody></table>';
    	            }
    	            else {
    	                    echo '<div class="text-center"><h4>No Items Yet. </h4></div>';
    	            }
    	     ?>
    	                    
    	                    </div>
    	                    
    	                    <div id="wait" style="display:none;position:absolute;top:50%;left:55%;padding:2px;">
    	                    	<img src='img/default.svg' width="64" height="64" /><br>Loading..</div>
    	
    	                    <!-- /.col-lg-12 -->
    	                </div>   
    	                <!-- /.row -->
    	    <!-- /#wrapper -->
    	    <script type="text/javascript">
    	                    $(".top-panel-task").click(function(){
    	                    	$(document).ajaxStart(function(){
    	                            $("#wait").css("display", "block");
    	                        });
    	                        $(document).ajaxComplete(function(){
    	                            $("#wait").css("display", "none");
    	                        });
    							var task = $(this).attr('data-task');
    							var url = 'plugins/header.php?source=site_top_panel&task=' + task + '&lid=' + $(this).attr('data-sid');
    							if(task=="delete") {
    								if(confirm("Do you really want to remove this Item?")) {
    			                        $.get(url, function(data, status){
    			                                $('#top_panel-form').html(data);
    			                        });
    								}
    								//location.reload();
    							}
    							else {
    								 $.get(url, function(data, status){
    		                                $('#top_panel-form').html(data);
    		                        });
    							}
    	                        
    							$.get('plugins/header.php?source=site_top_panel',function(data) {
    								$("#cv-page-content").html(data);
    					
    							});
    	                        
    	                    });
    	    				
    	            		</script>
    	<?php 
    	// 			include '../includes/footer.php'; 
    	        }
    	    	
    	    	function add_top_panel_item(){
    	    		create_form_top_panel(-1);	
    	    	}
    	    	
    	    	function edit_top_panel_item($id) {
    	    		create_form_top_panel($id);
    	    	}
    	    	
    	    	function delete_top_panel_item($id) {
    	    		$delete_query = "DELETE FROM `".TABLE_PREFIX."top_panel` WHERE `top_panel_id`='".$id."'";
    	    		if(mysqli_query(connect_db(), $delete_query)) {
    	    			echo success_message('Nav Item has been deleted successfully.');
    	    		
    	    		}
    	    		else {
    	    			echo warning_message('Nav Item has not been deleted. Please Try Again');
    	    		}
    	    		
    	    	}
    	    	function create_form_top_panel($id) {
    	    		if($id!=-1) {
    	    			$form_query = "SELECT * FROM `".TABLE_PREFIX."top_panel` WHERE `top_panel_id` = '".$id."'";
    	    			$result_form = mysqli_query(connect_db(),$form_query);
    	    			$row_form = mysqli_fetch_assoc($result_form);
    	    			$task = 'edit_top_panel';
    	    		}
    	    		else {
    	    			$task = 'add_top_panel';
    	    		}
    	?>
    										
    		               			<div class="panel panel-primary">
    			                    	<div class="panel-heading">
    			                    		Top Panel Item Parameters
    			                    	</div>
    			                    	<div class="panel-body">
    				                    	<form id="new_top_panel_item_form" action="plugins/header_action.php?source=site_top_panel&task=<?= $task ?>" method="post">
    				                    		<div class="form-group">
    				                    			<label for="top_panel_name">Top Panel Item Name</label>
    				                    			<input required value="<?= isset($row_form['top_panel_name']) ? $row_form['top_panel_name'] : '' ?>" class="form-control"  type="text" id="top_panel_name" name="top_panel_name" placeholder="Name of the Top Panel Item">
    				                    		</div>
    				                    		<div class="form-group">
    				                    			<label for="top_panel_link">Top Panel Item Link</label>
    				                    			<input required value="<?= isset($row_form['top_panel_link']) ? $row_form['top_panel_link'] : '' ?>" class="form-control"  type="text" id="top_panel_link" name="top_panel_link" placeholder="Link of the Top Panel Item">
    				                    			
    				                    		</div>
    				                    		<div class="form-group">
					                    			<label for="plugin_icon">Top Panel Item Icon</label>
													<div class="input-group">
														<button class="btn btn-default iconpicker" data-iconset="fontawesome" data-icon="<?= isset($row_form['top_panel_icon']) ? $row_form['top_panel_icon'] : 'fa-plus' ?>" name="top_panel_icon" id="top_panel_icon" role="iconpicker"></button>';
													</div>
												</div>
												<script>$(".iconpicker").iconpicker();</script>
    				                    		<div class="form-group">
    				                    			<input value="<?= isset($row_form['top_panel_id']) ? $row_form['top_panel_id'] : '' ?>" class="form-control"  type="hidden" id="top_panel_id" name="top_panel_id">
    				                    			<input class="btn btn-success"  type="submit" id="submit" name="submit" value="Submit">
    				                    		</div>
    				                    		
    				                    	</form>
    				                    </div>
    				              	</div>
    				              	<script>
    				              	$("#new_top_panel_item_form").submit(function(event) {
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
    			    									$("#top_panel-form").html(data);
    			    								}
    			    							});
    			    			    });
    				              	</script>
    	<?php 
    	    	}
?>
					
