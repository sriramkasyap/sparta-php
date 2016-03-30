<?php
	class materialize_accrodion extends post {
		protected $repeatable_element = 'questions_and_answers';
		public static $snippet_meta = array('post_title' => ['varchar','Post Title'],
											'post_description' => ['text','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.'],
											'questions_and_answers' => ['repeatable', ['question' => ['varchar', 'What is your Question?'],
																						'answer' => ['text', '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>']]]					
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
			$html_structure = '<div id="page-title" class="row">
								<div class="col s9 m6 right">
									<div class="underline right blue"></div>
										<h3 class="cove-text right">' . $meta['post_title'][1] . '</h3>
								</div>
							</div><div class="divider"></div>';
			$html_structure .= '<div id="article"><div class="col s12 m12 reach white"><div class="container">'.$meta['post_description'][1].'</div></div></div>
								    <div class="row container">
								        <div id="contactForm" class="col s12">   
								          <ul class="collapsible" data-collapsible="accordion">';
			for($i=0;$i<count($repeater['question'][1]);$i++) {
				$html_structure .='<li>
						              <div class="collapsible-header"><i class="fa fa-right"></i>'.ucfirst($repeater['question'][1][$i]) .'</div>
						              <div class="collapsible-body justified">'.$repeater['answer'][1][$i] .'</div>
						            </li>';
			}
			$html_structure .= '</ul></div><br><hr></div>';
			return $html_structure;
		}
		
	}
	
?>