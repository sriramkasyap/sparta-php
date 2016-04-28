<?php
	class eight_double_parallax extends post {
		protected $repeatable_element = 'double_parallax';
		public static $snippet_meta = array('double_parallax'=>['repeatable',[ 'parallax_image' => ['image','pic/parallax-1.jpg'],
											'parallax_title' => ['varchar','Best Theme Ever! Discover'],
											'parallax_content' => ['text','Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.']
                                     	'parallax_link' => ['varchar','#'],	
                                      'link_name' => ['varchar','contact us']										
											]]
											
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
			$html_structure = '     <div class="container-fluid">
                              <div class="row flex-box">';
			for($i=0;$i<count($repeater['parallax_image'][1]);$i++){
				
			$html_structure .='<div style="background-image: url('.$repeater['parallax_image'][1][$i].');" class="col-md-6 pt-140 pt-md-80 pb-md-80 pb-140 bg-section">
          <div class="row">
            <div class="col-md-8 half-section left">
              <!-- section title-->
              <h2 class="title-section mt-0 mb-0 text-white">'.$repeater['parallax_title'][1][$i].'</h2>
              <!-- ! section title-->
              <div class="divider left mt-20 mb-25 white"></div>
              <p class="mb-40 text-white"> '.$repeater['parallax_content'][1][$i].' </p><a href='.$repeater['parallax_link'][1][$i].' class="cws-button white">'.$repeater['link_name'][1][$i].'</a>
            </div>
          </div>
        </div> ';} 
       
        $html_structure .= '</div>
    </div>';
			return $html_structure;
		}
		
	}
	
?>