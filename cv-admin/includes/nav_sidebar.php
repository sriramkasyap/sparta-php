<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
            </li>
            <?php 
                $link = connect_db('cv_cms');
                $all_sidebar_query = "SELECT * FROM `admin_sidenav_items` ORDER BY `sidenav_pos` ASC";
                $sidebar_result = mysqli_query($link, $all_sidebar_query);
                while($sidebar_row = mysqli_fetch_assoc($sidebar_result)) {
                    if(!$sidebar_row['sidenav_has_dropdown']) {
            ?>
            <li>
                <a href="<?= $sidebar_row['sidenav_url'] ?>"> <i class="fa <?= $sidebar_row['sidenav_icon'] ?> fa-fw"></i><?= "  " . ucwords($sidebar_row['sidenav_name']) ?></a>
            </li>
            <?php
                    }
                    else {      
            ?>

            <li>
                <a href="<?= $sidebar_row['sidenav_url'] ?>"><i class="fa <?= $sidebar_row['sidenav_icon'] ?> fa-fw"></i><?= "  " .  ucwords($sidebar_row['sidenav_name']) ?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
            <?php 
                        $items_raw = $sidebar_row['sidenav_dropdown_items'];
                        $items_list = explode(";", $items_raw);
                        foreach($items_list as $item_element) {
                            $item = explode(",", $item_element);
                            //echo $item[0]. "<br/>" . $item[1]. "<br/>" ;
            ?>
                    <li>
                        <a href="<?= $item[1] ?>"><?= "  " . ucwords($item[0]) ?></a>
                    </li>     
            <?php
                        }
            ?>
                   </ul>
                 
            </li>
            <?php
                    } 
                }
            ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>




