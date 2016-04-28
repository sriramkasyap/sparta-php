<?php
	class the_eight_parallax extends post {
		public static $snippet_meta = array('parallax_image' => ['image','/pic/1920x1080-img-1.jpg'],
		                                     'parallax_title' => ['varchar','Best Theme Ever! Discover'],
											'parallax_content' => ['text', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.'],
											'check_link' => ['varchar','#'],
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
			$html_structure = '  <section class="page-section cws_prlx_section pt-180 pb-180"><img src=' . $meta['parallax_image'][1] . ' alt class="cws_prlx_layer">
      <div class="overlay"></div>';
			
			$html_structure .= '<div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <h2 class="title-section mb0 mt-0 text-center text-white"> ' . $meta['parallax_title'][1] . '</h2>
            <div class="divider mb-20 mt-25 white"></div> ';
			
			$html_structure .= '<p class="text-center text-white mb-30">' . $meta['parallax_content'][1] . '</p>
            <div class="text-center"><a href=' . $meta['check_link'][1] . ' class="cws-button white">Check It</a></div> ';
		 
			$html_structure .= '</div>
           </div>
              </div>
                   </section> ';
				   			
			return $html_structure;
		}
		
	}
	
?>