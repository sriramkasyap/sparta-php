<?php 
    if(!isset($_GET['task'])) {
        $_GET['task'] = 'view';
    }
    	include 'includes/functions.php';
    	include 'includes/site_config.php';
        $task = $_GET['task'];
        switch($task) {
        	case 'edit':    $page['title'] = 'Edit Link';
        					edit_link($_GET['lid']);
        					break;
        	case 'add':    	$page['title'] = 'Add New Link';
        					add_link();
        					break;
        
        	case 'delete':  delete_link($_GET['lid']);
        					break;
        	default:		view_structure();
        }
	
        function view_structure() {
        	$page['title'] = 'Linked Files';
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
                        <h1 class="page-header">Linked Files</h1>
                        <p id="tester"></p>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               	<div class="row">
               		<div  id="link-form"></div>
               		<div class="form-group">
                    	<a href="#" class="link-task btn btn-success" data-task="add" data-lid="0" title="Add"><i class="fa fa-plus"></i> Add New Link</a>
                    </div>
                    <div class="col-lg-12" id="cv-post-content">
                    	
						<table class="table table-hover">
						    <thead>
						        <tr>
						            <th>S.No.</th>
						            <th>Link Name</th>
						            <th>Link Rel</th>
				                    <th>Link URL</th>
						            <th colspan="2">Actions</th>
						        </tr>
						    </thead>
						    <tbody>
<?php 
            $view_query = "SELECT * FROM `".TABLE_PREFIX."links`";
            //echo $query;
            $all_posts_result = mysqli_query(connect_db(), $view_query);
            if(mysqli_num_rows($all_posts_result)>0) {
                while($row=mysqli_fetch_assoc($all_posts_result)) {
                    
                    echo '<tr>
                                <td></td>
                                <td>' . $row['link_name'] . '</td>
                                <td>' . $row['link_rel'] . '</td>
                                <td>' . strip_tags($row['link_href']) . '</td>
                                <td><div class="btn-group" role="group">
	                                <a href="#" class="link-task btn btn-warning" data-task="edit" data-sid="' . $row['link_id'] . '" title="Edit"><i class="fa fa-pencil"></i></a>
	                                <a href="#" class="link-task btn btn-danger" data-task="delete" data-sid="' . $row['link_id'] . '" title="Delete"><i class="fa fa-trash"></i></a></div>
				                </td>
			                </tr>';
                }
                
    	       echo '</tbody></table>';
            }
            else {
                    echo '<div class="text-center"><h4>No Links Yet. </h4></div>';
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
                    $(".link-task").click(function(){
                    	$(document).ajaxStart(function(){
                            $("#wait").css("display", "block");
                        });
                        $(document).ajaxComplete(function(){
                            $("#wait").css("display", "none");
                        });

                        var url = 'links.php?task=' + $(this).attr('data-task') + '&lid=' + $(this).attr('data-sid');
                        $.get(url, function(data, status){
                                $('#link-form').html(data);
                        });
                        
                    });
    				
            		</script>
<?php 
		include 'includes/footer.php'; 
        }
    	function add_link(){
    		create_form(-1);	
    	}
    	function edit_link($id) {
    		create_form($id);
    	}
    	function delete_link($id) {
    		$delete_query = "DELETE FROM `site_links` WHERE `link_id`='".$id."'";
    		if(mysqli_query(connect_db(), $delete_query)) {
    			echo success_message('Link has been deleted successfully.');
    		
    		}
    		else {
    			echo warning_message('Link has not been deleted. Please Try Again');
    		}
    	}
    	function create_form($id) {
    		if($id!=-1) {
    			$form_query = "SELECT * FROM `".TABLE_PREFIX."links` WHERE `link_id` = '".$id."'";
    			$result_form = mysqli_query(connect_db(),$form_query);
    			$row_form = mysqli_fetch_assoc($result_form);
    			$task = 'edit_link';
    		}
    		else {
    			$task = 'add_link';
    		}
?>
									
	               			<div class="panel panel-primary">
		                    	<div class="panel-heading">
		                    		Link Parameters
		                    	</div>
		                    	<div class="panel-body">
			                    	<form id="new_link_form" action="action.php?task=<?= $task ?>" method="post">
			                    		<div class="form-group">
			                    			<label for="link_name">Link Name</label>
			                    			<input value="<?= isset($row_form['link_name']) ? $row_form['link_name'] : '' ?>" class="form-control"  type="text" id="link_name" name="link_name" placeholder="Name of the Link">
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="link_rel">Link Rel</label>
			                    			<input value="<?= isset($row_form['link_rel']) ? $row_form['link_rel'] : '' ?>" class="form-control"  type="text" id="link_rel" name="link_rel" placeholder="Rel attribute of the Link">
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="link_type">Link Type</label>
			                    			<input value="<?= isset($row_form['link_type']) ? $row_form['link_type'] : '' ?>" class="form-control"  type="text" id="link_type" name="link_type" placeholder="Type attribute of the Link">
			                    		</div>
			                    		<div class="form-group">
			                    			<label for="link_href">Link URL</label>
			                    			<input value="<?= isset($row_form['link_href']) ? $row_form['link_href'] : '' ?>" class="form-control"  type="text" id="link_href" name="link_href" placeholder="href attribute of the Link">
			                    		</div>
			                    		<div class="form-group">
			                    			<input value="<?= isset($row_form['link_id']) ? $row_form['link_id'] : '' ?>" class="form-control"  type="hidden" id="link_id" name="link_id">
			                    			<input class="btn btn-success"  type="submit" id="submit" name="submit" value="Submit">
			                    		</div>
			                    	</form>
			                    </div>
			              	</div>
			              	<script>
			              	$("#new_link_form").submit(function(event) {
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
		    									$("#link-form").html(data);
		    								}
		    							});
		    			    });
			              	</script>
<?php 
    	}
?>
					
