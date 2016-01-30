<?php
    include ('xcrud/xcrud.php');
    $xcrud = Xcrud::get_instance();
    $xcrud->table('test');
    $page['title'] = 'test xCRUD'; 
    include 'includes/header.php';
?>
<body class="container">
<?php
    echo $xcrud->render();
?>
</body>
</html>