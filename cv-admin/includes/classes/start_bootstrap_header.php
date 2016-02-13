<?php
	class start_bootstrap_header extends post {
		function printer() {
			print_r($this);
			print static::$snippet_class . "<br>";
			print static::$snippet_name . "<br>";
			print static::$snippet_id . "<br>";
		}
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
		function __construct1($fetch_id) {
			parent::__construct1($fetch_id);
		}
		function create_structure(){
			$html_structure = '<header>
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