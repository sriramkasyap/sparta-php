<?php 
include '../includes/functions.php';
    	include '../includes/site_config.php';
        
        if(isset($_GET['task'])) {
    		$task = $_GET['task'];
        }
        else {
        	$task = 'list';
        }
        switch($task) {
        	case 'edit':    $page['title'] = 'Edit Blog';
        					edit_blog($_GET['lid']);
        					break;
        	case 'add':    	$page['title'] = 'Add New Blog article';
        					add_blog();
        					break;
        
        	case 'delete':  delete_blog($_GET['lid']);
        					break;
        	case 'view_all':  	view_blog_list($_GET);
        					break;
        	case 'view_single': view_single_blog($_GET);
        					 
        	default:		view_list();
        	
        }
        
		function add_blog(){
    		
			create_form_blog(-1);	
    	}
    	
    	function edit_blog($id) {
    		create_form_blog($id);
    	}
    	
    	function delete_blog($id) {
    		$link = connect_db();
    		$delete_query = "DELETE FROM `plugin_blog` WHERE `blog_id`='".$id."'";
    		if(mysqli_query($link, $delete_query)) {
    			echo success_message('Blog Item has been deleted successfully.');
    	
    		}
    		else {
    			echo warning_message('Blog Item has not been deleted. Please Try Again');
    		}
    	}
    	
    	function create_form_blog($id) {
    		$link = connect_db();
    		if($id!=-1) {
    			$form_query = "SELECT * FROM `plugin_blog` WHERE `blog_id` = '".$id."'";
    			$result_form = mysqli_query($link,$form_query);
    			$row_form = mysqli_fetch_assoc($result_form);
    			$task = 'edit_blog';
    		}
    		else {
    			$task = 'add_blog';
    		}
    		$form_builder = new FormBuilder(['plugins/blog_action.php?task='.$task,'post','multipart/form-data']);
    		$form_builder->addObject(['varchar','blog_name','Blog Name',(isset($row_form['blog_name']) ? $row_form['blog_name'] : '')], true);
    		$form_builder->addObject(['image','blog_image','Blog Image',(isset($row_form['blog_image']) ? $row_form['blog_image'] : '')], true);
    		$form_builder->addObject(['varchar','blog_text','Blog text',(isset($row_form['blog_text']) ? $row_form['blog_text'] : '')], true);
    		$form_builder->addObject(['hidden','blog_id','Blog ID',(isset($row_form['blog_id']) ? $row_form['blog_id'] : '')], true);
    		$form_builder->addSubmit('Submit');
    		$form_output = $form_builder->renderForm();
   ?>
    										
    		               			<div class="panel panel-primary">
    			                    	<div class="panel-heading">
    			                    		Blog Item Parameters
    			                    	</div>
    			                    	<div class="panel-body">
    				                    	<?= $form_output  ?>
    				                    </div>
    				              	</div>
    				              	<script type="text/javascript">
										$("#new_snip_form").submit(function(event) {
										    		/* stop form from submitting normally */
													event.preventDefault();
						        					$.ajax({
														url: $(this).attr('action'), 
														type: "POST",
														data: new FormData(this),
														contentType: false,
														cache: false,
														processData:false,
														success: function(data)
														{
															$("#cv-post-content").html(data);
														}
													});
									    });
						        	</script>
    	<?php 
    	    	}
    	    	
    	    	function view_list() {
    	    		$link = connect_db();
    	    		$page['title'] = 'Blog Items';
    	    		//         	include '../header.php';
    	    	   
    	    		?>
    	    	    	
    	    	    	                <div class="row">
    	    	    	                    <div class="col-lg-12">
    	    	    	                        <h1 class="page-header">Blog Items</h1>
    	    	    	                    </div>
    	    	    	                    <!-- /.col-lg-12 -->
    	    	    	                </div>
    	    	    	               	<div class="row">
    	    	    	               		<div  id="portfolio-form"></div>
    	    	    	               		<div class="form-group">
    	    	    	                    	<a href="#" class="portfolio-task btn btn-success" data-task="add" data-lid="0" title="Add"><i class="fa fa-plus"></i> Add New Blog Item</a>
    	    	    	                    </div>
    	    	    	                    <div class="col-lg-12" id="cv-post-content">
    	    	    	                    	
    	    	    							<table class="table table-hover">
    	    	    							    <thead>
    	    	    							        <tr>
    	    	    							            <th>S.No.</th>
    	    	    							            <th>Blog Item Name</th>
    	    	    							            <th>Blog Image</th>
    	    	    							            <th>Blog Item Text</th>
    	    	    							            <th colspan="2">Actions</th>
    	    	    							        </tr>
    	    	    							    </thead>
    	    	    							    <tbody>
    	    	    	<?php 
    	    	    	            $view_query = "SELECT * FROM `plugin_blog`";
    	    	    	            //echo $query;
    	    	    	            $all_posts_result = mysqli_query($link, $view_query);
    	    	    	            if(mysqli_num_rows($all_posts_result)>0) {
    	    	    	                while($row=mysqli_fetch_assoc($all_posts_result)) {
    	    	    	                    $all_items[$row['blog_id']] = $row;
    	    	    	                    echo '<tr>
    	    	    	                                <td></td>
    	    	    	                                <td>' . $row['blog_name'] . '</td>
    	    	    	                                <td>' . $row['blog_image'] . '</td>
    	    	    	                                <td>' . $row['blog_text'] . '</td>
    	    	    	                                <td><div class="btn-group" role="group">
    	    	    		                                <a href="#" class="portfolio-task btn btn-warning" data-task="edit" data-sid="' . $row['blog_id'] . '" title="Edit"><i class="fa fa-pencil"></i></a>
    	    	    		                                <a href="#" class="portfolio-task btn btn-danger" data-task="delete" data-sid="' . $row['blog_id'] . '" title="Delete"><i class="fa fa-trash"></i></a></div>
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
    	    	    	                    $(".portfolio-task").click(function(){
    	    	    	                    	$(document).ajaxStart(function(){
    	    	    	                            $("#wait").css("display", "block");
    	    	    	                        });
    	    	    	                        $(document).ajaxComplete(function(){
    	    	    	                            $("#wait").css("display", "none");
    	    	    	                        });
    	    	    							var task = $(this).attr('data-task');
    	    	    							var url = 'plugins/portfolio.php?task=' + task + '&lid=' + $(this).attr('data-sid');
    	    	    							if(task=="delete") {
    	    	    								if(confirm("Do you really want to remove this Item?")) {
    	    	    			                        $.get(url, function(data, status){
    	    	    			                                $('#portfolio-form').html(data);
    	    	    			                        });
    	    	    								}
    	    	    								//location.reload();
    	    	    								$.get('plugins/portfolio.php',function(data) {
        	    	    								$("#cv-page-content").html(data);
        	    	    					
        	    	    							});
    	    	    							}
    	    	    							else {
    	    	    								 $.get(url, function(data, status){
    	    	    		                                $('#portfolio-form').html(data);
    	    	    		                        });
     	    	    		                        
    	    	    							}
    	    	    	                        
    	    	    							
    	    	    	                        
    	    	    	                    });
    	    	    	    				
    	    	    	            		</script>
    	    	    	<?php 
    	    	    	// 			include '../includes/footer.php'; 
    	    	    	        }
    	    	    	        
		function view_blog_front($args) {
			$link = connect_db();
			if(isset($args['limit'])){
				$limit=$args['limit'];
			}
			else {
				$limit=8;
			}
			if(isset($args['tail'])){
				$tail = $args['tail'];
			}
			else {
				$tail=1;
			}
			if(isset($args['show_pagin'])){
				$show_pagin = $args['show_pagin'];
			}
			else {
				$show_pagin = false;
			}
			$limit_query = "LIMIT ". $tail . "," . $limit;
			if($show_pagin=='true'){
	?>
				<div class="container page">
					<div class="row cws-multi-col" id="portfoio_post" style="min-height:300px">
	<?php 
			}
				$query = "SELECT * FROM `plugin_blog` ".$limit_query;
// 				echo $query;
				$blog_result = mysqli_query($link,$query);
				$blog_count = mysqli_query($link,"SELECT COUNT(`blog_id`) as `blog_count` FROM `plugin_blog` ");
				$p_count = mysqli_fetch_assoc($blog_count);
				$blog_count=$p_count['blog_count'];
// 				echo $blog_count;
				$all_blogs = array();
				while($portfolio = mysqli_fetch_assoc($blog_result)) {
					$all_blogs[] = $portfolio;
	?>
						<div class="col-md-3 col-sm-6">
						<!-- portfolio item-->
							<div class="portfolio-item text-center mb-30">
							<!-- media-->
								<div class="pic"><img src="<?= $portfolio['blog_image'] ?>" data-at2x="<?= $portfolio['blog_image'] ?>" alt="<?= $portfolio['blog_text'] ?>">
								<div class="hover-effect alt"></div>
								<div class="links"><a href="<?= $portfolio['blog_image'] ?>" class="link-icon alt flaticon-magnifying-glass84 fancy"></a></div>
								</div>
							<!-- ! media-->
							</div>
						<!-- ! portfolio item-->
						</div>
	<?php 
				}
				$pagin_count = $blog_count/$limit;
	?>
					</div>
					<!-- pagination-->
					<div class="row mt-0">
						<nav class="text-center">
							<ul class="pagination mt-0 mb-0">
	<?php 		if($show_pagin=='true'){
					for($pagins=0;$pagins<$pagin_count;$pagins++) {
		?>
									<li><a class="pagin-direct" data-min="<?= ($tail) ?>" data-max="<?= ($tail+$limit)?>" href="#"><?= $pagins+1 ?></a></li>
		<?php 		
						$tail += $limit;
					}?>
							</ul>
						</nav>
					</div>
		<?php }?>
				<!-- ! pagination-->
				</div>
				<script>
					$(".pagin-direct").click(function(){
						var min = $(this).attr('data-min');
						var max = $(this).attr('data-max');
						var url = "<?= ADMIN_PATH ?>plugins/portfolio.php?show_pagin=false&task=view&limit=<?= $limit ?>&tail="+min;
						$.get(url, function(data) {
							$("#portfoio_post").html(data);
// 							alert(url);
						});
					});
				</script>

<?php 	}?>