<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="eJob">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- <link rel="stylesheet" href="/assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/assets/css/line-icons.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.css">
    <link rel="stylesheet" href="/assets/css/slicknav.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <!-- <link rel="stylesheet" href="/assets/css/main.css"> -->
    <link rel="stylesheet" href="/assets/css/responsive.css">

    <link rel="stylesheet" href="/css/master.css">
    @section('head')
    @show
    <link rel="shortcut icon" type="image/x-icon" href="http://chittagongit.com/download/328250">
</head>
<body>
    <div id="notalert"></div>
    @section('body')
    @show
    <footer>
        <section class="footer-Content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <div class="widget">
                            <div class="footer-logo"><img src="/img/logo-footer.png" alt=""></div>
                            <div class="textwidget">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">{{__('app.Quick_Links')}}</h3>
                            <ul class="menu">
                                <li><a href="/about-us">{{__('app.About_Us')}}</a></li>
                                <li><a href="/faq">{{__('app.Faq')}}</a></li>
                                <li><a href="/contact">{{__('app.Contact')}}</a></li>
                            </ul>
                            <ul class="menu">
                                @if(1==3)
                                <li><a href="#">Terms & Conditions</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">{{__('app.Subscribe')}}</h3>
                            <p>{{__('app.Subscribe_to_be_in_touch_with')}}</p>
                            <div id="subscribe-form">
                                <div class="form-group is-empty">
                                    <input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Enter Email..." required="">
                                    <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-envelope"></i></button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <ul class="mt-3 footer-social">
                                @if(!empty(config::get('settings.facebook')))
                                <li><a class="facebook" href="{{config::get('settings.facebook')}}"><i class="lni-facebook-filled"></i></a></li>
                                @endif
                                @if(!empty(config::get('settings.twitter')))
                                <li><a class="twitter" href="{{config::get('settings.twitter')}}"><i class="lni-twitter-filled"></i></a></li>
                                @endif
                                @if(!empty(config::get('settings.linkedin')))
                                <li><a class="linkedin" href="{{config::get('settings.linkedin')}}"><i class="lni-linkedin-fill"></i></a></li>
                                @endif
                                @if(!empty(config::get('settings.google-plus')))
                                <li><a class="google-plus" href="{{config::get('settings.google-plus')}}"><i class="lni-google-plus"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <a href="#" class="back-to-top">
        <i class="lni-arrow-up"></i>
    </a>
    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    @include('cookieConsent::index')
    <!-- <script src="/assets/js/jquery-min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.slicknav.js"></script>
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <script src="/assets/js/waypoints.min.js"></script>
    <script src="/assets/js/main.js"></script> -->
    <script src="/js/master.js"></script>
    @section('foot')
    @show
</body>
</html>
