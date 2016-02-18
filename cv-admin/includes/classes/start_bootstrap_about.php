<?php
	class start_bootstrap_about extends post {
		public static $snippet_meta = array('section_heading' => ['varchar', 'We\'ve got what you need!'],
											'section_description' => ['text','Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!

GET STARTED!
													'],
											'button_link' => ['varchar', '#about'],
											'button_text' => ['varchar', 'Find Out More']
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
			$html_structure = '<section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">' . $this->post_meta['section_heading'][1] . '</h2>
                    <hr class="light">
                    <p class="text-faded">' . $this->post_meta['section_description'][1] . '</p>
                    <a href="' . $this->post_meta['button_link'][1] . '" class="btn btn-default btn-xl">' . $this->post_meta['button_text'][1] . '</a>
                </div>
            </div>
        </div>
    </section>';
			return $html_structure;
		}
		
	}
	
?>