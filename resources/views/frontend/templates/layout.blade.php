<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('storage/assets/newcss/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('storage/assets/newcss/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/newcss/magnific-popup.css') }} ">
    <link rel="stylesheet" href="{{ asset('storage/assets/newcss/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('storage/assets/newcss/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/newcss/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/newcss/bootstrap-popover-x.min.css')}}">
    <link rel="stylesheet" href="{{ asset('storage/assets/newcss/main.css')}}">
    <link rel="stylesheet" href="{{ asset('storage/assets/newcss/responsive.css')}}">
    <link rel="shortcut icon" href="{{ asset('storage/storage/assets/newimages/favicon.png')}}" type="image/x-icon">
    <title>Khushi Lottery || Nepal's No.1</title>


</head>

<body>
    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->

    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    <header class="top-header">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-top-area-inner">
                            <a href="index.html" class="logo">
                                <img src="{{asset('storage/assets/newimages/logo.png')}}" alt="">
                            </a>
                            <div class="right-area">
                                <div class="log-reg-area">
                                    <span class="text">Ticket Sold :</span>
                                    <div class="time">
                                       1000025</h6>
                                    </div>
                                </div>
                                <div class="next-draw">
                                    <span class="text">Next Draw :</span>
                                    <div class="time">
                                        <h6 class="time-countdown" data-countdown="01/06/2022"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-section">
            <div class="container">
                @include('inc.navbar')
            </div>
        </div>
    </header>
@yield('content')

    <!-- ==========Newslater-Section========== -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-links">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-top-area">
                            <div class="left">
                                <a href="#">
                                    <img src="{{asset('storage/assets/newimages/app_store_btn.png') }}" alt="">
                                </a>
                                <a href="#">
                                    <img src="{{asset('storage/assets/newimages/goole_play_btn.png') }}" alt="">
                                </a>
                            </div>
                            <div class="right">
                                <ul class="links">
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">FAQs</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms of Service</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <hr class="hr2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="copyr-text">
                            <span>
                                Copyright © 2020.All Rights Reserved By
                            </span>
                            <a href="#">Khushi Lottery</a>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <ul class="footer-social-links">
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ==========Newslater-Section========== -->
    <!-- All js link starts hear -->
    <script src="{{asset('storage/assets/newjs/jquery-3.3.1.min.js') }}"></script>
    <script src="{{asset('storage/assets/newjs/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{asset('storage/assets/newjs/plugins.js') }}"></script>
    <script src="{{asset('storage/assets/newjs/bootstrap.min.js') }}"></script>
    <script src="{{asset('storage/assets/newjs/magnific-popup.min.js') }}"></script>
    <script src="{{asset('storage/assets/newjs/owl.carousel.min.js') }}"></script>
    <script src="{{asset('storage/assets/newjs/countdown.min.js') }}"></script>
    <script src="{{asset('storage/assets/newjs/bootstrap-popover-x.min.js') }}"></script>
    <script src="{{asset('storage/assets/newjs/amd.js') }}"></script>
    <script src="{{asset('storage/assets/newjs/nice-select.js') }}"></script>
    <script src="{{asset('storage/assets/newjs/main.js') }}"></script>
</body>

</html>
