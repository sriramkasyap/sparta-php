<?php
	class owl_slider extends post {
		protected $repeatable_element = 'slider_items';
		public static $snippet_meta = array('section_header' => ['varchar','Section Header'],
											'item_height' => ['number','288'],
											'item_width' => ['number','200'],
											'slider_items' => ['repeatable', ['item_name' => ['varchar', 'Name of Item'],
																				'item_image' => ['image', 'img/logo.png']]]					
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
							    <div class="container divider grey "></div>
						        <div class="s12">
						            <h5 class="center grey-text text-darken-3 section-header"> '.$meta['section_header'][1].' </h5>
						        </div>
						        <div class="owl-carousel">';
			for($i=0;$i<count($repeater['item_name'][1]);$i++) {
				$html_structure .='<div class="">
					                <div class="card z-depth-0 partner">
					                    <div class="card-image">
					                        <img class="responsive-img" title="'.$repeater['item_name'][1][$i].'" height="'.$meta['item_height'][1].'px" width="'.$meta['item_width'][1].'px" alt="'.$repeater['item_name'][1][$i].'" src="'.$repeater['item_image'][1][$i].'"/>
					                    </div>
					                </div><!--End Card-->
					             </div><!--End Column-->';
			}
			$html_structure .= '</div><br><hr>
						    </div><!--End Row Container-->';
			return $html_structure;
		}
		
	}
	
?>