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
		case 'preview' : 	preview();
							break;
        case 'new' :        new_snippet($_GET['sid']);
                            break;
	}
	
	
	function preview() {
		echo '<iframe src="' . ABS_PATH . 'index.php?sid='.$_GET['sid'].'" frameborder=0 width="100%" height="auto"></iframe>';
	}

    function new_snippet($sid) {
        for($i=0;$i<100000000;$i++){}
        //echo $sid;
    }
?>

<style>
	iframe {
	width: 85vw;
	min-height: 75vh;
	margin-left: 7.5vw;
	margin-right: 7.5vw;
</style>
