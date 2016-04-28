<?php
	class the_eight_page_title extends post {
		protected $repeatable_element = 'breadcrumb';
		public static $snippet_meta = array('page_heading' => ['varchar','Page Title'],
											'breadcrumb' =>['repeatable', ['breadcrumb_link' => ['url', '#'],
																			'breadcrumb_name' => ['varchar', 'Home']]]
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
			$html_structure = '<section class="breadcrumbs">
							        <div class="container">
							          <div class="row">
							            <div class="col-sm-6"> 
							              <h1>'.$meta['page_heading'] .'</h1>
							            </div>
							            <div class="col-sm-6 text-right breadcrumbs-item">';
			for ($i=0;$i<count($repeater['breadcrumb_link'][1]);$i++){
				$html_structure .='<a href="'.$repeater['breadcrumb_link'][1].'">'.$repeater['breadcrumb_name'][1].'</a><i class="fa fa-angle-right"></i>';
			}
			$html_structure .='</div>
							          </div>
							        </div>
							      </section>';
			return $html_structure;
		}
		
	}
	
?>