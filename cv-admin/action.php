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
        case 'add' :	add_page_submit($_POST);
                        break;
	}
	
	function add_page_submit($post) {
		foreach ($post as $post_keey => $post_variable) {
			
		}
	}
	
?>