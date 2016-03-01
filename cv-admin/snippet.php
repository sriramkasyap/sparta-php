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
        case 'submit_post' :submit_post($_POST);
                            break;
       	case 'preview_post' : 	preview_post();
                            break;
		case 'edit_post' : 	edit_post();
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
        $result_snippet = mysqli_query(connect_db(), 'SELECT * FROM `' . TABLE_PREFIX .'snippets` WHERE `snippet_id` = ' . $sid);
        $row_snippet = mysqli_fetch_assoc($result_snippet);
        $new_post = new $row_snippet['snippet_name']();
        //$new_post->printer();
        $serial = serialize($new_post);
        file_put_contents('temp.cv', $serial);
        $new_post->create_form('new');
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

	function submit_post($post_form){
		//print_r ($post_form);
		$serial = file_get_contents('temp.cv');
		$post = unserialize($serial);
		$post->submit_form($post_form);
		//$post->printer();
		$serial = serialize($post);
		file_put_contents('temp.cv', $serial);
		echo success_message('Your post <strong>"' . $post->post_heading . '"</strong> has been successfully Submitted. Click below to preview, edit or Publish the post.');
		echo '<div class="btn-group" role="group">';
		echo '<a title="Preview Post" class="btn btn-info simple-popup" role="button" href="#preview_post"><span class="fa fa-eye"></span>Preview Post</a>';
		echo '<a title="Edit Post" class="btn btn-warning snippet-task" href="#" data-task="edit_post"><span class="fa fa-pencil"></span>Edit Post</a>';
		echo '<a title="Publish Post" class="btn btn-success snippet-task" href="#" data-task="publish_post"><span class="fa fa-pencil"></span>Publish Post</a></div>';
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

	function edit_post() {
		$serial = file_get_contents('temp.cv');
		$post = unserialize($serial);
		$post->create_form('edit');
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
	
	function publish_post() {
		$serial = file_get_contents('temp.cv');
		$post = unserialize($serial);
		$post->publish_post();
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

