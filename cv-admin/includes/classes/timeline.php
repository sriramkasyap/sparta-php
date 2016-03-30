<?php
	class timeline extends post {
		public static $snippet_meta = array('section_heading' => ['varchar','Lorem Ipsum']
											
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
			$meta = $this->post_meta;
			$html_structure = '<div class="row" >
				        <h4 class="section-header center">'.$meta['section_heading'][1] . '</h4>
				        <div class="container divider"></div>
				        <iframe src="//cdn.knightlab.com/libs/timeline3/latest/embed/index.html?source=17Fu9s6R14KKZ9CHJfQe7-vQ1FKX-qHGgvHR4OEaQcko&font=Default&lang=en&initial_zoom=0&height=500" width="100%" height="500" frameborder="0"></iframe>
				    <br><hr></div>';
										
			return $html_structure;
		}
		
	}
	
?>