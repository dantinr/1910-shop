@extends('layouts.main')

@section('header')
    @parent

@endsection
@section('body')

    <!-- navbar top -->
    <!-- end navbar top -->

    <!-- side nav right-->
    @section('side_nav_right')
        @parent
    @endsection
    <!-- end side nav right-->


    <!-- cart -->
    <div class="cart section">
        <div class="container">
            <div class="pages-head">
                <h3>抽奖</h3><br>
                <button id="prize" class="btn btn-danger">开始抽奖</button>
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
    <script>
        $("#prize").on('click',function(){
            alert(1111)
        })
    </script>
@endsection
