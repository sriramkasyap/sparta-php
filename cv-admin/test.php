<?php
include 'includes/functions.php';
include 'includes/site_config.php';
spl_autoload_register(function ($class_name) {
	include 'includes/classes/' . $class_name. '.php';
});

$new_post = new start_bootstrap_header(1);

	$new_post->create_post();
	$new_post->printer();
?>