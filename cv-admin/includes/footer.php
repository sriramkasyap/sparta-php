 <!-- jQuery -->
<!--    <script src="bower_components/jquery/dist/jquery.min.js"></script>-->

    <script>
        var head = document.getElementsByTagName('head')[0];
        var js = document.createElement("script");

        js.type = "text/javascript";

        if (!window.jQuery)
        {
            js.src = "bower_components/jquery/dist/jquery.min.js";
        }

        head.appendChild(js);
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <!-- Morris Charts JavaScript -->
<!--
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>
-->
<!--    <script src="js/morris-data.js"></script>-->

</body>

</html>