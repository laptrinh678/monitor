<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Viettel Moniter System</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{url('public/fontend')}}/css/app.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{url('public/fontend')}}/{{url('public/fontend')}}/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="{{url('public/fontend')}}/{{url('public/fontend')}}/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/css/custom.css">
    <!--end of global css-->
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/css/tabbular.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/css/jquery.circliful.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/vendors/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/vendors/owl-carousel/owl.theme.css">
    @yield('header_style')
</head>
<body>
    <!-- Header Start -->
    <header>
        <!-- Icon Section Start -->
        <div class="icon-section">
            <div class="container">
                <ul class="list-inline">
                    <li>
                        <a href="#"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="twitter" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="google-plus" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="linkedin" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="rss" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li class="pull-right">
                        <ul class="list-inline icon-position">
                            <li>
                                <a href="mailto:"><i class="livicon" data-name="mail" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="mailto:" class="text-white">info@joshadmin.com</a></label>
                            </li>
                            <li>
                                <a href="tel:"><i class="livicon" data-name="phone" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="tel:" class="text-white">(703) 717-4200</a></label>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- //Icon Section End -->
        <!-- Nav bar Start -->
       @include('fontend.master.menu')
        <!-- Nav bar End -->
    </header>
    <!-- //Header End -->
    <!--Carousel Start -->
    <div id="owl-demo" class="owl-carousel owl-theme">
        <div class="item"><img src="{{url('public/fontend')}}/images/slide_1.jpg" alt="slider-image">
        </div>
        <div class="item"><img src="{{url('public/fontend')}}/images/slide_2.jpg" alt="slider-image">
        </div>
        <div class="item"><img src="{{url('public/fontend')}}/images/slide_3.png" alt="slider-image">
        </div>
    </div>
    <!-- //Carousel End -->
    <!-- Container Start -->
      @yield('content')
   
    <!-- //Container End -->
    <!-- Footer Section Start -->
     @include('fontend.master.footer')
    <!-- //Footer Section End -->
    <!-- Copy right Section Start -->
    <div class="copyright">
        <div class="container">
            <p>Copyright &copy; Josh Admin Template, 2015</p>
        </div>
    </div>
    <!-- Copy right Section End -->
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!--global js starts-->
    <script type="text/javascript" src="{{url('public/fontend')}}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/bootstrap.min.js"></script>
    <script src="{{url('public/fontend')}}/js/style-switcher.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/raphael.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/livicons-1.4.min.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/josh_frontend.js"></script>
    <!--global js end-->
    <!-- page level js starts-->
    <script type="text/javascript" src="{{url('public/fontend')}}/js/jquery.circliful.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/vendors/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/carousel.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/index.js"></script>
    <!--page level js ends-->
</body>

</html>
