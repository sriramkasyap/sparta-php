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
		case 'add_portfolio' :	add_portfolio($_POST, $_FILES);
								break;
		case 'edit_portfolio' :	edit_portfolio($_POST, $_FILES);
								break;
	}
	function add_portfolio($post, $files) {
		foreach ($files as $file=>$file_params){
			$file_value = submit_file($file, $file_params);
		}
		$sql = 'INSERT INTO `plugin_portfolio`(`portfolio_name`, `portfolio_image`, `portfolio_text`) VALUES ("'.$post["portfolio_name"].'", "'.$file_value.'", "'.$post["portfolio_text"].'");';
		// 			print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Portfolio Item <strong>"'.$post['portfolio_name'].'"</strong> has been added successfully.');
			echo "<script> $.get('plugins/portfolio.php',function(data) {
								$('#cv-page-content').html(data);
	
							}); </script>";
		}
		else {
			echo warning_message('Script has not been added. Please Try Again');
		}
	}
	
	function edit_portfolio($post, $files) {
		print_r($files);
		if(isset($files['portfolio_image']) && !empty($files['portfolio_image']['name'])) {
			foreach ($files as $file=>$file_params){
				$file_value = submit_file($file, $file_params);
			}
			$sql = 'UPDATE `plugin_portfolio` SET `portfolio_name`="'.$post['portfolio_name'].'", `portfolio_image`="'.$file_value.'",`portfolio_text`="'.$post['portfolio_text'].'" WHERE `portfolio_id`="'.$post['portfolio_id'].'"';
		}
		else {
			$sql = 'UPDATE `plugin_portfolio`SET `portfolio_name`="'.$post['portfolio_name'].'", `portfolio_text`="'.$post['portfolio_text'].'" WHERE `portfolio_id`="'.$post['portfolio_id'].'"';
		}
		
		// 			print $sql;
		if(mysqli_query(connect_db(), $sql)) {
			echo success_message('Portfolio Item <strong>"'.$post['portfolio_name'].'"</strong> has been edited successfully.');
			echo "<script> $.get('plugins/portfolio.php',function(data) {
								$('#cv-page-content').html(data);
	
							}); </script>";
		}
		else {
			echo warning_message('Script has not been edited. Please Try Again');
		}
	}
	
	function submit_file($file_name, $file_param) {
		// 			print_r($file_name);
		// 			print_r($file_param);
		$target_dir = '../../img/';
		$added_file =  basename($file_param["name"]);
		$target_file = $target_dir . $added_file;
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
			$added_file = str_shuffle(basename($file_param["name"],'.'.$info['extension'])).'.'.$info['extension'];
			$target_file = $target_dir . $added_file;
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
						return 'img/'.$added_file;
					}
				}
				//print_r($blog_errors);
	}

?>