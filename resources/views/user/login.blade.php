@extends('layouts.main')

@section('header')
    @parent
@endsection

@section('body')
    <!-- navbar top -->
    @section('navbar_top')
        @parent
    @endsection
    <!-- end navbar top -->

    <!-- side nav right-->
    @section('side_nav_right')
        @parent
    @endsection
    <!-- end side nav right-->


    <!-- login -->
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>LOGIN</h3>
            </div>
            <div class="login">
                <div class="row">
                    <form action="/user/login" method="post" class="col s12">
                        {{csrf_field()}}
                        <div class="input-field">
                            <input name="info" type="text" class="validate" placeholder="USERNAME" required>
                        </div>
                        <div class="input-field">
                            <input name="pass" type="password" class="validate" placeholder="PASSWORD" required>
                        </div>
                        <a href=""><h6>Forgot Password ?</h6></a>
                        <br>
                        <button type="submit" class="btn btn-default">登录</button>
                        <a href="/user/reg" class="btn btn-default">注册</a>
                        <div class="input-field">
                            <a href="/user/login/github"><img src="/img/github.jpg" alt=""></a>
                            <a href="#"><img width="93" src="/img/wx.png" alt=""></a>
                            <a href="#"><img width="93" src="/img/qq.png" alt=""></a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end login -->

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



