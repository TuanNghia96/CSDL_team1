<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
    @include("layout.header")
    @yield("content")
    @include("layout.footer")
    <script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
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
    
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

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
                $("#order").hide();
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
            $("#dathang").click(function() {
                let price=Number($("span#total_price").text());
                if(price==0) {
                    $("a#kkk").attr("href","{{route('home')}}");
                    alert("Quý khách chưa chọn món đồ nào. Mời về trang chủ");
                }
                else alert("Rất hân hạnh được phục vụ quý khách, đơn hàng của quý khách sẽ được giao sớm nhất");
             });
            $("#submit").click(function(e){ 
                e.preventDefault();
                var user_id=Number($("#user").val());
                if(user_id==0) alert("Yêu cầu login"); 
            else{
                var email=$("#email").val();
                var id_product=$("#product").val();
                var url="/feedback";
                var _token=$("form[name='SetReview']").find("input[name='_token']").val()
                var txt=$("#text").val();
                $.ajax({
                    url:'/feedback',
                    type:"POST",
                    data:{
                        "_token":_token,
                        "user_id":user_id,
                        "feedback":txt,
                        "product_id":id_product
                    },
                    success:function(data){
                        $("strong#email").text(data);
                        $("p#rv").text(txt);
                    }
                });
                }
            });
           /*  $("a#mua").click(function(e){
                e.preventDefault();
                var product_id=$(this).parent().find("div").attr("data-id");
                $.ajax({
                    url:'/cart',
                    type:"POST",
                    data:{
                        "product_id":product_id
                    },
                    sussess: function(data){
                        alert("add to cart");
                    }
                });
                alert(product_id);
            }); */
           $("i#quantity").click(function(){
            var quantity=$(this).parent().find(".sl").val();
            var cart_id=$("input[name='cart_id']").val();
            var _token=$("input[name='_token']").val();
            var product_id=$(this).attr("data-id");
            $.ajax({
                url:'/updatecart',
                type: "POST",
                data:{
                    "_token":_token,
                    "product_id":product_id,
                    "cart_id":cart_id,
                    "quantity":quantity
                },
                success:function(Response){
                 $("span#total_price").text(Response);
                }
            }); 
           });
        });   
    </script>
</body>
</html>
