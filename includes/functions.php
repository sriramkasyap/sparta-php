<?php
    function connect_db() {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("ERROR: " . mysqli_error());
        return $link;
    }

    function load_css() {
			 // Fetch links from site_links table
                $sql_link = 'SELECT * FROM `' . TABLE_PREFIX . 'links`;';
                $result_link = mysqli_query(connect_db(),$sql_link);
                $links = array();
                while($row_link = mysqli_fetch_assoc($result_link)) {
                    $links[] = array('link_rel' => $row_link['link_rel'], 'link_type' => $row_link['link_type'], 'link_href' => $row_link['link_href']);
                }
        
                foreach($links as $link) {

                    echo '<link rel="' . $link['link_rel'] . '" href="' . $link['link_href'] . '" type="' . $link['link_type']  . '">';
                 } 
		}
?>