<?php
      
    $sql_script = 'SELECT * FROM `site_scripts`;';
    $result_script = mysqli_query($link, $sql_script);
    $scripts = array();
    while($row_script = mysqli_fetch_assoc($result_script)) {
        $scripts[] = array('script_type' => $row_script['script_type'], 'script_src' => $row_script['script_src']);
    }
?>
   <?php
        foreach($scripts as $script) {
    ?>
    <script type="<?= $script['script_type'] ?>" src="<?= $script['script_src'] ?>"></script>
    <?php } ?>
</html>