<?php 
	abstract class post {
		protected $post_id;
		protected $uporin;
		public $post_url;
		public $post_heading;
		public $post_meta;
		public $post_content;
		public $page_id;
		public $post_pos;
		public static $snippet_id;
		public static $snippet_class;
		public static $snippet_name;
		public static $snippet_meta;
		
		public function __construct() {
			static::$snippet_class = get_class($this);
			static::set_snippet_id();
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
			}
		}
		
		public function __construct1($fetch_id) {
			static ::$snippet_class = get_class($this);
			static ::set_snippet_id();
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
			$this->post_meta = array();
			while ($row_postmeta = mysqli_fetch_array($result_postmeta)){
				$this->post_meta[$row_postmeta['postmeta_tag']] = array($row_postmeta['postmeta_type'], $row_postmeta['postmeta_value']);
			}
			//print_r ($this->post_meta);
			$this->uporin = 'up';
		}
		
		public function publish_post() {
			$structure = $this->create_structure();
			if($this->uporin == 'in') {
				$sql = "INSERT INTO `" . TABLE_PREFIX . "posts` (`post_id`, `page_id`, `post_url`, `post_heading`, `post_pos`, `post_content`, `snippet_id`) VALUES ('" . $this->post_id . "', '" . $this->page_id . "', '" . $this->post_url . "', '" . $this->post_heading . "', '" . $this->post_pos . "', '" . $this->post_content . "', '" . static::$snippet_id . "';";
				echo $sql;
				$i=0;
				foreach ($this->post_meta as $key => $value){
					$sql = "INSERT INTO `" . TABLE_PREFIX . "postmeta`(`post_id`, `snippet_id`, `postmeta_tag`, `postmeta_type`, `postmeta_value`, `postmeta_pos`) VALUES ('" . $this->post_id . "', '" . static::$snippet_id . "', '" . $key . "', '" . $value[0] . "', '" . $value[1]. "', '" . $i . "';";
					$i++;
					echo $sql;
				}
			}
			else {
				$sql = "UPDATE `" . TABLE_PREFIX . "posts` SET `page_id` = '" . $this->page_id . "', `post_url` = '" . $this->post_url . "', `post_heading` = '" . $this->post_heading . "', `post_pos` ='" . $this->post_pos . "', `post_content` ='" . $structure . "', `snippet_id` ='" . static::$snippet_id . "' WHERE `post_id` ='" . $this->post_id . "';";
				//echo $sql;
				if(mysqli_query(connect_db(),$sql)) {
					echo 'Query Sucessful';
				}
				else {
					echo 'query Failed. Please Try Again';
				}
			}
		}
			
		function printer() {
			print_r($this);
			print static::$snippet_class . "<br>";
			print static::$snippet_name . "<br>";
			print static::$snippet_id . "<br>";
		}
	
		private static function set_snippet_id() {
			$result = mysqli_query(connect_db(), "SELECT `snippet_id`,`snippet_name`, `snippet_display_name` FROM `" . TABLE_PREFIX . "snippets` WHERE `snippet_name` = '" . static ::$snippet_class . "'");
			$row = mysqli_fetch_assoc($result);
			//print_r ($row);
			static::$snippet_id = $row['snippet_id'];
			static::$snippet_name = $row['snippet_display_name'];
		}
		
		abstract public function create_structure();
	}
?>