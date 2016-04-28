<?php
	class the_eight_features extends post {
		public static $snippet_meta = array('post_title' => ['varchar','Features'],
											'feature_content' => ['text', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>'],
											'feature1' => ['varchar','clean'],
											'feature_content1' => ['text','Lorem ipsum dolor sit amet, consectetuer adip iscing elit, enean commodo'],
											'feature2' => ['varchar','clean'],
											'feature_content2' => ['text','Lorem ipsum dolor sit amet, consectetuer adip iscing elit, enean commodo'],
											'feature3' => ['varchar','clean'],
											'feature_content3' => ['text','Lorem ipsum dolor sit amet, consectetuer adip iscing elit, enean commodo'],
											'feature4' => ['varchar','clean'],
											'feature_content4' => ['text','Lorem ipsum dolor sit amet, consectetuer adip iscing elit, enean commodo'],
											'feature5' => ['varchar','clean'],
											'feature_content5' => ['text','Lorem ipsum dolor sit amet, consectetuer adip iscing elit, enean commodo'],
											'feature6' => ['varchar','clean'],
											'feature_content6' => ['text','Lorem ipsum dolor sit amet, consectetuer adip iscing elit, enean commodo'],
											'feature_image' => ['image','http://localhost/t8_cms/pic/woman-blue.jpg'],
											
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
			$html_structure = '<div class="col-md-10 col-md-offset-1">
            <!-- title section-->
            <h2 class="title-section text-center mt-0 mb-0"> <span>' . $meta['post_title'][1] . '</span></h2>
            <!-- ! title section-->
            <div class="divider gray mt-20 mb-25"></div>
            <p class="text-center mb-40">' . $meta['feature_content'][1] . ' </p>
          </div>';
		  
			$html_structure .= '<div class="row flex-box">
          <div class="col-md-4 mb-md-50">
            <!-- service item-->
            <div class="service-item icon-right mb-50"><i class="flaticon-pencils13 cws-icon type-3"></i>
              <h3> ' . $meta['feature1'][1] . '</h3>
              <p> ' . $meta['feature_content1'][1] . ' <a href="#">See More !</a></p>
            </div>
            <!-- ! service item-->
            <!-- service item-->
            <div class="service-item icon-right mb-50"><i class="flaticon-cogwheels10 cws-icon type-3 color-5"></i>
              <h3>' . $meta['feature2'][1] . '</h3>
              <p>' . $meta['feature_content2'][1] . ' <a href="#" class="color-5">Learn More !</a></p>
            </div>
            <!-- ! service item-->
            <!-- service item-->
            <div class="service-item icon-right"><i class="flaticon-smartphones23 cws-icon type-3 color-4"></i>
              <h3>' . $meta['feature3'][1] . '</h3>
              <p> ' . $meta['feature_content3'][1] . ' <a href="#" class="color-4">Read !</a></p>
            </div>
            <!-- ! service item-->
          </div>
          <div class="col-md-4 mb-md-170 flex-item-end"><img src=' . $meta['feature_image'][1] . ' alt class="mb-minus-140"></div>
          <div class="col-md-4">
            <!-- service item-->
            <div class="service-item icon-left mb-50"><i class="flaticon-shopping-carts6 cws-icon type-3 color-3"></i>
              <h3> ' . $meta['feature4'][1] . '</h3>
              <p>' . $meta['feature_content4'][1] . ' <a href="#" class="color-3">See Now !</a></p>
            </div>
            <!-- ! service item-->
            <!-- service item-->
            <div class="service-item icon-left mb-50"><i class="flaticon-mug16 cws-icon type-3 color-2"></i>
              <h3>' . $meta['feature5'][1] . '</h3>
              <p>' . $meta['feature_content5'][1] . ' <a href="#" class="color-2">See More !</a></p>
            </div>
            <!-- ! service item-->
            <!-- service item-->
            <div class="service-item icon-left"><i class="flaticon-profile5 cws-icon type-3 color-6"></i>
              <h3>' . $meta['feature6'][1] . '</h3>
              <p>' . $meta['feature_content6'][1] . ' <a href="#" class="color-6">Try It !</a></p>
            </div>
            <!-- ! service item-->
          </div>
        </div>';
			
			return $html_structure;
		}
		
	}
	
?>