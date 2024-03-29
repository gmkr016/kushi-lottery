<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/assets/images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('storage/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/css/responsive.css') }}">
    <title>Khushi Lottery</title>
</head>

<body>

    <!-- preloader start -->
    <div id="preloader">
        <div class="preloader-text"></div>
    </div>
    <!-- preloader end -->

    <!--  header-section start  -->
    <header class="header-section">
        <div class="header-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="site-logo site-title" href="index.html"><img
                            src="{{ asset('storage/assets/images/logo.png') }}" alt="site-logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu-toggle"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav main-menu ml-auto">
                            <li <?php echo $title == 'home' ? 'class="active"' : '' ?>><a
                                    href="{{route('home')}}">Home</a></li>
                            <li <?php echo $title == 'about' ? 'class="active"' : '' ?>><a
                                    href="{{ route('about') }}">About</a></li>
                            {{-- <li class="menu_has_children"><a href="#0">pages</a>
                                <ul class="sub-menu">
                                    <li><a href="latest-winnner.html">latest winner</a></li>
                                    <li><a href="lottery-result.html">lottery result</a></li>
                                    <li><a href="faq.html">faq Page</a></li>
                                    <li><a href="error-404.html">error Page</a></li>
                                </ul>
                            </li> --}}
                            <li <?php echo $title == 'blog' ? 'class="active"' : '' ?>><a
                                    href="{{ route('blog') }}">blog</a>
                                {{-- <ul class="sub-menu">
                                    <li><a href="blog-page.html">Blog page</a></li>
                                    <li><a href="blog-details.html">blog single</a></li>
                                </ul> --}}
                            </li>
                            <li <?php echo $title == 'contact' ? 'class="active"' : '' ?>><a
                                    href="{{route('contact')}}">contact us</a></li>
                        </ul>
                        <div class="registration-login-area">
                            <a href="{{ route('login') }}" style="margin-right:20px">
                                <button type="button" class="text-btn" data-toggle="modal"
                                    data-target="#">Login</button>
                            </a>
                            <a href="{{ route('register') }}">
                                <button type="button" class="text-btn" data-toggle="modal"
                                    data-target="">Registration</button>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div><!-- header-bottom end -->
    </header>
    <!--  header-section end  -->

    <!-- login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-label="loginModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <div class="modal-body">
                    <div class="login-block">
                        <h2 class="title">Login</h2>
                        <form class="cmn-form login-form">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="frm-group">
                                        <input type="email" name="login-email" id="login_email"
                                            placeholder="Email address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="frm-group">
                                        <input type="password" name="login-pass" id="login_pass" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="frm-group">
                                        <button type="submit" class="cmn-btn btn-md">Login</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="frm-group">
                                        <a href="#0" class="text-btn">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- registration Modal -->
    <div class="modal fade" id="rigistrationModal" tabindex="-1" role="dialog" aria-label="rigistrationModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <div class="modal-body">
                    <div class="registration-block">
                        <h2 class="title">Register</h2>
                        <form class="cmn-form registration-form">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="frm-group">
                                        <input type="text" name="registration-f-name" id="registration_f_name"
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="frm-group">
                                        <input type="text" name="registration-l-name" id="registration_l_name"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="frm-group">
                                        <input type="tel" name="registration-l-number" id="registration_l_number"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="frm-group">
                                        <input type="email" name="registration-email" id="registration_email"
                                            placeholder="Email address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="frm-group">
                                        <input type="password" name="registration-pass" id="registration_pass"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="frm-group">
                                        <button type="submit" class="cmn-btn btn-md">Registartion</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-left">
                        <h3 class="title">About Us</h3>
                        <ul class="page-list d-flex">
                            <li><a href="index.html">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area end -->

    @yield('content')
    <!-- footer-section start -->
    <footer class="footer-section">
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5 col-md-8">
                        <div class="footer-widget about-widget">
                            <div class="widget-body">
                                <a class="site-logo site-title" href="index.html"><img
                                        src="{{ asset('storage/assets/images/logo.png') }}" alt="site-logo"></a>
                                <p>Call park out she wife face mean. Invitation excellence imprudence understood it
                                    continuing to. Ye show done an into. Fifteen winding related may hearted colonel are
                                    way studied.</p>
                                <ul class="footer-social-links d-flex">
                                    <li><a href="#0"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#0"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#0"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- footer-widget end -->
                    <div class="col-lg-1 col-md-4">
                        <div class="footer-widget menu-widget">
                            <h4 class="widget-title">menu</h4>
                            <div class="widget-body">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Results</a></li>
                                    <li><a href="#">Lotteries</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Pages</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- footer-widget end -->
                    <div class="col-lg-5">
                        <div class="footer-widget subscribe-widget">
                            <h4 class="widget-title">Sign uo For Exclusive Offers</h4>
                            <div class="widget-body">
                                <p>Lose eyes get fat shew. Winter can indeed letter oppose way change tended now.</p>
                                <form class="subscribe-form">
                                    <input type="email" name="sub-email" id="sub_email"
                                        placeholder="Enter your email address">
                                    <button type="submit" class="subscribe-btn">subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="container">
                <p>2019 All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <!-- footer-section end -->

    <!-- scroll-to-top start -->
    <div class="scroll-to-top">
        <span class="scroll-icon">
            <i class="fa fa-rocket"></i>
        </span>
    </div>
    <!-- scroll-to-top end -->

    <script src="{{ asset('storage/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/jquery.countup.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/lightcase.js') }}"></script>
    <script src="{{ asset('storage/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/wow.min.js') }}"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js'></script>
    <script src="{{ asset('storage/assets/js/jquery.countdown.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqFuLx8S7A8eianoUhkYMeXpGPvsXp1NM&amp;callback=initMap"
        async defer></script>
    <!-- goolg-map-activate js link -->
    <script src="{{ asset('storage/assets/js/goolg-map-activate.js') }}"></script>
    <script src="{{ asset('storage/assets/js/contact-form.js') }}"></script>
    <script src="{{ asset('storage/assets/js/main.js') }}"></script>
</body>

</html>
