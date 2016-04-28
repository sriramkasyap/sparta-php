<?php 
	include 'cv-admin/includes/functions.php';
	include 'cv-admin/includes/site_config.php';
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
?>
	<body>
	
<?php 	
	
	switch ($task) {
		
        case 'preview_snippet' :	preview_snippet($_GET['sid']);
                            		break;

       	case 'preview_post' : 		preview_post();
                            		break;

		case 'preview_post_old' : 	preview_post_old($_GET['pid']);
                            		break;

       	default: 			load_frontend();
       								break;
	}
    function preview_snippet($sid) {
        $where = ' WHERE `snippet_id` = ' . $_GET['sid'];
        $table = 'snippets`';
        $content = 'snippet_content';
        $sql_posts = 'SELECT * FROM `' . TABLE_PREFIX . $table . $where;
//         echo $sql_posts; 
	    $result_posts = mysqli_query(connect_db(), $sql_posts);
	    while($row_posts = mysqli_fetch_assoc($result_posts)) {
	        echo stripslashes($row_posts[$content]);
	    }
    }
    
    function load_frontend() {
    	echo '<div>';
    	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    	$url = str_replace(ABS_PATH, '', $url);
    	$url_array = explode('/', trim($url,'/'));
    	$url_array = array_filter($url_array);
//     	print_r($url_array);
    	if(empty($url_array[count($url_array)-1])) {
    		$request_page_url = 'home';
    	}
    	else {
    		$request_page_url = $url_array[count($url_array)-1];
    	}
//     	echo $request_page;
		$request_query = 'SELECT `page_id`,`page_title` FROM `'.TABLE_PREFIX.'pages` WHERE `page_url` = "/'.$request_page_url.'/"';
// 		echo $request_query;
		$request_result = mysqli_query(connect_db(), $request_query);
    	
    	if(mysqli_num_rows($request_result)==1) {
    		$request_row = mysqli_fetch_assoc($request_result);
    		$request_page_id = $request_row['page_id'];
//     		echo $request_page_id;
    	}
    	else {
    		$request_query = 'SELECT `page_id`,`page_title` FROM `'.TABLE_PREFIX.'pages` WHERE `page_url` = "/home/"';
    		$request_result = mysqli_query(connect_db(), $request_query);
    		$request_row = mysqli_fetch_assoc($request_result);
    		$request_page_id = $request_row['page_id'];
    	}
		$where = ' WHERE `page_id` = '.$request_page_id.'  OR `post_on_every_page` = 1';
    	$table = '`'.TABLE_PREFIX.'posts`';
    	$order = ' ORDER BY `post_pos` ASC';
    	$content = 'post_content';
        $page = $request_row['page_title'];
    	include 'includes/nav.php';
    	$sql_posts = 'SELECT * FROM '. $table . $where . $order;
    	$result_posts = mysqli_query(connect_db(), $sql_posts);
        if($result_posts) {
            while($row_posts = mysqli_fetch_assoc($result_posts)) {
                echo stripslashes($row_posts[$content]);
            }
        }
    }

	function preview_post() {
		$serial = file_get_contents('cv-admin/temp.cv');
		$post = unserialize($serial);
		$post->preview();
	}
    
	function preview_post_old($pid) {
		$where = ' WHERE `post_id` = '.$pid;
		$table = '`'.TABLE_PREFIX.'posts`';
		$order = '';
		$content = 'post_content';
		$sql_posts = 'SELECT * FROM '. $table . $where . $order;
		$result_posts = mysqli_query(connect_db(), $sql_posts);
		while($row_posts = mysqli_fetch_assoc($result_posts)) {
			echo stripslashes($row_posts[$content]);
		}
	}
  	include 'includes/foot.php';  
?>
</body>
</html>