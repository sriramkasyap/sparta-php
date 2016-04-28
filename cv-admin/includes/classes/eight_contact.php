<?php
	class eight_contact extends post {
		public static $snippet_meta = array('contact_title' => ['varchar','contact us'],
											'contact_content' => ['text', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.'],

											'address' => ['varchar','250 Biscayne Blvd. (North) 11st Floor New Tower Miami, Florida 33148'],
											'number' => ['varchar','1-800-123-45678'],
											'email' => ['email','the8@gmail.com'],
											'fb_link' => ['url','#'],
											'twitter_link' => ['url','#'],
											'googlep_link' => ['url','#'],
											'linkedin_link' => ['url','#'],
											'pin_link' => ['url','#']
											
											
											
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
			$html_structure = '   <section class="page-section pb-0">
      <div class="container">
        <!-- section title-->
        <h2 class="title-section mt-0 mb-0 text-center">' . $meta['contact_title'][1] . '</h2>
        <!-- ! section title-->
        <div class="divider mt-20 mb-25"></div>
        <div class="mb-50 text-center">' . $meta['contact_content'][1] . '</div>
        <div class="row">';
			$html_structure .= '<div class="col-md-6 mb-md-50">
            <p>' . $meta['contact_content2'][1] . '</p>
            <hr>
            <address class="contact-address">
              <p><span>Address:</span> ' . $meta['address'][1] . '</p>
              <p><span>Phone number:</span> <a href="tel:' . $meta['number'][1] . '">' . $meta['number'][1] . '</a></p>
              <p><span>Email:</span>' . $meta['email'][1] . '</p>
            </address>
            <hr>
            <!-- social icons--><a href="' . $meta['fb_link'][1] . '" class="cws-social flaticon-facebook55"></a><a href="' . $meta['twitter_link'][1] . '" class="cws-social flaticon-twitter1"></a><a href="' . $meta['googlep_link'][1] . '" class="cws-social fa fa-google-plus"></a><a href="' . $meta['linkedin_link'][1] . '" class="cws-social flaticon-social-network106"></a><a href="' . $meta['pin_link'][1] . '" class="cws-social flaticon-pinterest3"></a>
            <!-- ! social icons-->
          </div>';
			
			$html_structure .= '<div class="col-md-6">
            <div class="widget-contact-form pb-0">
              <!-- contact-form-->
              <div id="feedback-form-errors" role="alert" class="alert alert-danger alt alert-dismissible fade in">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button><i class="alert-icon border flaticon-exclamation-mark1"></i><strong>Error Message!</strong><br>
                <div class="message"></div>
              </div>
              <div class="email_server_responce"></div>
              <form action="cv-admin/plugins/contact_process.php" method="post" class="form contact-form alt clearfix">
                <input type="text" name="name" value="" size="40" placeholder="Your Name" aria-invalid="false" aria-required="true" class="form-row form-row-first">
                <input type="text" name="email" value="" size="40" placeholder="Your Email" aria-required="true" class="form-row form-row-last">
                <textarea name="message" cols="40" rows="4" placeholder="Your Message" aria-invalid="false" aria-required="true"></textarea>
                <input type="submit" value="Send Message" class="cws-button border-radius pull-right">
              </form>
              <!-- /contact-form-->
            </div>
          </div> ';
		  $html_structure .= '</div>
      </div>
	  <div>
	  &nbsp;
	  </div>
      
    </section> ';
			return $html_structure;
		}
		
	}
	
?>