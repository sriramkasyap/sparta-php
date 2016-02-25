
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <link rel="stylesheet" href="dist/css/magnific-popup.css">

    <!-- Magnific Popup core JS file -->
    <script src="dist/js/jquery.magnific-popup.js"></script>
    <script src="js/jquery.scoped.js"></script>
    <script type="text/javascript" src="bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js"></script>
    <script type="text/javascript" src="bootstrap-iconpicker/js/bootstrap-iconpicker.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $('.simple-ajax-popup').magnificPopup({
                type: 'ajax',
                overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
            });
            $.scoped();
        });
       
        $(function() {
            $('.panel-image img.panel-image-preview').on('click', function(e) {
        	    $(this).closest('.panel-image').toggleClass('hide-panel-body');
            });
        });
        $('.iconpicker').iconpicker();
        
    </script>
</body>

</html>