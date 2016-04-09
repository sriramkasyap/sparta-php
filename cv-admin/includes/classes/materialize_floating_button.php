<?php
	class materialize_floating_button extends post {
		protected $repeatable_element = 'sub_buttons';
		public static $snippet_meta = array('top_button' => ['bool', true],
											'sub_buttons' => ['repeatable', ['button_link' => ['text', '#'],
																				'button_tooltip_text' => ['varchar', 'Tooltip Text'],
																				'button_icon' =>['icon', 'fa-facebook']]]
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
			$html_structure = '<div>
					            <div class="fixed-action-btn hide-on-small-only">
					        	    <a href="#" class="btn-floating btn-large red"><i class="material-icons">language</i></a>
					                <ul>';
			for($i=0;$i<count($repeater['button_link'][1]);$i++) {
				$html_structure .='<li><a target="_blank" href="'.$repeater['button_link'][1][$i].'" class="btn-floating waves-effect waves-light tooltipped" data-position="left" data-tooltip="'.$repeater['button_tooltip_text'][1][$i].'" data-delay="10"><i class="fa '.$repeater['button_icon'][1][$i].'"></i></a></li>';
			}
			$html_structure .='</ul></div>';
			if($meta['top_button'][1]){
				$html_structure .= '<a data-position="top" data-tooltip="Go to Top of the page" data-delay="10" href="#top" class="btn-floating waves-effect waves-light btn-large blue darken-4 corner-stone topper tooltipped"><i class="material-icons">keyboard_capslock</i></a>';
			}
			$html_structure .='</div>';
			return $html_structure;
		}
		
	}
	
?>