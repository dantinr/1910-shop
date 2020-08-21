<!DOCTYPE html>
<html>
<head>
    @section('header')
    <meta charset="UTF-8">
    <title>Mstore - Online Shop Mobile Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">

    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.css">
    <link rel="stylesheet" href="/css/owl.transitions.css">
    <link rel="stylesheet" href="/css/fakeLoader.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.css">


        <link rel="shortcut icon" href="/img/favicon.png">
    @show

</head>
<body>

@section('navbar_top')
    <div class="navbar-top">
        <!-- site brand	 -->
        <div class="site-brand">
            <a href="/"><h1>商城</h1></a>
        </div>
        <!-- end site brand	 -->
        <div class="side-nav-panel-right">
            <a href="#" data-activates="slide-out-right" class="side-nav-left"><i class="fa fa-user"></i></a>
        </div>
    </div>
@show


@section('side_nav_right')
    <div class="side-nav-panel-right">
        <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
            <li class="profil">
                <img src="img/profile.jpg" alt="">
                @if($_SERVER['uid'])
                    <h2>{{$_SERVER['user_name']}}</h2>
                    @else
                    <h2>未登录</h2>
                @endif

            </li>
            <li><a href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
            <li><a href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
            @if($_SERVER['uid'])
                <li><a href="/user/center"><i class="fa fa-cog"></i>个人中心</a></li>
                <li><a href="http://passport.1910.com/web/logout?redirect={{$_SERVER['current_url']}}"><i class="fa fa-sign-in"></i>退出</a></li>
            @else
                <li><a href="http://passport.1910.com/web/login?redirect={{$_SERVER['current_url']}}"><i class="fa fa-sign-in"></i>登录</a></li>
                <li><a href="http://passport.1910.com/web/reg?redirect={{$_SERVER['current_url']}}"><i class="fa fa-user-plus"></i>注册</a></li>
            @endif


        </ul>
    </div>
@show


<!-- navbar bottom -->
@section('navbar_bottom')
    <div class="navbar-bottom">
        <div class="row">
            <div class="col s2">
                <a href="/"><i class="fa fa-home"></i></a>
            </div>
            <div class="col s2">
                <a href="/wishlist"><i class="fa fa-heart"></i></a>
            </div>
            <div class="col s4">
                <div class="bar-center">
                    <a href="/cart/index"><i class="fa fa-shopping-basket"></i></a>
                    @if(\App\Model\CartModel::cartNum()>0)
                        <span id="cart_num">{{\App\Model\CartModel::cartNum()}}</span>
                    @endif
                </div>
            </div>
            <div class="col s2">
                <a href="contact.html"><i class="fa fa-envelope-o"></i></a>
            </div>
            <div class="col s2">
                <a href="#animatedModal2" id="nav-menu"><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </div>
@show
<!-- end navbar bottom -->

@section('body')




@show


@section('footerjs')
<!-- scripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/js.cookie-2.2.1.min.js"></script>
<script src="/js/init.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/fakeLoader.min.js"></script>
<script src="/js/animatedModal.min.js"></script>
<script src="/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.js"></script>
@show

</body>
</html>
