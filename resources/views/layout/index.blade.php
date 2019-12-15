<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <base href="{{asset('')}}"/>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{  asset('css/app.css') }}">
    <link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="assets/dest/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="assets/dest/rs-plugin/css/responsive.css">
    <link rel="stylesheet" title="style" href="assets/dest/css/style.css">
    <link rel="stylesheet" href="assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
</head>
<body>
    @include("layout.header")
    @yield("content")
    @include("layout.footer")
    <script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="{{  asset('js/app.js') }}"></script>
    <script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
    <script src="assets/dest/vendors/animo/Animo.js"></script>
    <script src="assets/dest/vendors/dug/dug.js"></script>
    <script src="assets/dest/js/scripts.min.js"></script>
    <script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="assets/dest/js/waypoints.min.js"></script>
    <script src="assets/dest/js/wow.min.js"></script>
    <!--customjs-->
    <script src="assets/dest/js/custom2.js"></script>
    <script src="assets/dest/js/index.js"></script>
    <script>
        $(document).ready(function($) {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 150) {
                    $(".header-bottom").addClass('fixNav')
                } else {
                    $(".header-bottom").removeClass('fixNav')
                }
            });
            $("#o").click(function(){
                $("#info").hide();
                $("#order").show();
            });
            $("#i").click(function(){
                $("#info").show();
                $("#order").hide();;
            });
            $("#anh1").click(function(){
                $("#anhchinh").attr("src",$("#anh1").attr("src"));
            });
            $("#anh2").click(function(){
                $("#anhchinh").attr("src",$("#anh2").attr("src"));
            });
            $("#anh3").click(function(){
                $("#anhchinh").attr("src",$("#anh3").attr("src"));
            });
            $("#review").click(function(){
                if($("#tab").css("display")=="none")  $("#tab").css("display","block");
                else  $("#tab").css("display","none");
            });  
        });         
    </script>
</body>
</html>
