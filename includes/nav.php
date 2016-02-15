<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top"><?= TITLE ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
               <?php 
                    $sql_topnav = 'SELECT `topnav_id`, `topnav_url`, `topnav_name`, `topnav_pos` FROM `' . TABLE_PREFIX . 'topnav` ORDER BY `topnav_pos` ASC';
                    $result_topnav = mysqli_query(connect_db(), $sql_topnav);
                    while($row_topnav = mysqli_fetch_assoc($result_topnav)) {
                ?>
                <li>
                    <a class="page-scroll" href="<?= $row_topnav['topnav_url'] ?>"><?= $row_topnav['topnav_name'] ?></a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>