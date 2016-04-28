<?php
	
	if (isset($_GET['task'])) {
		$task = $_GET['task'];
	}
	include '../includes/functions.php';
	include '../includes/site_config.php';
	switch ($task) {
		case 'display' : display_requests();
						break;
						
		default: 		insert_request($_POST);
						break;
	}
	
	function insert_request($post) {
		
		$name = $post['name'];
		$email = $post['email'];
		$message = $post['message'];
		$sql="INSERT INTO `".TABLE_PREFIX."contact_requests` (`name`,`email,`message`) VALUES ('$name', '$email', '".addslashes($message)
		."')";
		if(mysqli_query(connect_db(),$sql)){
			header("Location: ".$_SERVER['HTTP_REFERRER']);
		}
	}
	
	function display_requests() {
        	
			$page['title'] = 'Contact Requests';
//         	include '../header.php';
        
  ?> 

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Contact Requests</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               	<div class="row">
               		<div  id="topnav-form"></div>
               		
                    <div class="col-lg-12" id="cv-post-content">
                    	
						<table class="table table-hover">
						    <thead>
						        <tr>
						            <th> S.No.</th>
						            <th> Name</th>
						            <th> Email</th>
						            <th> Message</th>
						            
						        </tr>
						    </thead>
						    <tbody>
<?php 
            $view_query = "SELECT * FROM `".TABLE_PREFIX."contact_requests`";
            //echo $query;
            $all_posts_result = mysqli_query(connect_db(), $view_query);
            if(mysqli_num_rows($all_posts_result)>0) {
                while($row=mysqli_fetch_assoc($all_posts_result)) {
                    
                    echo '<tr>
                                <td></td>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['email'] . '</td>
       							<td>' . $row['message']. '</td>
                                
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
<?php 
        }
?>