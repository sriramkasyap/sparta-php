<?php
	class start_bootstrap_contact extends post {
		protected $repeatable_element = 'contact_element';
		public static $snippet_meta = array('section_heading' => ['varchar', "Let's Get In Touch!"],
											'section_description' => ['text', "<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>"],
// 											'contact_icon_1' => ['icon', "fa-phone"],
// 											'contact_content_1' => ['varchar', "123-456-6789"],
// 											'contact_icon_for_email' => ['icon', "fa-envelope-o"],
// 											'contact_email' => ['email', "feedback@startbootstrap.com"],
// 											'contact_content_for_email' => ['varchar', "feedback@startbootstrap.com"],
											'contact_element' => ['repeatable',['contact_icon_for_element' => ['icon', "fa-envelope-o"],
																				'contact_content_for_element' => ['varchar', ""]] ]
											
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
			$html_structure = '<section id="contact">
							        <div class="container">
							            <div class="row">
							                <div class="col-lg-8 col-lg-offset-2 text-center">
							                    <h2 class="section-heading">' . $meta['section_heading'][1] .  '</h2>
							                    <hr class="primary">
							                    ' . $meta['section_description'][1] . '
							                </div>';
			for($i=0;$i<count($repeater['contact_icon_for_element'][1]);$i++) {
				$html_structure .='<div class="col-lg-4 col-lg-offset-1 text-center">
					                    <i class="fa ' . $repeater['contact_icon_for_element'][1][$i] . ' fa-3x wow bounceIn"></i>
					                    <p>' . $repeater['contact_content_for_element'][1][$i] . '</p>
					                </div>';
			}
			$html_structure .='</div>
							        </div>
							    </section>';
			return $html_structure;
		}
		
		
	}
	
?>