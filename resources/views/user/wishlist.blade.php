@extends('layouts.main')

@section('header')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.css">

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

<!-- wishlist -->
<div class="wishlist section">
    <div class="container">
        <div class="pages-head">
            <h3>我的收藏</h3>
        </div>
        <div class="content">
            @foreach($goods as $k=>$v)
                <div class="cart">
                    <div class="row">
                        <div class="col s5">
                            <h5>图片</h5>
                        </div>
                        <div class="col s7">
                            <img src="img/wishlist1.png" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>商品名</h5>
                        </div>
                        <div class="col s7">
                            <h5><a href="/goods?id={{$v['goods_id']}}">{{$v['goods_name']}}</a></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>售价</h5>
                        </div>
                        <div class="col s7">
                            <h5>人民币{{$v['shop_price']}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>收藏时间</h5>
                        </div>
                        <div class="col s7">
                            <h5>{{$v['fav_time']}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>Action</h5>
                        </div>
                        <div class="col s7">
                            <h5><i class="fa fa-trash"></i></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col 12">
                            <button class="btn button-default">添加到购物车</button>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
            @endforeach
        </div>
    </div>
</div>
<!-- end wishlist -->


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
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.js"></script>

    <script>

    </script>
@endsection



