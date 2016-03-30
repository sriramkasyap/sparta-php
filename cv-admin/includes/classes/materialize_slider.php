<?php
	class materialize_slider extends post {
		public static $snippet_meta = array('slider_image_1'=> ['image', 'img/slide1.jpg'],
											'slide_alternate_text_1' => ['varchar','Materialize Slider'],
											'slider_image_2'=> ['image', 'img/slide2.jpg'],
											'slide_alternate_text_2' => ['varchar','Materialize Slider'],
											'slider_image_3'=> ['image', 'img/slide3.jpg'],
											'slide_alternate_text_3' => ['varchar','Materialize Slider'],
											'slider_image_4'=> ['image', 'img/slide4.jpg'],
											'slide_alternate_text_4' => ['varchar','Materialize Slider']
											
		);
		/* Begin Do Not Disturb */
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
		/* End Do Not Disturb */
		
		function create_structure(){
			$meta = $this->post_meta;
			$html_structure = '<div class="slider card">
						        <ul class="slides">
						            <li>
						                <img src="'.$meta['slider_image_1'][1].'" alt="'.$meta['slide_alternate_text_1'][1].'"/>
						            </li>
						            <li>
						                <img src="'.$meta['slider_image_2'][1].'" alt="'.$meta['slide_alternate_text_2'][1].'"/>
						            </li>
						            <li>
						                <img src="'.$meta['slider_image_3'][1].'" alt="'.$meta['slide_alternate_text_3'][1].'"/>
						            </li>
						            <li>
						                <img src="'.$meta['slider_image_4'][1].'" alt="'.$meta['slide_alternate_text_4'][1].'"/>
						            </li>
						        </ul><!--End Slides-->
						   <br><hr> </div><!--End Slider-->';
			return $html_structure;
		}
		
	}
	
?>