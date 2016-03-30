<?php
	class materialize_brands extends post {
		protected $repeatable_element = 'brand_card';
		public static $snippet_meta = array('section_heading' => ['varchar','Section Heading'],
											'brand_card' => ['repeatable', ['brand_logo' => ['varchar', 'img/bdat_logo.jpg'],
																		'brand_short_name' => ['varchar', 'Brand'],
																		'brand_long_name' => ['varchar', 'Brand Full Name'],
																		'brand_description' => ['text', 'Brand Description'],
																		'footer_link' => ['varchar', 'Link to Brand'],
																		'footer_link_text' => ['varchar', 'Link Text']]]					
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
			$html_structure = '<div class="row container">
						        <div class="s12">
						            <h5 class="center grey-text text-darken-3 section-header"> '.ucwords($meta['section_heading'][1]).' </h5>
						        </div>';
			for($i=0;$i<count($repeater['brand_logo'][1]);$i++) {
				$html_structure .='<div class="col s12 m6 l4">
						            <div class="card grey lighten-4">
						            	<div class="card-image waves-effect waves-block waves-light">
						                	<img class="activator" src="'.$repeater['brand_logo'][1][$i].'">
						                </div><!--End Card Image-->
						                <div class="card-content grey-text text-darken-2 center">
						                    <span class="card-title activator grey-text text-darken-3">'.ucwords($repeater['brand_short_name'][1][$i]).'<i class="material-icons right">more_vert</i></span>
						                </div><!--End Card Content-->
						                <div class="card-reveal grey-text text-darken-2 center">
						                    <span class="card-title grey-text text-darken-3">'.ucwords($repeater['brand_long_name'][1][$i]).'<i class="material-icons right">close</i></span>
						                    <div class="justified">'.ucfirst($repeater['brand_description'][1][$i]).'</div>
						                    <div class="card-action">
						                        <a href="'.$repeater['footer_link'][1][$i].'" target="_blank">'.$repeater['footer_link_text'][1][$i].'</a>
						                    </div><!--End Card Action-->
						                </div><!--End Card Reveal-->
						            </div><!--End Card-->
						        </div><!--End Column-->';
			}
			$html_structure .= '<br><hr></div><!--End Row Container-->';
			return $html_structure;
		}
		
	}
	
?>