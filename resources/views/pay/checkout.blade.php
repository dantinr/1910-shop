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

    <!-- checkout -->
    <div class="checkout pages section">
        <div class="container">
            <div class="pages-head">
                <h3>结算</h3>
            </div>
            <div class="checkout-content">
                <div class="row">
                    <div class="col s12">
                        <ul class="collapsible" data-collapsible="accordion">
                            <li class="active">
                                <div class="collapsible-header active"><h5>支付方式</h5></div>
                                <div class="collapsible-body">
                                    <div class="payment-mode">
                                        <p></p>
                                        <form method="post" action="/pay/create?oid={{$_GET['oid']}}" class="checkout-radio">
                                            {{csrf_field()}}
                                            <div class="input-field">
                                                <input checked type="radio" class="with-gap" id="bank-transfer" name="pay_type" value="1">
                                                <label for="bank-transfer"><span><img width="50" src="/img/zfb.png"
                                                                                      alt=""></span></label>
                                            </div>
                                            <div class="input-field">
                                                <input type="radio" class="with-gap" id="cash-on-delivery" name="pay_type" value="2">
                                                <label for="cash-on-delivery"><span><img width="50" src="/img/wx.png"
                                                                                         alt=""></span></label>
                                            </div>
                                            <div class="input-field">
                                            </div>

                                            <input type="submit" class="btn button-default" value="去支付">
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end checkout -->


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
