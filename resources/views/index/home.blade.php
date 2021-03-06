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

    <!-- navbar bottom -->
    @section('navbar_bottom')
        @parent
    @endsection
    <!-- end navbar bottom -->

    <!-- slider -->
    <div class="slider">

        <ul class="slides">
            <li>
                <img src="img/slide1.jpg" alt="">
                <div class="caption slider-content  center-align">
                    <h2>WELCOME TO MSTORE</h2>
                    <h4>Lorem ipsum dolor sit amet.</h4>
                    <a href="" class="btn button-default">SHOP NOW</a>
                </div>
            </li>
            <li>
                <img src="img/slide2.jpg" alt="">
                <div class="caption slider-content center-align">
                    <h2>JACKETS BUSINESS</h2>
                    <h4>Lorem ipsum dolor sit amet.</h4>
                    <a href="" class="btn button-default">SHOP NOW</a>
                </div>
            </li>
            <li>
                <img src="img/slide3.jpg" alt="">
                <div class="caption slider-content center-align">
                    <h2>FASHION SHOP</h2>
                    <h4>Lorem ipsum dolor sit amet.</h4>
                    <a href="" class="btn button-default">SHOP NOW</a>
                </div>
            </li>
        </ul>

    </div>
    <!-- end slider -->

    <!-- features -->
    <div class="features section">
        <div class="container">
            <div class="row">
                <div class="col s6">
                    <div class="content">
                        <div class="icon">
                            <i class="fa fa-car"></i>
                        </div>
                        <h6>Free Shipping</h6>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                    </div>
                </div>
                <div class="col s6">
                    <div class="content">
                        <div class="icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <h6>Money Back</h6>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom-0">
                <div class="col s6">
                    <div class="content">
                        <div class="icon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                    </div>
                </div>
                <div class="col s6">
                    <div class="content">
                        <div class="icon">
                            <i class="fa fa-support"></i>
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end features -->

    <!-- quote -->
    <div class="section quote">
        <div class="container">
            <h4>FASHION UP TO 50% OFF</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus illo hic iure eveniet</p>
        </div>
    </div>
    <!-- end quote -->

    <!-- product -->
    <div class="section product">
        <div class="container">
            <div class="section-head">
                <h4>NEW PRODUCT</h4>
                <div class="divider-top"></div>
                <div class="divider-bottom"></div>
            </div>

            <div class="row">

                @foreach($goods as $k=>$v)
                    <div class="col s6">
                        <div class="content">
                            <a target="_blank" href="/goods?id={{$v->goods_id}}" title="{{$v->goods_title}}">
                                <img src="/storage/{{$v->goods_img}}" alt="">
                            </a>
                            <h6><a target="_blank" title="{{$v->goods_title}}" href="/goods?id={{$v->goods_id}}">
                                    @if($v->video)
                                    <a href="#"><i class="fa fa-video-camera"></i></a>
                                    @endif
                                    {{$v->goods_name}}
                                </a>
                            </h6>
                            <div class="price">
                                ¥ {{$v->shop_price}} <span>¥ {{$v->shop_price}}</span>
                            </div>
                            <button value="{{$v['goods_id']}}" class="btn button-default cart_add">ADD TO CART</button>

                        </div>
                    </div>
                @endforeach

            </div>


        </div>
    </div>
    <!-- end product -->

    <!-- promo -->
    <div class="promo section">
        <div class="container">
            <div class="content">
                <h4>PRODUCT BUNDLE</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                <button class="btn button-default">SHOP NOW</button>
            </div>
        </div>
    </div>
    <!-- end promo -->


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
    <script>
        $(".cart_add").click(function(e){
            var gid = ($(this).val())
            $.ajax({
                url: '/cart/add?id=' + gid,
                type: 'get',
                dataType: 'json',
                success:function(d){
                    console.log(d);
                    if(d.errno==0)
                    {
                        $.MessageBox("已加入购物车");
                        var num = $("#cart_num").text();
                        num++;      //可根据返回数据修改购物车数量
                        $("#cart_num").text(num)
                    }
                }
            });
        });
    </script>
@endsection
