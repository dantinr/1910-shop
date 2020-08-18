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

<div class="pages section">
    <div class="container">
        <div class="pages-head">
            <h3>账号绑定</h3>
        </div>
        <div class="register">
            <div class="row">
                <form class="col s3">
                    <div class="input-field col-md-3">
                        <input name="user_name" type="text" value="{{$user_name}}">
                    </div>
                    <div class="input-field">
                        <a href="" class="form-control btn btn-default">绑定GITHUB账号</a>
                    </div>
                    <div class="input-field">
                        <a href="" class="form-control btn btn-default">绑定微信账号</a>
                    </div>
                    <div class="input-field">
                        <a href="" class="form-control btn btn-default">绑定微博账号</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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



