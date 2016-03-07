<?php
	class start_bootstrap_header extends post {
		public static $snippet_meta = array('main_heading' => ['varchar', 'Your Favorite Source of Free Bootstrap Themes'],
											'main_description' => ['text','Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!'],
											'button_link' => ['varchar', '#about'],
											'button_text' => ['varchar', 'Find Out More'],
											'background-image' => ['varchar', 'img/header.jpg']
		);
		//Mandatory Block of Code
		// Constructor function which calls any overloaded constructor if called with an argument
		//When no arguments are passed, a new object is formed with the meta values given from the form
		function __construct() {
			$a = func_get_args();
			$i = func_num_args();
			if (method_exists($this,$f='__construct'.$i)) {
				call_user_func_array(array($this,$f),$a);
			}
			else {
				parent::__construct();
			}
		}
		// When an argument id is passed, the post with the requested id is fetched.
		function __construct1($fetch_id) {
			parent::__construct1($fetch_id);
		}
		function create_structure(){
			$html_structure = '<header style="background-image:'.$this->post_meta['background-image'][1].' ">
				    <div class="header-content">
				        <div class="header-content-inner">
				            <h1>' . $this->post_meta['main_heading'][1] . '</h1>
				            <hr>
				            <p>' . $this->post_meta['main_description'][1] . '</p>
				            <a href="' . $this->post_meta['button_link'][1] . '" class="btn btn-primary btn-xl page-scroll">' . $this->post_meta['button_text'][1] . '</a>
				        </div>
				    </div>
				</header>';
			return $html_structure;
		}
		
	}
	
?>