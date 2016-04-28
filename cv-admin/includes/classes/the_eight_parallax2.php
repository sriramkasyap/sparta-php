<?php
	class the_eight_parallax2 extends post {
		protected $repeatable_element = 'parallax2';
		public static $snippet_meta = array( 'parallax_image' => ['image','pic/parallax-map.jpg'],
		'slide'=>['repeatable',[ 'parallax2' => ['flaticon','counter-icon flaticon-social-network156'],
										        'data_value' => ['varchar','1650'],
											   'counter_name' => ['varchar','users online']]]
											
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
			$html_structure = '<section class="page-section cws_prlx_section pt-70 pb-70 border-t border-b">
			<img src="' . $meta['parallax_image'][1] . '" alt class="cws_prlx_layer">
      <div class="container">
        <div class="row cws-multi-col">';
			for($i=0;$i<count($repeater['flaticon'][1]);$i++){
				
			$html_structure .=' <div class="col-sm-3 col-xs-6 mb-md-50">
                 <!-- counter block-->
            <div class="counter-block border-none white-t"><i class="'.$repeater['flaticon'][1][$i].'"></i>
              <div data-count="'.$repeater['data_value'][1][$i].'" class="counter">0</div>
              <div class="count-divider"></div>
              <div class="counter-name text-uppercase">'.$repeater['counter_name'][1][$i].'</div>
            </div>
            <!-- ! counter block-->
          </div>';} 
       
        $html_structure .= '</div>
      </div>
    </section>';
			return $html_structure;
		}
		
	}
	
?>