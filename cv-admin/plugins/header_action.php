<?php
	include '../includes/functions.php';
	include '../includes/site_config.php';
	if(!isset($_GET['task'])) {
		header('Location: index.php');
		exit();
	}
	else {
		$task = $_GET['task'];
	}
	switch ($task) {
		case 'add_topnav' :		add_topnav_submit($_POST);
								break;
		case 'edit_topnav' :	edit_topnav_submit($_POST);
								break;
		case 'add_top_panel' :		add_top_panel_submit($_POST);
								break;
		case 'edit_top_panel' :	edit_top_panel_submit($_POST);
								break;
	}
	function add_topnav_submit($post) {
		$sql = 'INSERT INTO `'.TABLE_PREFIX.'topnav`(`topnav_name`, `topnav_link`, `topnav_parent_id`) VALUES ("'.$post["topnav_name"].'", "'.$post["topnav_link"].'", "'.$post["topnav_parent_id"].'");';
		// 			print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Nav Item <strong>"'.$post['topnav_name'].'"</strong> has been added successfully.');
			echo "<script> $.get('plugins/header.php?source=site_topnav',function(data) {
								$('#cv-page-content').html(data);
	
							}); </script>";
		}
		else {
			echo warning_message('Script has not been added. Please Try Again');
		}
	}
	
	function edit_topnav_submit($post) {
		$sql = 'UPDATE `'.TABLE_PREFIX.'topnav`SET `topnav_name`="'.$post['topnav_name'].'", `topnav_link`="'.$post['topnav_link'].'",`topnav_parent_id`="'.$post['topnav_parent_id'].'" WHERE `topnav_id`="'.$post['topnav_id'].'"';
		// 			print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Nav Item <strong>"'.$post['topnav_name'].'"</strong> has been edited successfully.');
			echo "<script> $.get('plugins/header.php?source=site_topnav',function(data) {
								$('#cv-page-content').html(data);
	
							}); </script>";
		}
		else {
			echo warning_message('Script has not been edited. Please Try Again');
		}
	}
	
	function add_top_panel_submit($post) {
		$sql = 'INSERT INTO `'.TABLE_PREFIX.'top_panel`(`top_panel_name`, `top_panel_link`, `top_panel_icon`) VALUES ("'.$post["top_panel_name"].'", "'.$post["top_panel_link"].'", "'.$post["top_panel_icon"].'");';
		// 			print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Top Panel Item <strong>"'.$post['top_panel_name'].'"</strong> has been added successfully.');
			echo "<script> $.get('plugins/header.php?source=site_top_panel',function(data) {
								$('#cv-page-content').html(data);
	
							}); </script>";
		}
		else {
			echo warning_message('Script has not been added. Please Try Again');
		}
	}
	
	function edit_top_panel_submit($post) {
		$sql = 'UPDATE `'.TABLE_PREFIX.'top_panel`SET `top_panel_name`="'.$post['top_panel_name'].'", `top_panel_link`="'.$post['top_panel_link'].'",`top_panel_icon`="'.$post['top_panel_icon'].'" WHERE `top_panel_id`="'.$post['top_panel_id'].'"';
		// 			print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Top Panel Item <strong>"'.$post['top_panel_name'].'"</strong> has been edited successfully.');
			echo "<script> $.get('plugins/header.php?source=site_top_panel',function(data) {
								$('#cv-page-content').html(data);
	
							}); </script>";
		}
		else {
			echo warning_message('Script has not been edited. Please Try Again');
		}
	}

?>