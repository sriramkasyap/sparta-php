<?php
	class the_eight_footer extends post {
		public static $snippet_meta = array('widget_title1' => ['varchar','Lorem Ipsum'],
											'content1' => ['text', '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>'],
											'widget_title2' => ['varchar','Lorem Ipsum'],
											'widget_image_link' => ['varchar','#'],
											'widget_image' => ['image','pic/footer/2.jpg'],
											'widget_image2' => ['image','pic/footer/2%402x.jpg'],
											'content2' => ['text', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.'],
											'widget_title3' => ['varchar','Lorem Ipsum'],
											'content3' => ['text', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.'],
											'copyright' => ['varchar','Copyrights ©2016: The8 - Premium Multipurpose WordPress Theme'],
											'fb_link' => ['varchar','#'],
											'twitter_link' => ['varchar','#'],
											'googlep_link' => ['varchar','#'],
											'linked_link' => ['varchar','#'],
											'pin_link' => ['varchar','#']
											
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
			$html_structure = '<div class="col-md-4 col-sm-6 mb-md-50">
            <div class="widget-footer text">
              <h3>' . $meta['widget_title1'][1] . '</h3>
              <div class="divider"></div>
              <p>' . $meta['content1'][1] . '</p>
              
            </div>
          </div>
		  <div class="col-md-4 col-sm-6 mb-md-50">
            <div class="widget-footer">
              <h3> ' . $meta['widget_title2'][1] . ' </h3>
              <div class="divider"></div>
              <div class="recent-item clearfix"><a href="' . $meta['widget_image_link'][1] . '"><img src="' . $meta['widget_image'][1] . '" data-at2x="' . $meta['widget_image2'][1] . '" alt></a>
                
               ' . $meta['content2'][1] . ' 
              
            </div>
          </div>';
			
			
			$html_structure .= '<div class="col-md-4 col-sm-6">
            <div class="widget-footer">
              <h3> ' . $meta['widget_title3'][1] . '</h3>
              <div class="divider"></div>
              <address>
                ' . $meta['content3'][1] . '
              </address>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="container">
          <div class="row">
            <div class="col-sm-8">
              <p>' . $meta['copyright'][1] . '</p>
            </div>
            <div class="col-sm-4 text-right"><a href=" ' . $meta['fb_link'][1] . '" class="cws-social flaticon-facebook55"></a><a href=" ' . $meta['twitter_link'][1] . '" class="cws-social flaticon-twitter1"></a><a href=" ' . $meta['googlep_link'][1] . '" class="cws-social fa fa-google-plus"></a><a href="' . $meta['linked_link'][1] . '" class="cws-social flaticon-social-network106"></a><a href=" ' . $meta['pin_link'][1] . '" class="cws-social flaticon-pinterest3"></a></div>
          </div>
        </div>
      </div>
    </footer>';
			return $html_structure;
		}
		
	}
	
?>