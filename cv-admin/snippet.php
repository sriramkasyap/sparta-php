<?php
	include 'includes/functions.php';
	include 'includes/site_config.php';
	if(!isset($_GET['task'])) {
		header('Location: index.php');
		exit();
	}
	else {
		$task = $_GET['task'];
	}
	
	switch ($task) {
		case 'preview' : 	preview($_GET['sid']);
							break;
        case 'new' :        new_snippet($_GET['sid']);
                            break;
        case 'submit_post' :	if(!empty($_FILES)) {
						        	submit_post_files($_POST,$_FILES);
						        }
						        else {
        							submit_post($_POST);
						        }
                            	break;
       	case 'preview_post' : 	if(isset($_GET['pid'])){
						       		preview_post_old($_GET['pid']);
						       	}
						       	else {
       								preview_post();
						       	}
                            	break;
		case 'delete_post' : 	delete_post($_GET['sid']);
                            break;
		case 'edit_post_arg' : 	edit_post_arg($_GET['sid']);
								break;
		case 'edit_post'	:	edit_post();
							    break;
		case 'publish_post' : 	publish_post();
                            break;
		default : 			preview_post();
							break;
	}
	
	
	function preview($sid) {
		echo '<iframe style="margin-left: 7.5vw;margin-right: 7.5vw;width: 85vw" src="' . ABS_PATH . 'index.php?task=preview_snippet&sid='.$sid.'" frameborder=0 width="100%" height="auto"></iframe>';
	}

    function new_snippet($sid) {
        //for($i=0;$i<10000000;$i++){}
        //echo $sid;
        unset($_GET['sid']);
        $result_snippet = mysqli_query(connect_db(), 'SELECT * FROM `' . TABLE_PREFIX .'snippets` WHERE `snippet_id` = ' . $sid);
        $row_snippet = mysqli_fetch_assoc($result_snippet);
        $new_post = new $row_snippet['snippet_name']();
        //$new_post->printer();
        $serial = serialize($new_post);
        file_put_contents('temp.cv', $serial);
        $new_post->create_form('new');
        echo '<script type="text/javascript">
				$("#new_snip_form").submit(function(event) {
				    		/* stop form from submitting normally */
							event.preventDefault();
        					$.ajax({
								url: "snippet.php?task=submit_post", 
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
        		</script>';
    }

	function submit_post($post_form){
		//print_r ($post_form);
		//print_r($_FILES);
		$serial = file_get_contents('temp.cv');
		$post = unserialize($serial);
		$post->submit_form($post_form);
		$serial = serialize($post);
		file_put_contents('temp.cv', $serial);
		echo success_message('Your post <strong>"' . $post->post_heading . '"</strong> has been successfully Submitted. Click below to preview, edit or Publish the post.');
		echo '<div class="btn-group" role="group">';
		echo '<a title="Preview Post" class="btn btn-info simple-popup" role="button" href="#preview_post"><span class="fa fa-eye"></span> Preview Post</a>';
		echo '<a title="Edit Post" class="btn btn-warning snippet-task" href="#" data-task="edit_post"><span class="fa fa-pencil"></span> Edit Post</a>';
		echo '<a title="Publish Post" class="btn btn-success snippet-task" href="#" data-task="publish_post"><span class="fa fa-check"></span> Publish Post</a></div>';
		echo '<div class="mfp-hide" id="preview_post">';
		echo '<iframe src="' . ABS_PATH . 'index.php?task=preview_post" frameborder="0" width="100%" height="auto"></iframe>';
		echo '</div>';
		echo '<script type="text/javascript">
                    $(".snippet-task").click(function(){
                    	$(document).ajaxStart(function(){
                            $("#cv-post-content").html("");
                            $("#wait").css("display", "block");
                        });
                        $(document).ajaxComplete(function(){
                            $("#wait").css("display", "none");
                        });
                        var url = "snippet.php?task=" + $(this).attr("data-task") + "&sid=" + $(this).attr("data-sid");
                        $.get(url, function(data, status){
                                $("#cv-post-content").html(data);
                        });
                        
                    });
                    </script>';
		//	$post->printer();
	}
	
	function submit_post_files($post_form, $files){
		//print_r ($post_form);
		//print_r($_FILES);
		foreach($files as $file_name=>$file_param) {
// 			print_r($file_name);
// 			print_r($file_param);
			$target_dir = '../img/'; 
			$target_file = $target_dir . basename($file_param["name"]);
			$uploadOk = 1;
			$blog_errors = array();
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			$check = getimagesize($file_param["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$blog_errors[] = "File is not an image.";
				$uploadOk = 0;
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				$info = pathinfo($target_file);
				$target_file = $target_dir . str_shuffle(basename($file_param["name"],'.'.$info['extension'])).'.'.$info['extension'];
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
				&& $imageFileType != "GIF" ) {
					$blog_errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$blog_errors[] = "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} 
			else 
			{
				if (move_uploaded_file($file_param["tmp_name"], $target_file)) {
					$post_form[$file_name] = $target_file;
				}
			}
			//print_r($blog_errors);
		}
		$serial = file_get_contents('temp.cv');
		$post = unserialize($serial);
		$post->submit_form($post_form);
// 		$post->printer();
		$serial = serialize($post);
		file_put_contents('temp.cv', $serial);
		echo success_message('Your post <strong>"' . $post->post_heading . '"</strong> has been successfully Submitted. Click below to preview, edit or Publish the post.');
		echo '<div class="btn-group" role="group">';
		echo '<a title="Preview Post" class="btn btn-info simple-popup" role="button" href="#preview_post"><span class="fa fa-eye"></span> Preview Post</a>';
		echo '<a title="Edit Post" class="btn btn-warning snippet-task" href="#" data-task="edit_post"><span class="fa fa-pencil"></span> Edit Post</a>';
		echo '<a title="Publish Post" class="btn btn-success snippet-task" href="#" data-task="publish_post"><span class="fa fa-check"></span> Publish Post</a></div>';
		echo '<div class="mfp-hide" id="preview_post">';
		echo '<iframe src="' . ABS_PATH . 'index.php?task=preview_post" frameborder="0" width="100%" height="auto"></iframe>';
		echo '</div>';
		echo '<script type="text/javascript">
                    $(".snippet-task").click(function(){
                    	$(document).ajaxStart(function(){
                            $("#cv-post-content").html("");
                            $("#wait").css("display", "block");
                        });
                        $(document).ajaxComplete(function(){
                            $("#wait").css("display", "none");
                        });
                        var url = "snippet.php?task=" + $(this).attr("data-task") + "&sid=" + $(this).attr("data-sid");
                        $.get(url, function(data, status){
                                $("#cv-post-content").html(data);
                        });
	
                    });
                    </script>';
		//	$post->printer();
	}
	
	function preview_post() {
		echo '<iframe src="' . ABS_PATH . 'index.php?task=preview_post" frameborder="0" width="100%" height="auto"></iframe>';
	}
	
	function preview_post_old($pid) {
		echo '<iframe src="' . ABS_PATH . 'index.php?task=preview_post_old&pid='.$pid.'" frameborder="0" width="100%" height="auto"></iframe>';
	}

	function edit_post() {
		$serial = file_get_contents('temp.cv');
		$post = unserialize($serial);
		$post->create_form('edit');
		echo '<script type="text/javascript">
				$("#new_snip_form").submit(function(event) {
				    		/* stop form from submitting normally */
							event.preventDefault();
        					$.ajax({
								url: "snippet.php?task=submit_post", // Url to which the request is send
								type: "POST",             // Type of request to be send, called as method
								data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
								contentType: false,       // The content type used when sending data to the server.
								cache: false,             // To unable request pages to be cached
								processData:false,        // To send DOMDocument or non processed data file it is set to false
								success: function(data)   // A function to be called if request succeeds
								{
									$("#cv-post-content").html(data);
								}
							});
			    });
        		</script>';
	}
	
	function publish_post() {
		$serial = file_get_contents('temp.cv');
		$post = unserialize($serial);
		// 		$post->printer();
		if($post->publish_post() && file_exists('temp.cv')) {
			unlink('temp.cv');
			
		}
	}
	
	function edit_post_arg ($pid) {
		$query_snippet = 'SELECT `snippet_id`, `snippet_name` FROM `'.TABLE_PREFIX.'posts` JOIN `'.TABLE_PREFIX.'snippets` USING (`snippet_id`) WHERE `post_id`='.$pid;
		//echo $query_snippet;
		$result_snippet = mysqli_query(connect_db(),$query_snippet );
		$row_snippet = mysqli_fetch_assoc($result_snippet);
		$snippet_name = $row_snippet['snippet_name'];
		$post = new $snippet_name($pid);
// 		$post->uporin = 'up';
// 		$post->printer();
		$post->create_form('edit');
		$serial = serialize($post);
		file_put_contents('temp.cv', $serial);
		echo '<script type="text/javascript">
				$("#new_snip_form").submit(function(event) {
				    		/* stop form from submitting normally */
							event.preventDefault();
        					$.ajax({
								url: "snippet.php?task=submit_post", // Url to which the request is send
								type: "POST",             // Type of request to be send, called as method
								data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
								contentType: false,       // The content type used when sending data to the server.
								cache: false,             // To unable request pages to be cached
								processData:false,        // To send DOMDocument or non processed data file it is set to false
								success: function(data)   // A function to be called if request succeeds
								{
									$("#cv-post-content").html(data);
								}
							});
			    });
        		</script>';
	}
	
	function delete_post($pid) {
		$query_snippet = 'SELECT `snippet_id`, `snippet_name` FROM `'.TABLE_PREFIX.'posts` JOIN `'.TABLE_PREFIX.'snippets` USING (`snippet_id`) WHERE `post_id`='.$pid;
		//echo $query_snippet;
		$result_snippet = mysqli_query(connect_db(),$query_snippet );
		$row_snippet = mysqli_fetch_assoc($result_snippet);
		$snippet_name = $row_snippet['snippet_name'];
		$post = new $snippet_name($pid);
		$post->delete();
	}
?>
<script type="text/javascript">
    $(".simple-ajax-popup").magnificPopup({
        type: "ajax",
        overflowY: "scroll" 
    });
    $('.simple-popup').magnificPopup({
    	  type:'inline',
    	  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    	});
</script>
<style>
	iframe {
		width: 100%;
		min-height: 75vh;
	}
</style>

