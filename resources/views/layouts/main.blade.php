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

    <link rel="shortcut icon" href="/img/favicon.png">
    @show

</head>
<body>


@section('side_nav_right')
    <div class="side-nav-panel-right">
        <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
            <li class="profil">
                <img src="img/profile.jpg" alt="">
                <h2>John Doe</h2>
            </li>
            <li><a href="setting.html"><i class="fa fa-cog"></i>Settings</a></li>
            <li><a href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
            <li><a href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
            @if($_SERVER['uid'])
                <li><a href="/user/logout"><i class="fa fa-sign-in"></i>退出</a></li>
            @else
                <li><a href="/user/login"><i class="fa fa-sign-in"></i>登录</a></li>
                <li><a href="/user/reg"><i class="fa fa-user-plus"></i>注册</a></li>
            @endif

        </ul>
    </div>
@show


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
@show

</body>
</html>
