<?php
	class eight_pricing_table extends post {
		protected $repeatable_element = 'pricing_table';
		public static $snippet_meta = array('table_title' => ['varchar','pricing table'],
		                                    'table_content' => ['text','Curabitur at lacus ac velit ornare lobortis.'],
		'slide'=>['repeatable',[ 'header' => ['varchar','basic'],
											'price' => ['varchar','6'],
											'date' => ['varchar','monthly'],
											'listicon_style1' => ['varchar','list-icon flaticon-social-network156'],
											'list1' => ['varchar','1 user account'],
											'listicon_style2' => ['varchar','list-icon flaticon-lights7'],
											'list2' => ['varchar','15 Projects'],
											'listicon_style3' => ['varchar','list-icon flaticon-floppy20'],
											'list3' => ['varchar','3 Gb Storage'],
											'listicon_style4' => ['varchar','list-icon flaticon-arrow164'],
											'list4' => ['varchar','100 Files Upload'],
											'listicon_style5' => ['varchar','list-icon flaticon-clocks18'],
											'list5' => ['varchar','3h Assistance'],
											'list_link' => ['varchar','#']
											]]
											
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
			$html_structure = '<section class="page-section">
      <div class="container">
        <!-- section title-->
        <h2 class="title-section mt-0 mb-0 text-center">' . $meta['table_title'][1] . '</h2>
        <!-- ! section title-->
        <div class="divider mt-20 mb-25"></div>
        <p class="mb-50 text-center">' . $meta['table_content'][1] . '</p>
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="row cws-multi-col">';
			for($i=0;$i<count($repeater['header'][1]);$i++){
				
			$html_structure .=' <div class="col-md-4 col-sm-6 mb-md-30">
                <article class="pricing-tables">
                  <div class="header-pt">
                    <h3>'.$repeater['header'][1][$i].'</h3>
                  </div>
                  <div class="price-pt"><sup>$</sup>'.$repeater['price'][1][$i].'<sub>'.$repeater['date'][1][$i].'</sub></div>
                  <ul class="pricing-list">
                    <li> <i class="'.$repeater['listicon_style1'][1][$i].'"></i>'.$repeater['list1'][1][$i].'</li>
                    <li> <i class="'.$repeater['listicon_style2'][1][$i].'"></i>'.$repeater['list2'][1][$i].'</li>
                    <li> <i class="'.$repeater['listicon_style3'][1][$i].'"></i>'.$repeater['list3'][1][$i].'</li>
                    <li> <i class="'.$repeater['listicon_style4'][1][$i].'"></i>'.$repeater['list4'][1][$i].'</li>
                    <li> <i class="'.$repeater['listicon_style5'][1][$i].'"></i>'.$repeater['list5'][1][$i].'</li>
                  </ul><a href="'.$repeater['list_link'][1][$i].'" class="cws-button small">Try It Now</a>
                </article>
              </div>';} 
       
        $html_structure .= '</ul>
      </div>
    </div>';
			return $html_structure;
		}
		
	}
	
?>