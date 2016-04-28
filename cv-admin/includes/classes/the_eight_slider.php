<?php
	class the_eight_slider extends post {
		protected $repeatable_element = 'slide';
		public static $snippet_meta = array('slide'=>['repeatable',[ 'slider_image' => ['image','pic/slider/main/slide-1.jpg'],
											'slider_image' => ['image','pic/slider/main/slide-1.jpg'],
											'title' => ['varchar','MEET THE EIGHT'],
											'text' => ['text','Creative, Multipurpose WordPress Theme']]]
											
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
			for($i=0;$i<count($repeater['slider_image'][1]);$i++){
				
			$html_structure .='<li data-masterspeed="700" data-slotamount="7" data-transition="fade"><img src="rs-plugin/assets/loader.gif" data-bgfit="cover" data-bgposition="center 70%" data-lazyload="'.$repeater['slider_image'][1][$i].'" alt="" data-bgparallax="10">
            <div data-x="[\'left\',\'center\',\'center\',\'center\']" data-hoffset="0" data-y="center" data-voffset="-70%" data-width="[\'1170px\',\'700px\',\'500px\',\'300px\']" data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="400" class="tp-caption sl-content text-center"><img src="img/the8-logo-sticky%402x.png" data-at2x="img/the8-logo-sticky@2x.png" alt>
              <div class="sl-title text-white">'.$repeater['title'][1][$i].'</div>
              <p class="text-white"> '.$repeater['text'][1][$i].'</p><a href="#" class="cws-button white">Discover Now</a>
            </div>
			</li> ';} 
       
        $html_structure .= '</ul>
      </div>
    </div>';
			return $html_structure;
		}
		
	}
	
?>