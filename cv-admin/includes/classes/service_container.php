<?php
	class service_container extends post {
		protected $repeatable_element = 'container';
		public static $snippet_meta = array('container'=>['repeatable',[ 'title' => ['varchar','Research'],
                                             'text' => ['text','Lorem ipsum dolor sit amet'],
											'text2' => ['varchar','See More']]]
											
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
			$html_structure = '   <div class="tp-banner-container">
      <div class="tp-banner-slider">
        <ul> ';
			for($i=0;$i<count($repeater['title'][1]);$i++){
				
			$html_structure .=' <div class="col-md-4 service-center-icon white text-center">
              <!-- bg icon--><i class="cws-icon flaticon-lights7 mb-20"></i>
              <!-- ! bg icon-->
              <!-- title-->
              <h3 class="mt-0 mb-0">'.$repeater['title'][1][$i].'</h3>
              <!-- ! title-->
              <div class="divider mt-10 mb-5 gray-darknest mini"></div>
              <p class="mb-30">'.$repeater['text'][1][$i].'</p><a href="#" class="cws-button small">'.$repeater['text2'][1][$i].'</a>
            </div> ';} 
       
        $html_structure .= '</ul>
      </div>
    </div>';
			return $html_structure;
		}
		
	}
	
?>