<?php
	class start_bootstrap_services extends post {
		public static $snippet_meta = array('section_heading' => ['varchar', 'At Your Service'],
											'icon_1' => ['icon', 'diamond'],
											'sub_head_1' => ['varchar','Sturdy Templates'],
											'sub_description_1' => ['text','Our templates are updated regularly so they don\'t break.'],
											'icon_2' => ['icon', 'paper-plane'],
											'sub_head_2' => ['varchar','Ready to Ship'],
											'sub_description_2' => ['text','You can use this theme as is, or you can make changes!'],
											'icon_3' => ['icon', 'newspaper-o'],
											'sub_head_3' => ['varchar','Up to Date'],
											'sub_description_3' => ['text','We update dependencies to keep things fresh.'],
											'icon_4' => ['icon', 'heart'],
											'sub_head_4' => ['varchar','Made with Love'],
											'sub_description_4' => ['text','You have to make your websites with love these days!'],
											
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
			$html_structure = '<section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">' . $this->post_meta['section_heading'][1] .  '</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-' . $this->post_meta['icon_1'][1] .  ' wow bounceIn text-primary"></i>
                        <h3>' . $this->post_meta['sub_head_1'][1] .  '</h3>
                        <p class="text-muted">' . $this->post_meta['sub_description_1'][1] .  '</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-' . $this->post_meta['icon_2'][1] .  ' wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>' . $this->post_meta['sub_head_2'][1] .  '</h3>
                        <p class="text-muted">' . $this->post_meta['sub_description_2'][1] .  '</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-' . $this->post_meta['icon_3'][1] .  ' wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>' . $this->post_meta['sub_head_3'][1] .  '</h3>
                        <p class="text-muted">' . $this->post_meta['sub_description_3'][1] .  '</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-' . $this->post_meta['icon_4'][1] .  ' wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>' . $this->post_meta['sub_head_4'][1] .  '</h3>
                        <p class="text-muted">' . $this->post_meta['sub_description_4'][1] .  '</p>
                    </div>
                </div>
            </div>
        </div>
    </section>';
			return $html_structure;
		}
		
	}
	
?>