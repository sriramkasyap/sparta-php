<?php
	class eight_awesome_content extends post {
		public static $snippet_meta = array('post_title' => ['varchar','The Eight Is Awesome'],
											'article_content' => ['text', '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>'],
											'description1' => ['varchar','Branding'],
											'value1' => ['varchar','60'],
											'description2' => ['varchar','Branding'],
											'value2' => ['varchar','60'],
											'description3' => ['varchar','Branding'],
											'value3' => ['varchar','60'],
											'description4' => ['varchar','Branding'],
											'value4' => ['varchar','60'],
											'post_image' => ['image','pic/items-2.png'],
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
			$html_structure = '	<section class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-md-50">
            <!-- section title-->
            <h2 class="title-section mb-0 mt-0">' . $meta['post_title'][1] . '</h2>
            <!-- ! section title-->
            <div class="divider gray mb-20 mt-25 left"></div>
            <p class="mb-25"> ' . $meta['article_content'][1] . '</p> ';
			
			$html_structure .= '<div class="skill-bar st-color-2">
              <div class="name">' . $meta['description1'][1] . '<span class="skill-bar-perc"></span></div>
              <div class="bar"><span data-value=' . $meta['value1'][1] . ' class="cp-bg-color skill-bar-progress"></span></div>
            </div>
            <!-- ! skill bar item-->
            <!-- skill bar item-->
            <div class="skill-bar st-color-4">
              <div class="name">' . $meta['description2'][1] . '<span class="skill-bar-perc"></span></div>
              <div class="bar"><span data-value="' . $meta['value2'][1] . '" class="cp-bg-color skill-bar-progress"></span></div>
            </div>
            <!-- ! skill bar item-->
            <!-- skill bar item-->
            <div class="skill-bar">
              <div class="name">' . $meta['description3'][1] . '<span class="skill-bar-perc"></span></div>
              <div class="bar"><span data-value="' . $meta['value3'][1] . '" class="cp-bg-color skill-bar-progress"></span></div>
            </div>
            <!-- ! skill bar item-->
            <!-- skill bar item-->
            <div class="skill-bar st-color-3">
              <div class="name">' . $meta['description4'][1] . '<span class="skill-bar-perc"></span></div>
              <div class="bar"><span data-value="' . $meta['value4'][1] . '" class="cp-bg-color skill-bar-progress"></span></div>
            </div> ';
		 $html_structure .= '           </div>
          <div class="col-md-6"><img src=' . $meta['post_image'][1] . ' alt></div>
        </div>
      </div>
    </section>';
			return $html_structure;
		}
		
	}
	
?>