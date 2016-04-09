<?php
	class lucenta_header extends post {
		public static $snippet_meta = array('post_title' => ['varchar','Lorem Ipsum'],
											'article_content' => ['text', '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>'],
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
			$html_structure = '<div class="container" id="home">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h1 class="head-main">' . $meta['main_heading'][1].'</h1>
                                        <h2 class="head-sub-main">' . $meta['sub_heading'][1].'</h2>
                                        <a class="btn btn-danger btn-lg " href="#about">Read More </a>
                                        <a class="btn btn-default btn-lg" href="#contact-sec">Leave Here </a>
                                        <div class="head-last"></div>

                                    </div>


                                </div>
                            </div>';
			
			return $html_structure;
		}
		
	}
	
?>