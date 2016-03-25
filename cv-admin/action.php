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
        case 'edit' :	edit_page_submit($_POST);
                        break;
	}
	
	function add_page_submit($post) {
			$sql = 'INSERT INTO `site_pages`(`page_url`, `page_title`, `page_heading`, `page_description`, `page_type`) VALUES ("'.$post["page_url"].'", "'.$post["page_heading"].'", "'.$post["page_heading"].'", "'.$post["page_description"].'", "'.$post["page_type"].'");';
// 			print $sql;
			if(mysqli_query(connect_db(), $sql)) {
				echo success_message('Page <strong>"'.$post['page_heading'].'"</strong> has been added successfully.');
				echo "<a href='pages.php?task=view' class='btn btn-success'>Back to Pages</a>";
			}
			else {
				echo warning_message('Page has not been added. Please Try Again');
			}
	}
	
	function edit_page_submit($post) {
		$sql = 'UPDATE `site_pages` SET `page_url`="'.$post['page_url'].'",`page_title`="'.$post['page_heading'].'",`page_heading`="'.$post['page_heading'].'",`page_description`="'.$post['page_description'].'",`page_type`="'.$post['page_type'].'" WHERE `page_id` ="'.$post['page_id'].'";';
// 					print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Page <strong>"'.$post['page_heading'].'"</strong> has been added successfully.');
			echo "<a href='pages.php?task=view' class='btn btn-success'>Back to Pages</a>";
		}
		else {
			echo warning_message('Page has not been added. Please Try Again');
		}
	}
	
?>