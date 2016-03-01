<?php
	include 'includes/functions.php';
	include 'includes/site_config.php';
	if(!isset($_GET['task'])) {
		//header('Location: index.php');
		//exit();
        $task = 'load_front';
	}
	else {
		$task = $_GET['task'];
	}
	$request_array = explode('/',$_SERVER['REQUEST_URI']);
	if(empty(end($request_array))) {
		array_pop($request_array);
	}
	//print_r ($request_array);
	include 'includes/head.php';
	
	switch ($task) {
		
        case 'preview_snippet' :	preview_snippet($_GET['sid']);
                            		break;
                            		
       	case 'preview_post' : 		preview_post();
                            		break;
                            		
       	case 'load_front': 			load_frontend();
       								break;
	}
?>
<body id="page-top">

<?php

    function preview_snippet($sid) {
        $where = ' WHERE `snippet_id` = ' . $_GET['sid'];
        $table = 'snippets`';
        $content = 'snippet_content';
        $sql_posts = 'SELECT * FROM `' . TABLE_PREFIX . $table . $where;
	    $result_posts = mysqli_query(connect_db(), $sql_posts);
	    while($row_posts = mysqli_fetch_assoc($result_posts)) {
	        echo $row_posts[$content];
	    }
    }
    
    function load_frontend() {
    	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    	$url = str_replace(ABS_PATH, '', $url);
    	$url_array = explode('/', $url);
    	$url_array = array_filter($url_array);
//     	print_r($url_array);
    	if(empty($url_array[count($url_array)-1])) {
    		$request_page_url = 'home';
    	}
    	else {
    		$request_page_url = $url_array[count($url_array)-1];
    	}
//     	echo $request_page;
		$request_query = 'SELECT `page_id` FROM `'.TABLE_PREFIX.'pages` WHERE `page_url` = "'.$request_page_url.'"';
// 		echo $request_query;
		$request_result = mysqli_query(connect_db(), $request_query);
    	
    	if(mysqli_num_rows($request_result)==1) {
    		$request_row = mysqli_fetch_assoc($request_result);
    		$request_page_id = $request_row['page_id'];
//     		echo $request_page_id;
    	}
    	else {
    		$request_page_id = 1;
    	}
		$where = ' WHERE `page_id` = '.$request_page_id;
    	$table = '`'.TABLE_PREFIX.'posts`';
    	$order = ' ORDER BY `post_pos` ASC';
    	$content = 'post_content';
    	include 'includes/nav.php';
    	$sql_posts = 'SELECT * FROM '. $table . $where . $order;
    	$result_posts = mysqli_query(connect_db(), $sql_posts);
    	while($row_posts = mysqli_fetch_assoc($result_posts)) {
    		echo $row_posts[$content];
    	}
    }

	function preview_post() {
		$serial = file_get_contents('cv-admin/temp.cv');
		$post = unserialize($serial);
		$post->preview();
	}
    
?>
</body>
<?php include 'includes/footer.php'; ?>