
<?php
// 	include '../cv-admin/includes/functions.php';
// 	include '../cv-admin/includes/site_config.php';
	$link = connect_db();
	$nav_items = array();
	$nav_items_result = mysqli_query($link,'SELECT * FROM `'.TABLE_PREFIX.'topnav`');
	$nav_items = mysqli_fetch_all($nav_items_result,MYSQLI_ASSOC);
// 	print_r($nav_items);
	function search_for_nav($parent_id,$nav_list) {
		$result_nav = array();
		foreach ($nav_list as $nav_item){
			if($nav_item['topnav_parent_id']==$parent_id) {
				$result_nav[] = $nav_item;
			}
		}
		if(!empty($result_nav)) {
			return $result_nav;
		}
		else {
			return false;
		}
		
	}
	
	function print_sub_menu($nav_sub_list,$nav_items, $level=1){
		$structure = '<ul class="mn-sub '.($level==2 ? 'to-left' : '').'">';
		foreach ($nav_sub_list as $subnav_item) {
			if(!search_for_nav($subnav_item['topnav_id'], $nav_items)) {
				$structure .= '<li id="nav-item-'.trim($subnav_item['topnav_link'],'/').'"><a href="'.trim($subnav_item['topnav_link'],'/').'">'.$subnav_item['topnav_name'].'</a></li>';
			}
			else {
				$structure .= '<li id="nav-item-'.trim($subnav_item['topnav_link'],'/').'"><a class="mn-has-sub" href="'.trim($subnav_item['topnav_link'],'/').'">'.$subnav_item['topnav_name'].'</a>';
				$structure .= print_sub_menu(search_for_nav($subnav_item['topnav_id'], $nav_items),$nav_items,2);
				$structure .= '</li>';
			}
			
		}
		$structure .= '</ul>';
		return $structure;
	}
// 	print_r(print_sub_menu(search_for_nav(16, $nav_items)));
	$main_menu_items = array();
	foreach ($nav_items as $nav_item){
		
		if($nav_item['topnav_parent_id']==0) {
			$main_menu_items[] = $nav_item;
		}
	}
// 	print_r($main_menu_items);
?>
<header>
      <!-- site top panel-->
      <!-- site top panel-->
      <div class="site-top-panel">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <!-- lang select wrapper-->
<!--               <div class="lang-wrap"><i class="icon-lang flaticon-earth-globe21"></i>Change your language -->
<!--                 <select name="billing_lang" class="lang-change"> -->
<!--                   <option value="">English</option> -->
<!--                   <option value="AX">Åland</option> -->
<!--                   <option value="AF">Afghanistan</option> -->
<!--                   <option value="AL">Albania</option> -->
<!--                   <option value="DZ">Algeria</option> -->
<!--                   <option value="AD">Andorra</option> -->
<!--                   <option value="AO">Angola</option> -->
<!--                   <option value="AI">Anguilla</option> -->
<!--                 </select> -->
<!--               </div> -->
              <!-- ! lang select wrapper-->
            </div>
            <div class="col-sm-6 text-right">
              <!-- social wrapper-->
              <div class="social-wrap">
              <?php 
              	$social_link_result = mysqli_query($link,"SELECT * FROM `".TABLE_PREFIX."top_panel`");
              	while ($social_link=mysqli_fetch_assoc($social_link_result)) {
              ?>
              	<a target="_blank" href="<?= $social_link['top_panel_link']?>" class="cws-social fa <?= $social_link['top_panel_icon']?>"></a>
              <?php }?>
              </div>
              <!-- ! social wrapper-->
            </div>
          </div>
        </div>
      </div>
      <!-- ! site top panel-->
      <!-- Navigation panel-->
      <nav class="main-nav js-stick">
        <div class="full-wrapper relative clearfix container">
          <!-- Logo ( * your text or image into link tag *)-->
          <div class="nav-logo-wrap local-scroll"><a href="index.html" class="logo"><img src="img/the8-logo.png" data-at2x="img/the8-logo@2x.png" alt><img src="img/the8-logo-sticky.png" data-at2x="img/the8-logo-sticky@2x.png" alt class="sticky-logo"></a></div>
          <!-- Main Menu-->
          <div class="inner-nav desktop-nav">
            <ul class="clearlist">
       		<?php 
       			foreach ($main_menu_items as $main_menu_item) {
       				$sub_menu = search_for_nav($main_menu_item['topnav_id'], $nav_items);
       				if(is_array($sub_menu)) {
       		?>
              <!-- Item With Sub-->
              <li><a href="<?= trim($main_menu_item['topnav_link'],'/') ?>" class="mn-has-sub"><?= $main_menu_item['topnav_name'] ?> <i class="fa fa-angle-down button_open"></i></a>
              <?php 
       					echo print_sub_menu($sub_menu,$nav_items);
       					echo '</li>';
       				}
       				else {
       			?>	
       				<li><a href="<?= trim($main_menu_item['topnav_link'],'/') ?>" ><?= $main_menu_item['topnav_name'] ?> </a></li>
       			<?php 
       				}
       			}
              ?>
              
              <!-- End Cart-->
              <!-- Search-->
<!--               <li class="search"><a href="#" class="mn-has-sub"><i class="flaticon-magnifying-glass34 search-icon"></i></a> -->
<!--                 <ul class="search-sub"> -->
<!--                   <li> -->
<!--                     <div class="container"> -->
<!--                       <div class="mn-wrap"> -->
<!--                         <form method="post" class="form"> -->
<!--                           <div class="search-wrap"> -->
<!--                             <input type="text" placeholder="Search . . ." class="form-control search-field"> -->
<!--                           </div> -->
<!--                         </form> -->
<!--                       </div> -->
<!--                       <div class="close-button flaticon-cancel30"></div> -->
<!--                     </div> -->
<!--                   </li> -->
<!--                 </ul> -->
<!--               </li> -->
              <!-- End Search-->
            </ul>
          </div>
          <!-- End Main Menu-->
        </div>
      </nav>
      <!-- End Navigation panel-->
    </header>