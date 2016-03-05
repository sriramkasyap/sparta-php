<?php
	class start_bootstrap_portfolio extends post {
		protected $repeatable_element = 'project';
		public static $snippet_meta = array('project' => ['repeatable', ['project_image' => ['varchar', 'img/portfolio/1.jpg'],
																		'category_name' => ['varchar', 'Category'],
																		'project_name' => ['varchar','Project Name']]]					
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
			$repeater = $meta[$this->repeatable_element][1];
			$html_structure = '<section class="no-padding" id="portfolio">
					        <div class="container-fluid">
					            <div class="row no-gutter">';
			for($i=0;$i<count($repeater['project_image'][1]);$i++) {
				$html_structure .='<div class="col-lg-4 col-sm-6">
					                    <a href="#" class="portfolio-box">
					                        <img src="' . $repeater['project_image'][1][$i] .  '" class="img-responsive" alt="">
					                        <div class="portfolio-box-caption">
					                            <div class="portfolio-box-caption-content">
					                                <div class="project-category text-faded">
					                                    ' . $repeater['category_name'][1][$i] .  '
					                                </div>
					                                <div class="project-name">
					                                    ' . $repeater['project_name'][1][$i] . '
					                                </div>
					                            </div>
					                        </div>
					                    </a>
					                </div>';
			}
			$html_structure .='</div>
					        </div>
					    </section>';
			return $html_structure;
		}
		
	}
	
?>