<?php
	class start_bootstrap_portfolio extends post {
		public static $snippet_meta = array('project_image_1' => ['varchar', 'img/portfolio/1.jpg'],
											'category_name_1' => ['varchar', 'Category'],
											'project_name_1' => ['varchar','Project Name'],
											'project_image_2' => ['varchar', 'img/portfolio/2.jpg'],
											'category_name_2' => ['varchar', 'Category'],
											'project_name_2' => ['varchar','Project Name'],
											'project_image_3' => ['varchar', 'img/portfolio/3.jpg'],
											'category_name_3' => ['varchar', 'Category'],
											'project_name_3' => ['varchar','Project Name'],
											'project_image_4' => ['varchar', 'img/portfolio/4.jpg'],
											'category_name_4' => ['varchar', 'Category'],
											'project_name_4' => ['varchar','Project Name'],
											'project_image_5' => ['varchar', 'img/portfolio/5.jpg'],
											'category_name_5' => ['varchar', 'Category'],
											'project_name_5' => ['varchar','Project Name'],
											'project_image_6' => ['varchar', 'img/portfolio/6.jpg'],
											'category_name_6' => ['varchar', 'Category'],
											'project_name_6' => ['varchar','Project Name']
											
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
			$html_structure = '<section class="no-padding" id="portfolio">
					        <div class="container-fluid">
					            <div class="row no-gutter">
					                <div class="col-lg-4 col-sm-6">
					                    <a href="#" class="portfolio-box">
					                        <img src="' . $this->post_meta['project_image_1'][1] .  '" class="img-responsive" alt="">
					                        <div class="portfolio-box-caption">
					                            <div class="portfolio-box-caption-content">
					                                <div class="project-category text-faded">
					                                    ' . $this->post_meta['category_name_1'][1] .  '
					                                </div>
					                                <div class="project-name">
					                                    ' . $this->post_meta['project_name_1'][1] . '
					                                </div>
					                            </div>
					                        </div>
					                    </a>
					                </div>
					                <div class="col-lg-4 col-sm-6">
					                    <a href="#" class="portfolio-box">
					                        <img src="' . $this->post_meta['project_image_2'][1] .  '" class="img-responsive" alt="">
					                        <div class="portfolio-box-caption">
					                            <div class="portfolio-box-caption-content">
					                                <div class="project-category text-faded">
					                                    ' . $this->post_meta['category_name_2'][1] .  '
					                                </div>
					                                <div class="project-name">
					                                    ' . $this->post_meta['project_name_2'][1] . '
					                                </div>
					                            </div>
					                        </div>
					                    </a>
					                </div>
					                <div class="col-lg-4 col-sm-6">
					                    <a href="#" class="portfolio-box">
					                        <img src="' . $this->post_meta['project_image_3'][1] .  '" class="img-responsive" alt="">
					                        <div class="portfolio-box-caption">
					                            <div class="portfolio-box-caption-content">
					                                <div class="project-category text-faded">
					                                    ' . $this->post_meta['category_name_3'][1] .  '
					                                </div>
					                                <div class="project-name">
					                                    ' . $this->post_meta['project_name_3'][1] . '
					                                </div>
					                            </div>
					                        </div>
					                    </a>
					                </div>
					                <div class="col-lg-4 col-sm-6">
					                    <a href="#" class="portfolio-box">
					                        <img src="' . $this->post_meta['project_image_4'][1] .  '" class="img-responsive" alt="">
					                        <div class="portfolio-box-caption">
					                            <div class="portfolio-box-caption-content">
					                                <div class="project-category text-faded">
					                                    ' . $this->post_meta['category_name_4'][1] .  '
					                                </div>
					                                <div class="project-name">
					                                    ' . $this->post_meta['project_name_4'][1] . '
					                                </div>
					                            </div>
					                        </div>
					                    </a>
					                </div>
					                <div class="col-lg-4 col-sm-6">
					                    <a href="#" class="portfolio-box">
					                        <img src="' . $this->post_meta['project_image_5'][1] .  '" class="img-responsive" alt="">
					                        <div class="portfolio-box-caption">
					                            <div class="portfolio-box-caption-content">
					                                <div class="project-category text-faded">
					                                    ' . $this->post_meta['category_name_5'][1] .  '
					                                </div>
					                                <div class="project-name">
					                                    ' . $this->post_meta['project_name_5'][1] . '
					                                </div>
					                            </div>
					                        </div>
					                    </a>
					                </div>
					                <div class="col-lg-4 col-sm-6">
					                    <a href="#" class="portfolio-box">
					                        <img src="' . $this->post_meta['project_image_6'][1] .  '" class="img-responsive" alt="">
					                        <div class="portfolio-box-caption">
					                            <div class="portfolio-box-caption-content">
					                                <div class="project-category text-faded">
					                                    ' . $this->post_meta['category_name_6'][1] .  '
					                                </div>
					                                <div class="project-name">
					                                    ' . $this->post_meta['project_name_6'][1] . '
					                                </div>
					                            </div>
					                        </div>
					                    </a>
					                </div>
					            </div>
					        </div>
					    </section>';
			return $html_structure;
		}
		
	}
	
?>