<?php
	class materialize_static_cards extends post {
		protected $repeatable_element = 'static_card';
		public static $snippet_meta = array('section_heading' => ['varchar','Section Heading'],
											'static_card' => ['repeatable', ['profile_name' => ['varchar', 'Profile Name'],
																		'profile_image' => ['image', 'img/logo.png'],
																		'profile_education' => ['varchar', 'Education'],
																		'profile_title' => ['varchar', 'Work Title']]]					
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
			$html_structure = ' <div id="profiles" class="container"><!--Begin Profile Container-->
						            <h4 class="section-header center">'.$meta['section_heading'][1].'</h4>';
			for($i=0;$i<count($repeater['profile_name'][1]);$i++) {
				if(($i+1)%4 == 0) {
					$html_structure .= "<div class='row'><!--Begin First row-->";
				}
				$html_structure .='<div class="col s12 m6 l3"><!--Begin Column 1-->
				                    <div class="card team-profile hoverable"><!--Begin Card-->
				                        <div class="card-image"><!--Begin Card Image-->
				                            <img src="'.$repeater['profile_image'][1][$i].'" alt="'.$repeater['profile_name'][1][$i].'" title="'.$repeater['profile_name'][1][$i].'"/>
				                            <span class="card-title">'.$repeater['profile_name'][1][$i].'</span>
				                        </div><!--End Card Image-->
				                        <div class="card-content"><!--Begin Card Content-->
				                            <span class="grey-text text-darken-4 profile-education">'.$repeater['profile_education'][1][$i].'</span><br/>
				                            <span class="profile-position">'.$repeater['profile_title'][1][$i].'</span><br/>
				                        </div><!--End Card Content-->
				                    </div><!--End Card-->
				                </div><!--End Column 1-->';
				if(($i+1)%4 == 0) {
					$html_structure .= "</div>";
				}
			}
			$html_structure .= '</div><!--End Limiting Container-->
							<br><hr>
							</div><!--End Profile Container-->';
			return $html_structure;
		}
		
	}
	
?>