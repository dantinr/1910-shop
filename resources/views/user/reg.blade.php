@extends('layouts.main')

@section('header')
    @parent
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
    @section('side_nav_right')
        @parent
    @endsection
    <!-- end side nav right-->

    <!-- register -->
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>注册</h3>
            </div>
            <div class="register">
                <div class="row">
                    <form class="col s12" action="/user/reg" method="post">
                        {{csrf_field()}}
                        <div class="input-field">
                            <input type="text" name="user_name" class="validate" placeholder="用户名" required>
                        </div>
                        <div class="input-field">
                            <input type="email" name="user_email" placeholder="EMAIL" class="validate" required>
                        </div>
                        <div class="input-field">
                            <input name="user_pass1" type="password" placeholder="PASSWORD" class="validate" required>
                        </div>
                        <div class="input-field">
                            <input name="user_pass2" type="password" placeholder="PASSWORD" class="validate" required>
                        </div>
                        <button class="btn btn-default">注册</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end register -->


    <!-- loader -->
    <div id="fakeLoader"></div>
    <!-- end loader -->

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
