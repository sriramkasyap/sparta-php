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
        case 'add' :			add_page_submit($_POST);
                        		break;
        case 'edit' :			edit_page_submit($_POST);
                        		break;

        case 'add_link' :		add_link_submit($_POST);
                        		break;
		case 'edit_link' :		edit_link_submit($_POST);
                        		break;
                        	
        case 'add_script' :		add_script_submit($_POST);
                        		break;
        case 'edit_script' :	edit_script_submit($_POST);
                        		break;
	}
	
	function add_page_submit($post) {
			$sql = 'INSERT INTO `'.TABLE_PREFIX.'pages`(`page_url`, `page_title`, `page_heading`, `page_description`, `page_type`) VALUES ("'.$post["page_url"].'", "'.$post["page_heading"].'", "'.$post["page_heading"].'", "'.$post["page_description"].'", "'.$post["page_type"].'");';
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
		$sql = 'UPDATE `'.TABLE_PREFIX.'pages` SET `page_url`="'.$post['page_url'].'",`page_title`="'.$post['page_heading'].'",`page_heading`="'.$post['page_heading'].'",`page_description`="'.$post['page_description'].'",`page_type`="'.$post['page_type'].'" WHERE `page_id` ="'.$post['page_id'].'";';
// 					print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Page <strong>"'.$post['page_heading'].'"</strong> has been added successfully.');
			echo "<a href='pages.php?task=view' class='btn btn-success'>Back to Pages</a>";
		}
		else {
			echo warning_message('Page has not been added. Please Try Again');
		}
	}
	
	function add_link_submit($post) {
		$sql = 'INSERT INTO `'.TABLE_PREFIX.'links`(`link_name`, `link_rel`, `link_type`, `link_href`) VALUES ("'.$post["link_name"].'", "'.$post["link_rel"].'", "'.$post["link_type"].'", "'.$post["link_href"].'");';
		// 			print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Link <strong>"'.$post['link_name'].'"</strong> has been added successfully.');
			
		}
		else {
			echo warning_message('Link has not been added. Please Try Again');
		}
	}
	
	function edit_link_submit($post) {
		$sql = 'UPDATE `'.TABLE_PREFIX.'links`SET `link_name`="'.$post['link_name'].'",`link_rel`="'.$post['link_rel'].'",`link_type`="'.$post['link_type'].'",`link_href`="'.$post['link_href'].'" WHERE `link_id`="'.$post['link_id'].'"';
		// 			print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Link <strong>"'.$post['link_name'].'"</strong> has been edited successfully.');
				
		}
		else {
			echo warning_message('Link has not been edited. Please Try Again');
		}
	}
	
	function add_script_submit($post) {
		$sql = 'INSERT INTO `'.TABLE_PREFIX.'scripts`(`script_name`, `script_type`, `script_src`) VALUES ("'.$post["script_name"].'", "'.$post["script_type"].'", "'.$post["script_src"].'");';
		// 			print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Script <strong>"'.$post['script_name'].'"</strong> has been added successfully.');
				
		}
		else {
			echo warning_message('Script has not been added. Please Try Again');
		}
	}
	
	function edit_script_submit($post) {
		$sql = 'UPDATE `'.TABLE_PREFIX.'scripts`SET `script_name`="'.$post['script_name'].'", `script_type`="'.$post['script_type'].'",`script_src`="'.$post['script_src'].'" WHERE `script_id`="'.$post['script_id'].'"';
		// 			print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Script <strong>"'.$post['script_name'].'"</strong> has been edited successfully.');
	
		}
		else {
			echo warning_message('Script has not been edited. Please Try Again');
		}
	}
?>