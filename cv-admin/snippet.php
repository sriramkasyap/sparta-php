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
        case 'retrieve' :   retrieve_snippet($_GET['sid']);
                            break;
        case 'submit_post' :submit_post($_POST);
                            break;
       	case 'preview_post' : 	preview_post();
                            break;
	}
	
	
	function preview($sid) {
		echo '<iframe style="margin-left: 7.5vw;margin-right: 7.5vw;width: 85vw" src="' . ABS_PATH . 'index.php?task=preview_snippet&sid='.$sid.'" frameborder=0 width="100%" height="auto"></iframe>';
	}

    function new_snippet($sid) {
        for($i=0;$i<1000000;$i++){}
        //echo $sid;
        $result_snippet = mysqli_query(connect_db(), 'SELECT * FROM `' . TABLE_PREFIX .'snippets` WHERE `snippet_id` = ' . $sid);
        $row_snippet = mysqli_fetch_assoc($result_snippet);
        $new_post = new $row_snippet['snippet_name']();
        //$new_post->printer();
        $serial = serialize($new_post);
        file_put_contents('temp.cv', $serial);
        $new_post->create_form();
        echo '<script type="text/javascript">
				var post_form = $("#idform");
			    post_form.submit(function(event) {
						
				    /* stop form from submitting normally */
					event.preventDefault();
							//alert("OK");
			                /* get some values from elements on the page: */
			                url = post_form.attr( "action");
			
			                /* Send the data using post */
			                var posting = $.post( url, post_form.serialize());
			
			                /* Alerts the results */
			                posting.done(function( data ) {
			                  $("#cv-post-content").html(data);
			                });
				});</script>';
    }
    
    function retrieve_snippet($sid) {
    	$serial = file_get_contents('temp.cv');
    	$post = unserialize($serial);
    	$post->set_snippet_data();
    	$post->printer();
    }

	function submit_post($post_form){
		//print_r ($post_form);
		$serial = file_get_contents('temp.cv');
		$post = unserialize($serial);
		$post->submit_form($post_form);
		//$post->printer();
		$serial = serialize($post);
		file_put_contents('temp.cv', $serial);
		echo '<div class="alert alert-success" role="alert">Your post <strong>"' . $post->post_heading . '"</strong> has been successfully Submitted. Click below to preview, edit or Publish the post.</div>';
		echo '<div class="btn-group" role="group">';
		echo '<a class="btn btn-info simple-popup" role="button" href="#preview_post">Preview Post</a>';
		echo '<a class="btn btn-warning simple-ajax-popup" role="button" href="snippet.php?task=edit_post">Edit Post</a>';
		echo '<a class="btn btn-success simple-ajax-popup" role="button" href="snippet.php?task=publish_post">Publish Post</a></div>';
		echo '<div class="mfp-hide" id="preview_post">';
		echo '<iframe src="' . ABS_PATH . 'index.php?task=preview_post" frameborder="0" width="100%" height="auto"></iframe>';
		echo '</div>';
	}
	
	function preview_post() {
		echo '<iframe src="' . ABS_PATH . 'index.php?task=preview_post" frameborder="0" width="100%" height="auto"></iframe>';
		echo '';
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

