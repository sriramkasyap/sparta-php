<?php
	class materialize_footer extends post {
		protected $repeatable_element = 'quick_links';
		public static $snippet_meta = array('footer_logo' => ['image','img/logo.png'],
											'column_heading_1' => ['varchar','Lorem Ipsum'],
											'column_content_1' => ['text','Lorem Ipsum Solom Dorum'],
											'column_heading_2' => ['varchar','Lorem Ipsum'],
											'column_content_2' => ['text','Lorem Ipsum Solom Dorum'],
											'copyright_text' => ['varchar','Copyright Saved'],
											'quick_links' => ['repeatable', ['link_url' => ['varchar', 'What is your Question?'],
																						'link_name' => ['varchar', 'Quick Link text']]]					
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
			$html_structure = '<footer class="page-footer transparent">
				            <div class="container">
				                <div class="spacer"></div>
				                <div id="footer-links" class="row">
				                    <div class="col hide-on-med-and-down l3">
				                        <img alt="'.$meta['image_alternate_text'][1].'" src="'.$meta['footer_logo'][1].'" class="responsive-img" width="150px" height="117px"/>
				                    </div>
				                    <div class="col s5 m5 l3">
				                        <h5 class="grey-text text-lighten-1">'.$meta['column_heading_1'][1].'</h5>
				                        <div class="grey-text text-lighten-1">'.$meta['column_content_1'][1].'</div>
				                    </div>
				                    <div class="col s5 m5 l3">
				                        <h5 class="grey-text text-lighten-1">'.$meta['column_heading_2'][1].'</h5>
				                        <div class="grey-text text-lighten-1">'.$meta['column_content_2'][1].'</div>
				                    </div>
				                    <div class="col s2 m2 l3">
				                        <h5 class="grey-text text-lighten-1">Quick Links</h5>
				                        <ul>';
			for($i=0;$i<count($repeater['link_url'][1]);$i++) {
				$html_structure .='<li><a class="grey-text text-lighten-1" href="'.$repeater['link_url'][1][$i].'">'.$repeater['link_name'][1][$i].'</li>';
			}
				$html_structure .='</ul>
				                    </div>
				                    
				                </div><!--Close Row-->
				            </div><!--Close Container-->
				            <div class="footer-copyright row">
				                <div class="col s11">
				                    <a class="left">'.$meta['copyright_text'][1].'</a>
				                </div>
				            </div>
				        </footer><!--Close Footer-->';
			return $html_structure;
		}
		
	}
	
?>