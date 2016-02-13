<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
        <a class="navbar-brand" href="index.php">
	        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="30px" viewBox="0 18 360 180" enable-background="new 0 18 360 180" xml:space="preserve">
				<g id="XMLID_1_">
			    	<path fill="#ffffff" d="M343.794,30.823l-86.573,160.956l-43.529,0.02l-56.582-90.553c-18.276-27.076-25.138-45.853-62.157-45.023C65.742,56.9,41.936,79.92,41.936,109.12c0,29.189,23.336,52.93,52.525,52.93c0,0,20.006,3.232,38.024-11.008l17.811,26.907c0,0-29.976,17.812-62.201,15.507c-50.2-3.625-81.278-34.551-81.278-84.303c0-49.741,40.442-86.414,90.183-86.414c0,0,43.523-0.448,64.75,28.75l75.874,114.344L308.5,30.813L343.794,30.823z"/>
				</g>
			</svg>
		</a>
        
        
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <?php include 'includes/nav_messages.php'; ?>
        <!-- /.dropdown -->
        <?php include 'includes/nav_tasks.php'; ?>
        <!-- /.dropdown -->
        <?php include 'includes/nav_notifications.php'; ?>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    
    <!-- /.navbar-top-links -->

    <?php include 'includes/nav_sidebar.php'; ?>
    <!-- /.navbar-static-side -->
</nav>