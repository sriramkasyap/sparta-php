<?php
	class the_eight_about extends post {
		protected $repeatable_element = 'about';
		public static $snippet_meta = array('about'=>['repeatable',[ 'tab1' => ['text','lorem psefuf fdfydjhfs skeurehftedh'],
											'accordian1' => ['text','lorem psefuf fdfydjhfs skeu'],
											
											'text' => ['text','Creative, Multipurpose WordPress Theme']]],
											'about_image' => ['image','http://localhost/t8_cms/pic/items-1.png'],
											'about_title' => ['varchar','About'],
											'about_content' => ['text','Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique.'],
											'learnmore_link' => ['varchar','#'],
											'link2' => ['varchar','#'],
											
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
			$html_structure = '<div class="row">
          <div class="col-md-6 mb-md-50"><img src=' . $meta['about_image'][1] . ' alt class="fix-img-2 mt-20"></div>
          <div class="col-md-6">
            <!-- section title-->
            <h2 class="title-section mt-0 mb-0"> <span> ' . $meta['about_title'][1] . '</span></h2>
            <!-- ! section title-->
            <div class="divider left mt-20 mb-25"></div>
            <p class="mb-25"> ' . $meta['about_content'][1] . ' </p> ';
			
			for($i=0;$i<count($repeater['tab1'][1]);$i++){
				
			$html_structure .='<div class="toggle mb-40">
              <div class="content-title active"> <i class="flaticon-arrow487 toggle-icon"></i><span class="active"><i class="flaticon-lights7"></i>'.$repeater['tab1'][1][$i].'</span></div>
              <div style="display: block" class="content">'.$repeater['accordian1'][1][$i].'</div>';} 
       
        $html_structure .= '<a href=' . $meta['learnmore_link'][1] . ' class="cws-button">Learn More</a><a href=' . $meta['link2'][1] . ' class="cws-button alt">Buy Theme</a>
          </div>
        </div>';
			return $html_structure;
		}
		
	}
	
?>