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
    <script src="js/jquery.scoped.js"></script>
    <script>
        $(document).ready(function() {
            
            $('.simple-ajax-popup').magnificPopup({
                type: 'ajax',
                overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
            });
            $.scoped();
            
            $(document).ajaxStart(function(){
                $('#cv-post-content').html('');
                $("#wait").css("display", "block");
            });
            $(document).ajaxComplete(function(){
                $("#wait").css("display", "none");
            });
            $(".snippet-task").click(function(){
                var url = 'snippet.php?task=' + $(this).attr('data-task') + '&sid=' + $(this).attr('data-sid');
                $.get(url, function(data, status){
                        $('#cv-post-content').html(data);
                });
            });
        });
        $(function() {
            $('.panel-image img.panel-image-preview').on('click', function(e) {
        	    $(this).closest('.panel-image').toggleClass('hide-panel-body');
            });
        });
    </script>  
</body>

</html>