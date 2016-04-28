<?php
	class eight_portfolio extends post {
		public static $snippet_meta = array('max_posts_per_page'=>['number','8']
											
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
			$limit = $meta['max_posts_per_page'][1];
			$html_structure = '<div id="portfolio_page"></div>
								<script>
									
									$.get("'.ADMIN_PATH.'plugins/portfolio.php?show_pagin=true&task=view&limit='.$limit.'",function(data) {
										$("#portfolio_page").html(data);			
									});
								</script>';
			return $html_structure;
		}
		
	}
	
?>