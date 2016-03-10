<?php
	class start_bootstrap_services extends post {
		protected $repeatable_element = 'service';
		public static $snippet_meta = array('section_heading' => ['varchar', 'At Your Service'],
											'service'=> ['repeatable' , ['icon' => ['icon', 'fa-phone'],
																		'sub_head' => ['varchar','Sturdy Templates'],
																		'sub_description' => ['text','Our templates are updated regularly so they don\'t break.']]]
											
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
			$html_structure = '<section id="services">
							        <div class="container">
							            <div class="row">
							                <div class="col-lg-12 text-center">
							                    <h2 class="section-heading">' . $meta['section_heading'][1] .  '</h2>
							                    <hr class="primary">
							                </div>
							            </div>
							        </div>
							        <div class="container">
							            <div class="row">';
				for($i=0;$i<count($repeater['icon'][1]);$i++) {
					$html_structure .='<div class="col-lg-3 col-md-6 text-center">
							                    <div class="service-box">
							                        <i class="fa fa-4x ' . $repeater['icon'][1][$i] .  ' wow bounceIn text-primary"></i>
							                        <h3>' . $repeater['sub_head'][1][$i] .  '</h3>
							                        <p class="text-muted">' . $repeater['sub_description'][1][$i] .  '</p>
							                    </div>
							                </div>';
				}
				$html_structure .='</div></div>
							    </section>';
			return $html_structure;
		}
		
	}
	
?>