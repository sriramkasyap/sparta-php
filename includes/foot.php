<?php
    $sql_script = 'SELECT * FROM `' . TABLE_PREFIX . 'scripts`;';
    $result_script = mysqli_query(connect_db(), $sql_script);
    $scripts = array();
    while($row_script = mysqli_fetch_assoc($result_script)) {
        $scripts[] = array('script_type' => $row_script['script_type'], 'script_src' => $row_script['script_src']);
    }
?>
   <?php
        foreach($scripts as $script) {
    ?>
    <script type="<?= $script['script_type'] ?>" src="<?= (($script['script_src'][0]=='h') ? trim($script['script_src']) : trim(ABS_PATH . $script['script_src'])) ?>"></script>
    <?php } ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51362563-1', 'auto');
  ga('send', 'pageview');

</script>