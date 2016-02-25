<?php
	class start_bootstrap_contact extends post {
		public static $snippet_meta = array('section_heading' => ['varchar', "Let's Get In Touch!"],
											'section_description' => ['text', "<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>"],
											'contact_icon_1' => ['icon', "fa-phone"],
											'contact_content_1' => ['varchar', "123-456-6789"],
											'contact_icon_for_email' => ['icon', "fa-envelope-o"],
											'contact_email' => ['email', "feedback@startbootstrap.com"],
											'contact_content_for_email' => ['varchar', "feedback@startbootstrap.com"]
											
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
			$html_structure = '<section id="contact">
							        <div class="container">
							            <div class="row">
							                <div class="col-lg-8 col-lg-offset-2 text-center">
							                    <h2 class="section-heading">' . $this->post_meta['section_heading'][1] .  '</h2>
							                    <hr class="primary">
							                    ' . $this->post_meta['section_description'][1] . '
							                </div>
							                <div class="col-lg-4 col-lg-offset-2 text-center">
							                    <i class="fa ' . $this->post_meta['contact_icon_1'][1] . ' fa-3x wow bounceIn"></i>
							                    <p>' . $this->post_meta['contact_content_1'][1] . '</p>
							                </div>
							                <div class="col-lg-4 text-center">
							                    <i class="fa ' . $this->post_meta['contact_icon_for_email'][1] . ' fa-3x wow bounceIn" data-wow-delay=".1s"></i>
							                    <p><a href="mailto:' . $this->post_meta['contact_email'][1] . '">' . $this->post_meta['contact_content_for_email'][1] . '</a></p>
							                </div>
							            </div>
							        </div>
							    </section>';
			return $html_structure;
		}
		
	}
	
?>