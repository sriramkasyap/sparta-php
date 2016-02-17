 <!-- jQuery -->
<!--    <script src="bower_components/jquery/dist/jquery.min.js"></script>-->
    
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <link rel="stylesheet" href="dist/css/magnific-popup.css">

    <!-- Magnific Popup core JS file -->
    <script src="dist/js/jquery.magnific-popup.js"></script>
    <script>
        $(document).ready(function() {

            $('.simple-ajax-popup').magnificPopup({
                type: 'ajax',
                overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
            });
        });
    </script>  
</body>

</html>