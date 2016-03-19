<?php
	$page['title'] = 'Configuration';
	$page['heading'] = 'Site Configuration';
	include 'includes/functions.php';
	include 'includes/site_config.php';
	include 'includes/header.php';
?>
<body>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'includes/nav.php'; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?= $page['heading'] ?></h1>
                    </div>
                </div>
                <?php 
                	if(isset($_POST['submit'])){
                		unset($_POST['submit']);
                		$sql_configf="";
                		foreach ($_POST as $config_name => $config_value) {
                			$sql_configf .="UPDATE `".TABLE_PREFIX."config` SET `config_content`='".addslashes($config_value)."' WHERE `config_name` ='".$config_name."';\n";
                		}
                		//echo $sql_configf;
                		if(mysqli_multi_query(connect_db(), $sql_configf)) {
                			echo success_message('Site Configuration has been Successfully Updated');
                		}
                		else {
                			echo warning_message('Query Unsuccessful'. mysqli_error(connect_db()));
                		}
                		for($i=0;$i<1000000;$i++) {}
                	}
                ?>
                <div class="row">
                    <div class="col-md-8 col-md-push-2">
                    	<div class="panel panel-primary">
	                    	<div class="panel-heading">
	                    		Configuration Parameters
	                    	</div>
	                    	<div class="panel-body">
		                    	<form id="config_form" action="" method="post">
		                    			<?php 
		                    				$result_configur = mysqli_query(connect_db(), "SELECT * FROM `" . TABLE_PREFIX . "config`");
		                    				while ($row_configur = mysqli_fetch_assoc($result_configur)) {
		                    					echo '<div class="form-group"><label for="'.$row_configur['config_name'].'">'.underToUpper($row_configur['config_name']).'</label><input name="'.$row_configur['config_name'].'" id="'.$row_configur['config_name'].'" class="form-control" value="'.$row_configur['config_content'].'"/></div>';
		                    				}
		                    			?>
		                    		<button class="btn btn-cv" name="submit" id="submit" type="submit">Submit</button>
		                    	</form>
	                    	</div>
                    	</div>
                  	</div>
                </div>
            </div>
       	</div>
    </div>
<?php include 'includes/footer.php'; ?>