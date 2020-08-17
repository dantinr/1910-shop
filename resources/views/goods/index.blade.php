@extends('layouts.main')

@section('header')
    @parent
    <link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.8.8/skins/default/aliplayer-min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.css">
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

    <!-- navbar bottom -->
    <div class="navbar-bottom">
        <div class="row">
            <div class="col s2">
                <a href="index.html"><i class="fa fa-home"></i></a>
            </div>
            <div class="col s2">
                <a href="wishlist.html"><i class="fa fa-heart"></i></a>
            </div>
            <div class="col s4">
                <div class="bar-center">
                    <a href="/cart/index"><i class="fa fa-shopping-basket"></i></a>
                    <span>2</span>
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
    <!-- end navbar bottom -->

    <!-- menu -->
    <div class="menus" id="animatedModal2">
        <div class="close-animatedModal2 close-icon">
            <i class="fa fa-close"></i>
        </div>
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col s4">
                        <a href="index.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                Home
                            </div>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="product-list.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-bars"></i>
                                </div>
                                Product List
                            </div>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="shop-single.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-eye"></i>
                                </div>
                                Single Shop
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <a href="wishlist.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-heart"></i>
                                </div>
                                Wishlist
                            </div>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="cart.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                Cart
                            </div>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="checkout.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-credit-card"></i>
                                </div>
                                Checkout
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <a href="blog.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-bold"></i>
                                </div>
                                Blog
                            </div>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="blog-single.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-file-text-o"></i>
                                </div>
                                Blog Single
                            </div>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="error404.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-hourglass-half"></i>
                                </div>
                                404
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <a href="testimonial.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-support"></i>
                                </div>
                                Testimonial
                            </div>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="about-us.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                About Us
                            </div>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="contact.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                Contact
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <a href="setting.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-cog"></i>
                                </div>
                                Settings
                            </div>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="login.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-sign-in"></i>
                                </div>
                                Login
                            </div>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="register.html" class="button-link">
                            <div class="menu-link">
                                <div class="icon">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                Register
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end menu -->

    <!-- shop single -->
    <div class="pages section">
        <div class="container">
            <div class="shop-single">
                <img src="/storage/{{$goods['goods_img']}}" alt="">
                <h5>{{$goods['goods_name']}}</h5>
                <div class="price">$20 <span>$28</span></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eaque in non delectus, error iste veniam commodi mollitia, officia possimus, repellendus maiores doloribus provident. Itaque, ab perferendis nemo tempore! Accusamus</p>
                <button type="button" data-gid="{{$goods['goods_id']}}" class="btn button-default" id="cart_add">加入购物车</button>
                @if($goods['fav']==0)
                    <button type="button" data-gid="{{$goods['goods_id']}}" class="btn button-default" id="fav">收藏</button>
                @else
                    <button type="button" class="btn" id="fav">已收藏</button>
                @endif

            </div>

            <!-- 视频展示 开始 -->
            <div class="prism-player" id="player-con"></div>
            <!-- 视频展示 结束 -->
            <div class="review">
                <h5>1 reviews</h5>
                <div class="review-details">
                    <div class="row">
                        <div class="col s3">
                            <img src="img/user-comment.jpg" alt="" class="responsive-img">
                        </div>
                        <div class="col s9">
                            <div class="review-title">
                                <span><strong>John Doe</strong> | Juni 5, 2016 at 9:24 am | <a href="">Reply</a></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis accusantium corrupti asperiores et praesentium dolore.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-form">
                <div class="review-head">
                    <h5>Post Review in Below</h5>
                    <p>Lorem ipsum dolor sit amet consectetur*</p>
                </div>
                <div class="row">
                    <form class="col s12 form-details">
                        <div class="input-field">
                            <input type="text" required class="validate" placeholder="NAME">
                        </div>
                        <div class="input-field">
                            <input type="email" class="validate" placeholder="EMAIL" required>
                        </div>
                        <div class="input-field">
                            <input type="text" class="validate" placeholder="SUBJECT" required>
                        </div>
                        <div class="input-field">
                            <textarea name="textarea-message" id="textarea1" cols="30" rows="10" class="materialize-textarea" class="validate" placeholder="YOUR REVIEW"></textarea>
                        </div>
                        <div class="form-button">
                            <div class="btn button-default">POST REVIEW</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end shop single -->

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
    <script src="/js/cart.js"></script>
    <script type="text/javascript" charset="utf-8" src="https://g.alicdn.com/de/prismplayer/2.8.8/aliplayer-min.js"></script>

    <script>
        var player = new Aliplayer({
                "id": "player-con",
                "source": "/storage/{!! $goods['m3u8'] !!}",
                "width": "50%",
                "height": "400px",
                "autoplay": true,
                "isLive": false,
                "rePlay": false,
                "playsinline": true,
                "preload": true,
                "controlBarVisibility": "hover",
                "useH5Prism": true
            }, function (player) {
                console.log("The player is created");
            }
        );
    </script>
    {{--  收藏   --}}
    <script>
        $("#fav").on('click',function(){
            var goods_id = $(this).attr('data-gid');
            $.ajax({
                url: "/goods/fav?id=" + goods_id,
                type: "get",
                dataType: 'json',
                success: function(d){
                    $.MessageBox("收藏成功");
                    $("#fav").text("已收藏")
                }
            });
        });
    </script>
@endsection
