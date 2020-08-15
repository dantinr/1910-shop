@extends('layouts.main')

@section('header')
    @parent
    <meta http-equiv="refresh" content="3;url={{$redirect}}">

@endsection
@section('body')

    <!-- navbar top -->
    <div class="navbar-top">
        <!-- site brand	 -->
        <div class="site-brand">
            <a href="index.html"><h1>Mstore</h1></a>
        </div>
        <!-- end site brand	 -->
        <div class="side-nav-panel-right">
            <a href="#" data-activates="slide-out-right" class="side-nav-left"><i class="fa fa-user"></i></a>
        </div>
    </div>
    <!-- end navbar top -->

    <!-- side nav right-->
    <div class="side-nav-panel-right">
        <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
            <li class="profil">
                <img src="/img/profile.jpg" alt="">
                <h2>John Doe</h2>
            </li>
            <li><a href="setting.html"><i class="fa fa-cog"></i>Settings</a></li>
            <li><a href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
            <li><a href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
            <li><a href="login.html"><i class="fa fa-sign-in"></i>Login</a></li>
            <li><a href="register.html"><i class="fa fa-user-plus"></i>Register</a></li>
        </ul>
    </div>
    <!-- end side nav right-->


    <!-- cart -->
    <div class="cart section">
        <div class="container">
            <div class="pages-head">
                <h3>{{$msg}}</h3>
            </div>
        </div>
    </div>
    <!-- end cart -->


    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="about-us-foot">
                <h6>Mstore</h6>
                <p>is a lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit.</p>
            </div>
            <div class="social-media">
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-google"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
                <a href=""><i class="fa fa-instagram"></i></a>
            </div>
            <div class="copyright">
                <span>© 2017 All Right Reserved</span>
            </div>
        </div>
    </div>
    <!-- end footer -->
@endsection

@section('footerjs')
    @parent
@endsection
