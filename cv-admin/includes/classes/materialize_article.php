<?php
	class materialize_article extends post {
		public static $snippet_meta = array('post_title' => ['varchar','Lorem Ipsum'],
											'article_content' => ['text', '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>'],
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
			$html_structure = '<div id="page-title" class="row">
								<div class="col s9 m6 right">
									<div class="underline right blue"></div>
										<h3 class="cove-text right">' . $meta['post_title'][1] . '</h3>
									</div>
								</div>';
			$html_structure .= '<div id="article" class="grey lighten-5 "><!--Begin Article-->
							        <div class="container">
							            <div  id="article-content "><!--Begin Article Content-->';
			$html_structure .= $meta['article_content'][1];
			$html_structure .= ' </div><!--End Article Content-->
						        </div><!--End Container-->
						    </div><br><hr><!--End Article-->';
			return $html_structure;
		}
		
	}
	
?>