<?php
    function connect_db() {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("ERROR: " . mysqli_error());
        return $link;
    } 
    
    function underToUpper($str) {
    	$str = str_replace('_', ' ', $str);
    	$str = ucwords($str);
    	return $str;
    }
    
	function load_css() {
			$sql_link = 'SELECT * FROM `' . TABLE_PREFIX . 'links`;';
			$result_link = mysqli_query(connect_db(),$sql_link);
			$links = array();
			while($row_link = mysqli_fetch_assoc($result_link)) {
				$links[] = array('link_rel' => $row_link['link_rel'], 'link_type' => $row_link['link_type'], 'link_href' => $row_link['link_href']);
			}
			$css = '<style>';
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
?>