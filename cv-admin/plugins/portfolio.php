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
        	case 'edit':    $page['title'] = 'Edit Portfolio';
        					edit_portfolio($_GET['lid']);
        					break;
        	case 'add':    	$page['title'] = 'Add New Portfolio';
        					add_portfolio();
        					break;
        
        	case 'delete':  delete_portfolio($_GET['lid']);
        					break;
        	case 'view':  	view_portfolio_front($_GET);
        					break;
        					 
        	default:		view_list();
        	
        }
        
		function add_portfolio(){
    		
			create_form_portfolio(-1);	
    	}
    	
    	function edit_portfolio($id) {
    		create_form_portfolio($id);
    	}
    	
    	function delete_portfolio($id) {
    		$link = connect_db();
    		$delete_query = "DELETE FROM `plugin_portfolio` WHERE `portfolio_id`='".$id."'";
    		if(mysqli_query($link, $delete_query)) {
    			echo success_message('Portfolio Item has been deleted successfully.');
    	
    		}
    		else {
    			echo warning_message('Portfolio Item has not been deleted. Please Try Again');
    		}
    	}
    	
    	function create_form_portfolio($id) {
    		$link = connect_db();
    		if($id!=-1) {
    			$form_query = "SELECT * FROM `plugin_portfolio` WHERE `portfolio_id` = '".$id."'";
    			$result_form = mysqli_query($link,$form_query);
    			$row_form = mysqli_fetch_assoc($result_form);
    			$task = 'edit_portfolio';
    		}
    		else {
    			$task = 'add_portfolio';
    		}
    		$form_builder = new FormBuilder(['plugins/portfolio_action.php?task='.$task,'post','multipart/form-data']);
    		$form_builder->addObject(['varchar','portfolio_name','Portfolio Name',(isset($row_form['portfolio_name']) ? $row_form['portfolio_name'] : '')], true);
    		$form_builder->addObject(['image','portfolio_image','Portfolio Image',(isset($row_form['portfolio_image']) ? $row_form['portfolio_image'] : '')], true);
    		$form_builder->addObject(['varchar','portfolio_text','Portfolio text',(isset($row_form['portfolio_text']) ? $row_form['portfolio_text'] : '')], true);
    		$form_builder->addObject(['hidden','portfolio_id','Portfolio ID',(isset($row_form['portfolio_id']) ? $row_form['portfolio_id'] : '')], true);
    		$form_builder->addSubmit('Submit');
    		$form_output = $form_builder->renderForm();
   ?>
    										
    		               			<div class="panel panel-primary">
    			                    	<div class="panel-heading">
    			                    		Portfolio Item Parameters
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
    	    		$page['title'] = 'Portfolio Items';
    	    		//         	include '../header.php';
    	    	   
    	    		?>
    	    	    	
    	    	    	                <div class="row">
    	    	    	                    <div class="col-lg-12">
    	    	    	                        <h1 class="page-header">Portfolio Items</h1>
    	    	    	                    </div>
    	    	    	                    <!-- /.col-lg-12 -->
    	    	    	                </div>
    	    	    	               	<div class="row">
    	    	    	               		<div  id="portfolio-form"></div>
    	    	    	               		<div class="form-group">
    	    	    	                    	<a href="#" class="portfolio-task btn btn-success" data-task="add" data-lid="0" title="Add"><i class="fa fa-plus"></i> Add New Portfolio Item</a>
    	    	    	                    </div>
    	    	    	                    <div class="col-lg-12" id="cv-post-content">
    	    	    	                    	
    	    	    							<table class="table table-hover">
    	    	    							    <thead>
    	    	    							        <tr>
    	    	    							            <th>S.No.</th>
    	    	    							            <th>Portfolio Item Name</th>
    	    	    							            <th>Portfolio Image</th>
    	    	    							            <th>Portfolio Item Text</th>
    	    	    							            <th colspan="2">Actions</th>
    	    	    							        </tr>
    	    	    							    </thead>
    	    	    							    <tbody>
    	    	    	<?php 
    	    	    	            $view_query = "SELECT * FROM `plugin_portfolio`";
    	    	    	            //echo $query;
    	    	    	            $all_posts_result = mysqli_query($link, $view_query);
    	    	    	            if(mysqli_num_rows($all_posts_result)>0) {
    	    	    	                while($row=mysqli_fetch_assoc($all_posts_result)) {
    	    	    	                    $all_items[$row['portfolio_id']] = $row;
    	    	    	                    echo '<tr>
    	    	    	                                <td></td>
    	    	    	                                <td>' . $row['portfolio_name'] . '</td>
    	    	    	                                <td>' . $row['portfolio_image'] . '</td>
    	    	    	                                <td>' . $row['portfolio_text'] . '</td>
    	    	    	                                <td><div class="btn-group" role="group">
    	    	    		                                <a href="#" class="portfolio-task btn btn-warning" data-task="edit" data-sid="' . $row['portfolio_id'] . '" title="Edit"><i class="fa fa-pencil"></i></a>
    	    	    		                                <a href="#" class="portfolio-task btn btn-danger" data-task="delete" data-sid="' . $row['portfolio_id'] . '" title="Delete"><i class="fa fa-trash"></i></a></div>
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
    	    	    	        
		function view_portfolio_front($args) {
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
				$query = "SELECT * FROM `plugin_portfolio` ".$limit_query;
// 				echo $query;
				$portfolio_result = mysqli_query($link,$query);
				$portfolio_count = mysqli_query($link,"SELECT COUNT(`portfolio_id`) as `portfolio_count` FROM `plugin_portfolio` ");
				$p_count = mysqli_fetch_assoc($portfolio_count);
				$portfolio_count=$p_count['portfolio_count'];
// 				echo $portfolio_count;
				$all_portfolios = array();
				while($portfolio = mysqli_fetch_assoc($portfolio_result)) {
					$all_portfolios[] = $portfolio;
	?>
						<div class="col-md-3 col-sm-6">
						<!-- portfolio item-->
							<div class="portfolio-item text-center mb-30">
							<!-- media-->
								<div class="pic"><img src="<?= $portfolio['portfolio_image'] ?>" data-at2x="<?= $portfolio['portfolio_image'] ?>" alt="<?= $portfolio['portfolio_text'] ?>">
								<div class="hover-effect alt"></div>
								<div class="links"><a href="<?= $portfolio['portfolio_image'] ?>" class="link-icon alt flaticon-magnifying-glass84 fancy"></a></div>
								</div>
							<!-- ! media-->
							</div>
						<!-- ! portfolio item-->
						</div>
	<?php 
				}
				$pagin_count = $portfolio_count/$limit;
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