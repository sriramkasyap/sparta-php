<?php
	class eight_team extends post {
		protected $repeatable_element = 'team';
		public static $snippet_meta = array('team_title'=> ['varchar','Meet our Team'],
		                                     'team_content'=> ['text','Curabitur at lacus ac velit ornare lobortis. Curabitur a '],
		                                  
		                            'team'=>['repeatable',[ 'team_image' => ['image','pic/team/3.jpg'],
											'name' => ['varchar','Joshua Doe'],
											'Designation' => ['varchar','Developer'],
											 'Description' => ['text','pretium turpis et arcu. Duis arcu tortor,'],
											 'fb_link' => ['url','#'],
                                             'twitter_link' => ['url','#'],
											 'google_plus_link' => ['url','#'],	
											 'linked_link' => ['url','#'],
											 'pin_link' => ['url','#']]]
											
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
			$html_structure = ' <section class="page-section">
      <div class="container">
        <h2 class="title-section mb-0 mt-0 text-center"> <span>' . $meta['team_title'][1] . '</span></h2>
        <div class="divider mb-20 mt-25 gray"></div>
        <p class="text-center mb-50"> ' . $meta['team_content'][1] . '</p>
        <div class="row cws-multi-col"> ';
			for($i=0;$i<count($repeater['team_image'][1]);$i++){
				
			$html_structure .=' <div class="col-md-3 col-sm-6 mb-md-30">
            <!-- profile item-->
            <div class="profile-item">
              <div class="pic"><img src="'.$repeater['team_image'][1][$i].'" data-at2x="'.$repeater['team_image'][1][$i].'" alt>
                <div class="hover-effect"></div>
                <div class="links"><a href="'.$repeater['team_image'][1][$i].'" class="link-icon flaticon-magnifying-glass84 fancy"></div>
              </div>
              <div class="profile-info">
                <h3 class="profile-name">'.$repeater['name'][1][$i].'<span class="special"> / '.$repeater['Designation'][1][$i].'</span></h3>
                <div class="divider"></div>
                <p>'.$repeater['Description'][1][$i].'</p>
                <div class="social-link"><a href="'.$repeater['fb_link'][1][$i].'" class="cws-social flaticon-facebook55"></a><a href="'.$repeater['twitter_link'][1][$i].'" class="cws-social flaticon-twitter1"></a><a href="'.$repeater['google_plus_link'][1][$i].'" class="cws-social fa fa-google-plus"></a><a href="'.$repeater['linked_link'][1][$i].'" class="cws-social flaticon-social-network106"></a><a href="'.$repeater['pin_link'][1][$i].'" class="cws-social flaticon-pinterest3"></a></div>
              </div>
            </div>
            <!-- ! profile item-->
          </div> ';} 
       
        $html_structure .= '</div>
      </div>
    </section>';
			return $html_structure;
		}
		
	}
	
?>