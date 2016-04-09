<?php 
	abstract class post {
		protected $post_id;
		public $uporin;
		public $post_url;
		public $post_heading;
		public $post_meta;
		public $post_content;
		public $page_id;
		public $user_id;
		public $post_pos;
		public $post_on_every_page;
		public static $snippet_id;
		public static $snippet_class;
		public static $snippet_name;
		public static $snippet_meta;
		public static $snippet_preview_img;
		public function __construct() {
			$this->set_snippet_data();
			$a = func_get_args();
			$i = func_num_args();
			if (method_exists($this,$f='__construct'.$i)) {
				call_user_func_array(array($this,$f),$a);
			}
			else {
				$result = mysqli_query(connect_db(), 'SELECT max(`post_id`) FROM `' . TABLE_PREFIX . 'posts`;');
				$row = mysqli_fetch_array($result);
				//echo $row[0];
				$this->post_id = $row[0] + 1;
				$this->uporin = 'in';
				$this->post_meta = static::$snippet_meta;
				$this->user_id = 1;
				$this->post_url = '#';
				$this->post_on_every_page = false;
			}
		}
		
		public function __construct1($fetch_id) {
			static ::$snippet_class = get_class($this);
			static ::set_snippet_data();
			$result_post = mysqli_query(connect_db(), 'SELECT * FROM `' . TABLE_PREFIX . 'posts` WHERE `post_id` = ' . $fetch_id . ';');
			$result_postmeta = mysqli_query(connect_db(), 'SELECT * FROM `' . TABLE_PREFIX . 'postmeta` WHERE `post_id` = ' . $fetch_id . ';');
			$row_post = mysqli_fetch_array($result_post);
			//print_r ($row);
			$this->post_id = $row_post['post_id'];
			$this->page_id = $row_post['page_id'];
			$this->post_url = $row_post['post_url'];
			$this->post_heading = $row_post['post_heading'];
			$this->post_pos = $row_post['post_pos'];
			$this->post_content = $row_post['post_content'];
			$this->post_on_every_page = $row_post['post_on_every_page'];
			$post_meta = static::$snippet_meta;
			while ($row_postmeta = mysqli_fetch_array($result_postmeta)){
				if(isset($post_meta[$row_postmeta['postmeta_tag']])) {
					$post_meta[$row_postmeta['postmeta_tag']][1] = $row_postmeta['postmeta_value'];
				}
				else {
					$post_meta[$this->repeatable_element][1][$row_postmeta['postmeta_tag']][1] = $row_postmeta['postmeta_value'];
				}
			}
			$this->post_meta = $post_meta;
			//print_r ($this->post_meta);
			$this->uporin = 'up';
// 			$this->printer();
		}
		
		public function publish_post() {
// 			print $this->uporin;
			if($this->uporin == 'in') {
				$this->set_snippet_data();
				$sql = "INSERT INTO `" . TABLE_PREFIX . "posts` (`post_id`, `page_id`, `post_url`, `user_id`, `post_heading`, `post_pos`, `post_content`, `snippet_id`, `post_on_every_page`, `post_date`) VALUES ('" . $this->post_id . "', '" . $this->page_id . "', '" . $this->post_url . "', '" . $this->user_id . "', '" . $this->post_heading . "', '" . $this->post_pos . "', '" . $this->post_content . "', '" . static::$snippet_id . "', '".$this->post_on_every_page."', NOW());";
				//echo '<xmp>' . $sql . '</xmp><br/><br/>';
				if(mysqli_query(connect_db(),$sql)) {
					echo success_message('Your Post "' . $this->post_heading . '" has been successfully published.');
					echo "<div class='btn-group' role='group'><a href='posts.php?task=view' class='btn btn-success'>Back to Posts</a><a href='posts.php?task=add' class='btn btn-info'>Add One more Post</a></div>";
				}
				else {
					echo warning_message('Pubish Failed. Please Try Again. <xmp>' . $sql . '</xmp>');
					
				}
				
				if($this->publish_meta()) {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				$this->set_snippet_data();
				$sql = "UPDATE `" . TABLE_PREFIX . "posts` SET `page_id` = '" . $this->page_id . "', `post_url` = '" . $this->post_url . "', `post_heading` = '" . $this->post_heading . "', `post_pos` ='" . $this->post_pos . "', `post_content` ='" . $this->post_content . "', `snippet_id` ='" . static::$snippet_id . "' WHERE `post_id` ='" . $this->post_id . "';";
// 				echo $sql;
				if(mysqli_query(connect_db(),$sql)) {
// 					echo success_message('Query Sucessful');

					echo success_message('Your Post "' . $this->post_heading . '" has been successfully published.');
					echo "<div class='btn-group' role='group'><a href='posts.php?task=view' class='btn btn-success'>Back to Posts</a><a href='posts.php?task=add' class='btn btn-info'>Add One more Post</a></div>";
					$this->delete_meta();
					if($this->publish_meta()) {
						return true;
					}
					else {
						return false;
					}
				}
				else {
					echo warning_message('Query Failed. Please Try Again');
				}
			}
			
		}
		
		protected function publish_meta() {
			$done = array();
			$i=0;
			foreach ($this->post_meta as $key => $value){
				if(is_array($value[1])){
					// 						$value[1] = $value[1][0];
					
					foreach($value[1] as $value_key=>$value_array) {
//  						print_r($value[1]); echo $k.'<br>';
						
						for($k=0;$k<count($value_array);$k++){
							$sql = "INSERT INTO `" . TABLE_PREFIX . "postmeta`(`post_id`, `snippet_id`, `postmeta_tag`, `postmeta_type`, `postmeta_value`, `postmeta_pos`) VALUES ('" . $this->post_id . "', '" . static::$snippet_id . "', '" . $value_key . "', '" . $value_array[0] . "', '" . $value_array[1][$k]. "', '" . $i . "');";
	// 						echo $sql."<br/>";
							
							$done[] = mysqli_query(connect_db(), $sql);
						}
					}
 					
				}
				else {
					$sql = "INSERT INTO `" . TABLE_PREFIX . "postmeta`(`post_id`, `snippet_id`, `postmeta_tag`, `postmeta_type`, `postmeta_value`, `postmeta_pos`) VALUES ('" . $this->post_id . "', '" . static::$snippet_id . "', '" . $key . "', '" . $value[0] . "', '" . $value[1]. "', '" . $i . "');";
					$done[] = mysqli_query(connect_db(), $sql);
				}
				
				$i++;
				//echo '<xmp>' . $sql . '</xmp><br/><br/>';
			}
			if(!in_array(false, $done)) {
				return true;
			}
			else {
				return false;
			}
		}
			
		function printer() {
			print_r($this);
			echo '<br/>';
			print static::$snippet_class . "<br>";
			print static::$snippet_name . "<br>";
			print static::$snippet_id . "<br>";
			print_r (static::$snippet_meta);
			echo '<br>' . static::$snippet_preview_img;
		}
	
		function set_snippet_data() {
			static::$snippet_class = get_class($this);
			$result = mysqli_query(connect_db(), "SELECT `snippet_id`,`snippet_name`, `snippet_display_name`, `snippet_preview_img` FROM `" . TABLE_PREFIX . "snippets` WHERE `snippet_name` = '" . static ::$snippet_class . "'");
			$row = mysqli_fetch_assoc($result);
			//print_r ($row);
			static::$snippet_id = $row['snippet_id'];
			static::$snippet_name = $row['snippet_display_name'];
			static::$snippet_preview_img = $row['snippet_preview_img'];
		}
		
		abstract public function create_structure();
			
		public function create_form($task) {	
			$result_pages=mysqli_query(connect_db(), "SELECT `page_id`, `page_title` FROM `" . TABLE_PREFIX . "pages`");
			while ($row_pages=mysqli_fetch_assoc($result_pages)){
				$pages_assoc[$row_pages['page_id']] = $row_pages['page_title'];
			}
			$image_present = False;
			foreach ($this->post_meta as $meta_element) {
				if(in_array('image',$meta_element)) {
					$image_present = True;
				}
			}
			if($image_present) {
				$new_form = new FormBuilder(['snippet.php?task=submit_post','post','multipart/form-data']);
			}
			else {
				$new_form = new FormBuilder(['snippet.php?task=submit_post','post']);
			}
			$new_form->addObject(['varchar','post_heading','Post Heading', $this->post_heading],true);
			$new_form->addObject(['varchar','post_url','Post URL',$this->post_url],true);
			$new_form->addObject(['select','page_id','Page Name',$pages_assoc],true);
			$new_form->addObject(['number','post_pos','Post Position',$this->post_pos],true);
			$new_form->addObject(['bool','post_on_every_page',' To Be Displayed On Every Page',$this->post_on_every_page],true);
			foreach (static::$snippet_meta as $name => $typeplace){
				//echo $meta_key . ' => '  . $meta_value[1] . '<br>';
				//print_r($this->post_meta[$name][1]);
				$new_form->addObject([$typeplace[0], $name, underToUpper($name), $this->post_meta[$name][1]],true);
			}
			$new_form->addSubmit('Submit');
			echo $new_form->renderForm();
		}
		
		public function submit_form($user_sub){
//  			print_r($user_sub);
			if(isset($user_sub['submit'])){
				unset($user_sub['submit']);
			}
			$this->page_id = $user_sub['page_id'];
			$this->post_heading= addslashes ($user_sub['post_heading']);
			$this->post_url= addslashes ($user_sub['post_url']);
			$this->post_pos= addslashes ($user_sub['post_pos']);
			$this->post_on_every_page = ($user_sub['post_on_every_page']=='on' ? true : false);
			unset($user_sub['page_id']);
			unset($user_sub['post_heading']);
			unset($user_sub['post_url']);
			unset($user_sub['post_pos']);
			unset($user_sub['post_on_every_page']);
			$this->submit_meta($user_sub);
			$this->post_content = addslashes ($this->create_structure());
		}

		protected function submit_meta($user_sub_meta) {
			$post_meta = static::$snippet_meta;
			foreach ($user_sub_meta as $meta_key=>$meta_value){
				
				if(isset($post_meta[$meta_key])){
					if($post_meta[$meta_key][0]=='checkbox' || $post_meta[$meta_key][0]=='bool') {
						$post_meta[$meta_key][1] = ($meta_value=='on' ? true : false);
					}
					else {
						$post_meta[$meta_key][1] = $meta_value;
					}
				}
				else {
					if($post_meta[$this->repeatable_element][1][$meta_key][0]=='checkbox' || $post_meta[$this->repeatable_element][1][$meta_key][0]=='bool') {
						$post_meta[$this->repeatable_element][1][$meta_key][1] = ($meta_value=='on' ? true : false);
					}
					else {
						$post_meta[$this->repeatable_element][1][$meta_key][1] = $meta_value;
					}
					
				}
			}
// 			print_r($post_meta[$this->repeatable_element]);
			$this->post_meta = $post_meta;
// 			print_r($this->post_meta);
		}
	
		public function preview() {
			$preview_structure = '<div>';
			//$preview_structure .= static::load_css();
			$preview_structure .= stripslashes($this->post_content);
			$preview_structure .= '</div>';
			echo $preview_structure;
		}
		
		public static function load_css() {
			$sql_link = 'SELECT * FROM `' . TABLE_PREFIX . 'links`;';
			$result_link = mysqli_query(connect_db(),$sql_link);
			$links = array();
			while($row_link = mysqli_fetch_assoc($result_link)) {
				$links[] = array('link_rel' => $row_link['link_rel'], 'link_type' => $row_link['link_type'], 'link_href' => $row_link['link_href']);
			}
			$css = '<style scoped>';
			foreach($links as $link) {
				if($link['link_href'][0]=='h') {
					$css .= '@import "' . $link['link_href'] . '";';
				}
				else {
					$css .= '@import "' . ABS_PATH . $link['link_href'] . '";';
				}
				
			}
			$css .='</style>';
			return $css;
		}
	
		public static function demo_view() {
			$result_content = mysqli_query(connect_db(), 'SELECT * FROM `' . TABLE_PREFIX . 'snippets`;');
			$preview_structure = '<div class="row">';
			while($row_content = mysqli_fetch_assoc($result_content)) {
				$preview_structure .= '<div class="col-sm-4">
			                    		<div class="panel panel-default">
							                <div class="panel-heading">
							                    <h3 class="panel-title">' . $row_content["snippet_display_name"] . '</h3>
							                </div>
							                <div class="panel-image hide-panel-body">
							                    <img src="img/snippets/' . $row_content["snippet_preview_img"] . '" class="panel-image-preview" />
							                </div>
							                <div class="panel-body">
							                    <h4>' . $row_content["snippet_display_name"] . '</h4>
							                    <p>' . $row_content["snippet_description"] . '</p>
							                    <small><span class="fa fa-tag"></span> ' . ucwords($row_content["snippet_tags"]) . '</small>
							                </div>
							                <div class="panel-footer text-center">
							                    <a title="Preview" class="simple-ajax-popup" href="snippet.php?task=preview&sid=' . $row_content["snippet_id"] . '"><span class="snip fa fa-eye"></span> Preview</a>
							                    <a title="Select Layout" class="snippet-task" href="#" data-task="new" data-sid="' . $row_content["snippet_id"] . '"><span class="snip fa fa-pencil"></span> Select Layout</a>
							                </div>
							            </div>
			                    		
			                    	</div>';
			}
			$preview_structure .= '</div>';
			return $preview_structure;
		}
	
		public function delete() {
			
			$query_post = 'INSERT INTO `'.TABLE_PREFIX.'posts_trash` SELECT * FROM `'.TABLE_PREFIX.'posts` WHERE `post_id` = '.$this->post_id;
			mysqli_query(connect_db(), $query_post);
			$query_post = 'INSERT INTO `'.TABLE_PREFIX.'postmeta_trash` SELECT * FROM `'.TABLE_PREFIX.'postmeta` WHERE `post_id` = '.$this->post_id;
			mysqli_query(connect_db(), $query_post);
			$query_post = 'DELETE FROM `'.TABLE_PREFIX.'posts` WHERE `post_id` = '.$this->post_id;
			mysqli_query(connect_db(), $query_post);
			$this->delete_meta();
			echo success_message("Post ".$this->post_heading." has been successsfully Deleted");
			echo "<a href='posts.php?task=view' class='btn btn-success'>Back to Posts</a>";
		}
		
		protected function delete_meta() {

			
			$query_post = 'DELETE FROM `'.TABLE_PREFIX.'postmeta` WHERE `post_id` = '.$this->post_id;
			mysqli_query(connect_db(), $query_post);
		}
	}
?>


