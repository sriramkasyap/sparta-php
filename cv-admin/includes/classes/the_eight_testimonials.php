<?php
	class the_eight_testimonials extends post {
		protected $repeatable_element = 'testimonial';
		public static $snippet_meta = array( 'bg_image' => ['image','pic/parallax-3.jpg'],
		                                      'title' => ['varchar','Testimonials'],
											'content' => ['text','Praesent nec nisl a purus blandit viverra.'],
		'testimonial'=>['repeatable',[ 'test_image' => ['image','pic/slider/main/slide-1.jpg'],
											'test_image1' => ['image','pic/slider/main/slide-1.jpg'],
											'name' => ['varchar','Matthew Doe'],
											'description' => ['text','Creative, Multipurpose WordPress Theme'],
											'test_link' => ['varchar','#']]]
											
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
			$html_structure = '<section class="page-section cws_prlx_section pt-120 pb-70"><img src="' . $meta['bg_image'][1] . '" alt class="cws_prlx_layer">
      <div class="overlay pattern"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <h2 class="title-section mb0 mt-0 text-center text-white">' . $meta['title'][1] . '</h2>
            <div class="divider mb-20 mt-25 white"></div>
            <p class="text-center text-white mb-40"> ' . $meta['content'][1] . '</p>
          </div>
        </div>
        <div class="carousel-container">
          <div class="row">
            <div class="owl-two-pag pagiation-carousel white">';
			for($i=0;$i<count($repeater['test_image'][1]);$i++){
				
			$html_structure .='<div class="comments">
                <div class="comment-list">
                  <div class="comment-container white clearfix">
                    <div class="author"><img src="'.$repeater['test_image'][1][$i].'" data-at2x="'.$repeater['test_image1'][1][$i].'" alt class="color-4">
                      <div class="author-name">'.$repeater['name'][1][$i].'</div>
                    </div>
                    <div class="comment-text">
                      <div class="description">
                        <p>'.$repeater['description'][1][$i].'</p>
                      </div><a href="'.$repeater['test_link'][1][$i].'" class="button-reply"><i class="flaticon-return13"></i></a>
                    </div>
                  </div>
                </div>
              </div> ';} 
       
        $html_structure .= '</div>
          </div>
        </div>
      </div>
    </section>';
			return $html_structure;
		}
		
	}
	
?>