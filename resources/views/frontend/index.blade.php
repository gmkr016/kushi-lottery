<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="shortcut icon" type="image/png" href="{{ asset('storage/assets/images/favicon.png') }}" />
<link rel="stylesheet" href="{{ asset('storage/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('storage/assets/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('storage/assets/css/flaticon.css') }}">
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

    <!-- banner-section strat -->
    <section class="banner-section">
        <div class="parallax-container">
            <span class="slide1"><img src="{{ asset('storage/assets/images/shape/star.png') }}"
                    alt="banner-shape"></span>
            <span class="slide2"><img src="{{ asset('storage/assets/images/shape/star.png') }}"
                    alt="banner-shape"></span>
            <span class="slide3"><img src="{{ asset('storage/assets/images/shape/man.png') }}"
                    alt="banner-shape"></span>
            <span class="slide4"><img src="{{ asset('storage/assets/images/shape/cup.png') }}"
                    alt="banner-shape"></span>
            <span class="slide5"><img src="{{ asset('storage/assets/images/shape/banner-girl.png') }}"
                    alt="banner-shape"></span>
            <span class="slide6"><img src="{{ asset('storage/assets/images/shape/round.png') }}"
                    alt="banner-shape"></span>
        </div>
        <div class="banner-content-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="banner-content">
                            <h3 class="banner-top-title">Win Online Lottery</h3>
                            <h1 class="banner-main-title">Just One Way</h1>
                            <p>Only a small portion of that total comesfrom the "Lotten" platform the state launched in
                                January and is expected to bring in $4 to $10 million in the fiscal year that starts in
                                March.</p>
                            <a href="#" class="cmn-btn btn-lg">buy ticket now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- next-draw-section start -->
    <section class="next-draw-section">
        <div class="next-draw-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="next-draw-wrapper d-flex align-items-center">
                            <div class="next-draw-content">
                                <h2 class="title">Next Draw</h2>
                                <p>Concerns greatest margaret him absolute entrance nay. Door neat week do find past</p>
                            </div>
                            <div class="next-draw-countdown">
                                <div id="clock"></div>
                            </div>
                            <div class="next-draw-btn text-right">
                                <a href="#" class="cmn-btn btn-md">pay now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- next-draw-section end -->

    <!-- step-section start -->
    <section class="step-section section-padding">
        <div class="side-ball-image"><img src="{{ asset('storage/assets/images/shape/ball.png') }}"
                alt="ball-png-image') }}"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-header text-center">
                        <h2>Easy 3 Steps To Win</h2>
                        <p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite
                            disposed me an at subjects an.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-9">
                    <div class="row step-wrapper">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="step-item">
                                <span class="item-count">1</span>
                                <i class="flaticon-paper-pencil-and-calculator"></i>
                                <h4 class="title">choose numbers</h4>
                            </div>
                        </div><!-- step-item end -->
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="step-item">
                                <span class="item-count">2</span>
                                <i class="flaticon-press-pass"></i>
                                <h4 class="title">enter details</h4>
                            </div>
                        </div><!-- step-item end -->
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="step-item">
                                <span class="item-count">3</span>
                                <i class="flaticon-ticket"></i>
                                <h4 class="title">win</h4>
                            </div>
                        </div><!-- step-item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- step-section end -->

    <!-- free-lottery-result-section start -->
    <section class="free-lottery-result-section section-bg section-padding">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-6">
                    <div class="section-header text-center">
                        <h2>Latest Free Lottery Results</h2>
                        <p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite
                            disposed me an at subjects an.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-mb-15">
                <div class="col-lg-6">
                    <div class="free-draw-wrapper">
                        <h4 class="title">sunday mega draw</h4>
                        <p class="date">Date:<span>21 / 02 / 2019</span></p>
                        <ul class="lottery-number-list">
                            <li>30</li>
                            <li>45</li>
                            <li>98</li>
                            <li>75</li>
                            <li>58</li>
                            <li>06</li>
                        </ul>
                        <div class="free-draw-footer">
                            <div class="left draw-info">
                                <h4>Jackpot:</h4>
                                <span class="rate">$2.4M</span>
                            </div>
                            <div class="right draw-info">
                                <h4>Draw No:</h4>
                                <span class="draw-no">223</span>
                            </div>
                        </div>
                    </div>
                </div><!-- free-draw-wrapper end -->
                <div class="col-lg-6">
                    <div class="free-draw-wrapper">
                        <h4 class="title">daily draw</h4>
                        <p class="date">Date:<span>21 / 02 / 2019</span></p>
                        <ul class="lottery-number-list">
                            <li>64</li>
                            <li>81</li>
                            <li>09</li>
                            <li>01</li>
                            <li>30</li>
                            <li>48</li>
                        </ul>
                        <div class="free-draw-footer">
                            <div class="left draw-info">
                                <h4>Jackpot:</h4>
                                <span class="rate">$2.4M</span>
                            </div>
                            <div class="right draw-info">
                                <h4>Draw No:</h4>
                                <span class="draw-no">223</span>
                            </div>
                        </div>
                    </div>
                </div><!-- free-draw-wrapper end -->
            </div>
        </div>
    </section>
    <!-- free-lottery-result-section end -->

    <!-- next-jackpot-section start -->
    <section class="next-jackpot-section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="jackpot-board">
                        <ul class="lottery-number-list" id="choosenumbers">
                            <li>30</li>
                            <li>55</li>
                            <li>36</li>
                            <li>45</li>
                            <li>21</li>
                            <li>99</li>
                            <li>02</li>
                            <li>30</li>
                            <li>48</li>
                            <li>45</li>
                            <li>69</li>
                            <li>71</li>
                            <li>22</li>
                            <li>58</li>
                            <li>51</li>
                            <li>32</li>
                            <li>45</li>
                            <li>24</li>
                            <li>48</li>
                            <li>95</li>
                            <li>77</li>
                            <li>56</li>
                            <li>59</li>
                            <li>44</li>
                            <li>27</li>
                            <li>15</li>
                            <li>11</li>
                            <li>03</li>
                            <li>84</li>
                            <li>55</li>
                            <li>32</li>
                            <li>30</li>
                            <li>04</li>
                            <li>09</li>
                            <li>99</li>
                            <li>18</li>
                            <li>75</li>
                            <li>59</li>
                            <li>21</li>
                            <li>44</li>
                            <li>30</li>
                            <li>55</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="jackpot-content">
                        <h2 class="title">Next Weekly Jackpot</h2>
                        <p>Up is opinion message manners correct hearing husband my. Dispos commanded dashwoods
                            cordially depending at at. Its strangers who you certainty earnestly resources suffering
                            she. Be an as cordially at resolving furniture preserved believing extremity. Easy mr pain
                            felt in. Too northward affection additions nay.</p>
                        <p class="price">Jackpot: <span>£10,000</span></p>
                        <p class="date">Monday 18th February 2019</p>
                        <div class="jackpot-guess-wrapper">
                            <ul class="lottery-number-list" id="choosennumber">
                                <li id="choosen1">55</li>
                                <li id="choosen2">45</li>
                                <li id="choosen3">77</li>
                                <li id="choosen4">99</li>
                                <li id="choosen5">59</li>
                                <li id="choosen6">?</li>
                            </ul>
                        </div>
                        <div class="btn-area d-flex">
                            <a href="#0" class="cmn-btn btn-md">quick pick</a>
                            <a href="#0" class="cmn-btn second-bg btn-md">buy ticket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- next-jackpot-section end -->

    <!-- latest-winner-section start -->
    <section class="latest-winner-section section-padding">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-7">
                    <div class="section-header text-center">
                        <h2>Latest Lottery Winner Results</h2>
                        <p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite
                            disposed me an at subjects an.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="latest-winner-area table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="winner-info">Lottery Winner Names</th>
                                    <th class="date">Draw Date</th>
                                    <th class="price">price</th>
                                    <th class="number">lucky number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/1.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">Jaida Padberg</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$50400</span>
                                    </td>
                                    <td class="number">
                                        <ul class="lottery-number-list">
                                            <li>47</li>
                                            <li>42</li>
                                            <li>16</li>
                                            <li>39</li>
                                            <li>07</li>
                                            <li>26</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/2.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">Bennett Murphy</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$50400</span>
                                    </td>
                                    <td class="number">
                                        <ul class="lottery-number-list">
                                            <li>47</li>
                                            <li>42</li>
                                            <li>16</li>
                                            <li>39</li>
                                            <li>07</li>
                                            <li>26</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/3.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">Hollis Cooper</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$50400</span>
                                    </td>
                                    <td class="number">
                                        <ul class="lottery-number-list">
                                            <li>47</li>
                                            <li>42</li>
                                            <li>16</li>
                                            <li>39</li>
                                            <li>07</li>
                                            <li>26</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/4.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">Nancy Feinstein</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$50400</span>
                                    </td>
                                    <td class="number">
                                        <ul class="lottery-number-list">
                                            <li>47</li>
                                            <li>42</li>
                                            <li>16</li>
                                            <li>39</li>
                                            <li>07</li>
                                            <li>26</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/5.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">Brian Cantrell</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$50400</span>
                                    </td>
                                    <td class="number">
                                        <ul class="lottery-number-list">
                                            <li>47</li>
                                            <li>42</li>
                                            <li>16</li>
                                            <li>39</li>
                                            <li>07</li>
                                            <li>26</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/1.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">Donald Steelman</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$50400</span>
                                    </td>
                                    <td class="number">
                                        <ul class="lottery-number-list">
                                            <li>47</li>
                                            <li>42</li>
                                            <li>16</li>
                                            <li>39</li>
                                            <li>07</li>
                                            <li>26</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="section-btn-area text-center">
                        <a href="#" class="section-btn">.. See All Previous Results ..</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest-winner-section end -->

    <!-- stay-connected-section start -->
    <section class="stay-connected-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="stay-connected-wrapper">
                        <h2 class="title">Our Partner</h2>
                        <p>One advanced diverted domestic repeated bringing you old. Possible procured her trifling
                            laughter thoughts property she met way. Companions shy had solicitude favourable own. Which
                            could saw guest man now heard but. Lasted my coming uneasy marked so should. Gravity letters
                            it amongst herself dearest an windows by.</p>
                        <div class="btn-area">
                            <a href="#" class="cmn-btn btn-md"><img
                                    src="{{ asset('storage/assets/images/partner/sp1.png') }}" alt="icon-image"></a>
                            <a href="#" class="border-btn btn-md"><img
                                    src="{{ asset('storage/assets/images/partner/sp2.png') }}" alt="icon-image"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- stay-connected-section end -->

    <!-- choose-section start -->
    <section class="choose-section section-padding section-bg">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-6">
                    <div class="section-header text-center">
                        <h2>What You Chose Us</h2>
                        <p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite
                            disposed me an at subjects an.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-mb-15">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="choose-single-item">
                        <i class="flaticon-give-money"></i>
                        <h4 class="title">The Biggest Lottery Jackpots</h4>
                    </div>
                </div>
                <!--choose-single-item end-->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="choose-single-item">
                        <i class="flaticon-debit-card"></i>
                        <h4 class="title">Instant Payout system</h4>
                    </div>
                </div>
                <!--choose-single-item end-->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="choose-single-item">
                        <i class="flaticon-bonus"></i>
                        <h4 class="title"> Performance Bonus</h4>
                    </div>
                </div>
                <!--choose-single-item end-->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="choose-single-item">
                        <i class="flaticon-24-hours-delivery"></i>
                        <h4 class="title">24 Hour Priam Support</h4>
                    </div>
                </div>
                <!--choose-single-item end-->
            </div>
        </div>
    </section>
    <!-- choose-section end -->

    <!-- counter-section start -->
    <section class="counter-section section-padding">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-6">
                    <div class="section-header text-center">
                        <h2 class="section-title">Our History Off lottery</h2>
                        <p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite
                            disposed me an at subjects an.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-mb-15">
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="counter-single-item">
                        <span class="counter">869</span><span>K+</span>
                        <h4 class="title">Lottery Sales</h4>
                    </div>
                </div><!-- counter-single-item end -->
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="counter-single-item">
                        <span class="counter">69</span><span>M+</span>
                        <h4 class="title">price donet</h4>
                    </div>
                </div><!-- counter-single-item end -->
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="counter-single-item">
                        <span class="counter">1</span><span>K+</span>
                        <h4 class="title">total draw</h4>
                    </div>
                </div><!-- counter-single-item end -->
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="counter-single-item">
                        <span class="counter">98</span><span>K+</span>
                        <h4 class="title">winner members</h4>
                    </div>
                </div><!-- counter-single-item end -->
            </div>
        </div>
    </section>
    <!-- counter-section end -->

    <!-- online-ticket-section start -->
    <section class="online-ticket-section section-padding">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-7">
                    <div class="section-header text-center">
                        <h2 class="section-title">Buy Your Lottery Ticket Online</h2>
                        <p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite
                            disposed me an at subjects an.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="online-ticket-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="winner-info">Lottery Winner Names</th>
                                    <th class="date">Draw Date</th>
                                    <th class="price">price</th>
                                    <th class="sales">sales</th>
                                    <th class="draw-time">draw time</th>
                                    <th class="button"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/1.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">US Lotten</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$8.3M</span>
                                    </td>
                                    <td class="sales">
                                        <span>5655</span>
                                    </td>
                                    <td class="draw-time">
                                        <div class="clock"></div>
                                    </td>
                                    <td class="button">
                                        <a href="#" class="cmn-btn btn-sm second-bg">buy now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/2.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">Spanisha Lotten</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$2.6M</span>
                                    </td>
                                    <td class="sales">
                                        <span>68545</span>
                                    </td>
                                    <td class="draw-time">
                                        <div class="clock"></div>
                                    </td>
                                    <td class="button">
                                        <a href="#" class="cmn-btn btn-sm second-bg">buy now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/3.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">Italy Lotten</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$4.7M</span>
                                    </td>
                                    <td class="sales">
                                        <span>50400</span>
                                    </td>
                                    <td class="draw-time">
                                        <div class="clock"></div>
                                    </td>
                                    <td class="button">
                                        <a href="#" class="cmn-btn btn-sm second-bg">buy now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/6.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">Australian Lotten</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$3.9M</span>
                                    </td>
                                    <td class="sales">
                                        <span>95600</span>
                                    </td>
                                    <td class="draw-time">
                                        <div class="clock"></div>
                                    </td>
                                    <td class="button">
                                        <a href="#" class="cmn-btn btn-sm second-bg">buy now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/5.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">Canadia Lotten</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$7.2M</span>
                                    </td>
                                    <td class="sales">
                                        <span>85555</span>
                                    </td>
                                    <td class="draw-time">
                                        <div class="clock"></div>
                                    </td>
                                    <td class="button">
                                        <a href="#" class="cmn-btn btn-sm second-bg">buy now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/7.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">GRE Lotten</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$5.4M</span>
                                    </td>
                                    <td class="sales">
                                        <span>645468</span>
                                    </td>
                                    <td class="draw-time">
                                        <div class="clock"></div>
                                    </td>
                                    <td class="button">
                                        <a href="#" class="cmn-btn btn-sm second-bg">buy now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="winner-info">
                                        <span class="flag"><img src="{{ asset('storage/assets/images/flag/4.png') }}"
                                                alt="flag-image"></span>
                                        <span class="name">UK Lotten</span>
                                    </td>
                                    <td class="date">
                                        <span>21-02-2019</span>
                                    </td>
                                    <td class="price">
                                        <span>$6.4M</span>
                                    </td>
                                    <td class="sales">
                                        <span>50400</span>
                                    </td>
                                    <td class="draw-time">
                                        <div class="clock"></div>
                                    </td>
                                    <td class="button">
                                        <a href="#" class="cmn-btn btn-sm second-bg">buy now</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- online-ticket-section end -->

    <!-- testimonial-section start -->
    <section class="testimonial-section section-padding">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-7">
                    <div class="section-header text-center">
                        <h2 class="section-title">Our Lottery Winner Client Says</h2>
                        <p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite
                            disposed me an at subjects an.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="testimonial-slider-area">
                        <div class="testimonial-content-slider-area">
                            <div class="testimonial-content">
                                <p>Marianne or husbands if at stronger ye. Considered is as middletons uncommonly.
                                    Promotion perfectly ye consisted so. His chatty dining for effect ladies active.
                                    Equally journey wishing not several behaved chapter she two sir. Deficient procuring
                                    favourite extensive you two. Yet diminution she impossible understood age.</p>
                            </div>
                            <div class="testimonial-content">
                                <p>Marianne or husbands if at stronger ye. Considered is as middletons uncommonly.
                                    Promotion perfectly ye consisted so. His chatty dining for effect ladies active.
                                    Equally journey wishing not several behaved chapter she two sir. Deficient procuring
                                    favourite extensive you two. Yet diminution she impossible understood age.</p>
                            </div>
                            <div class="testimonial-content">
                                <p>Marianne or husbands if at stronger ye. Considered is as middletons uncommonly.
                                    Promotion perfectly ye consisted so. His chatty dining for effect ladies active.
                                    Equally journey wishing not several behaved chapter she two sir. Deficient procuring
                                    favourite extensive you two. Yet diminution she impossible understood age.</p>
                            </div>
                            <div class="testimonial-content">
                                <p>Marianne or husbands if at stronger ye. Considered is as middletons uncommonly.
                                    Promotion perfectly ye consisted so. His chatty dining for effect ladies active.
                                    Equally journey wishing not several behaved chapter she two sir. Deficient procuring
                                    favourite extensive you two. Yet diminution she impossible understood age.</p>
                            </div>
                            <div class="testimonial-content">
                                <p>Marianne or husbands if at stronger ye. Considered is as middletons uncommonly.
                                    Promotion perfectly ye consisted so. His chatty dining for effect ladies active.
                                    Equally journey wishing not several behaved chapter she two sir. Deficient procuring
                                    favourite extensive you two. Yet diminution she impossible understood age.</p>
                            </div>
                            <div class="testimonial-content">
                                <p>Marianne or husbands if at stronger ye. Considered is as middletons uncommonly.
                                    Promotion perfectly ye consisted so. His chatty dining for effect ladies active.
                                    Equally journey wishing not several behaved chapter she two sir. Deficient procuring
                                    favourite extensive you two. Yet diminution she impossible understood age.</p>
                            </div>
                            <div class="testimonial-content">
                                <p>Marianne or husbands if at stronger ye. Considered is as middletons uncommonly.
                                    Promotion perfectly ye consisted so. His chatty dining for effect ladies active.
                                    Equally journey wishing not several behaved chapter she two sir. Deficient procuring
                                    favourite extensive you two. Yet diminution she impossible understood age.</p>
                            </div>
                        </div><!-- testimonial-content-slider-area end-->
                        <div class="testimonial-thumb-slider">
                            <div class="thumb-slide">
                                <div class="thumb"><img src="{{ asset('storage/assets/images/testimonial/3.jpg') }}"
                                        alt="testimonial-image">
                                </div>
                                <div class="client-info">
                                    <h4 class="name">Justine Clark</h4>
                                    <span class="designation">US Lotten Winer</span>
                                </div>
                            </div>
                            <div class="thumb-slide">
                                <div class="thumb"><img src="{{ asset('storage/assets/images/testimonial/4.jpg') }}"
                                        alt="testimonial-image">
                                </div>
                                <div class="client-info">
                                    <h4 class="name">Justine Clark</h4>
                                    <span class="designation">US Lotten Winer</span>
                                </div>
                            </div>
                            <div class="thumb-slide">
                                <div class="thumb"><img src="{{ asset('storage/assets/images/testimonial/5.jpg') }}"
                                        alt="testimonial-image">
                                </div>
                                <div class="client-info">
                                    <h4 class="name">Justine Clark</h4>
                                    <span class="designation">US Lotten Winer</span>
                                </div>
                            </div>
                            <div class="thumb-slide">
                                <div class="thumb"><img src="{{ asset('storage/assets/images/testimonial/1.jpg') }}"
                                        alt="testimonial-image">
                                </div>
                                <div class="client-info">
                                    <h4 class="name">Justine Clark</h4>
                                    <span class="designation">US Lotten Winer</span>
                                </div>
                            </div>
                            <div class="thumb-slide">
                                <div class="thumb"><img src="{{ asset('storage/assets/images/testimonial/2.jpg') }}"
                                        alt="testimonial-image">
                                </div>
                                <div class="client-info">
                                    <h4 class="name">Justine Clark</h4>
                                    <span class="designation">US Lotten Winer</span>
                                </div>
                            </div>
                            <div class="thumb-slide">
                                <div class="thumb"><img src="{{ asset('storage/assets/images/testimonial/3.jpg') }}"
                                        alt="testimonial-image">
                                </div>
                                <div class="client-info">
                                    <h4 class="name">Justine Clark</h4>
                                    <span class="designation">US Lotten Winer</span>
                                </div>
                            </div>
                            <div class="thumb-slide">
                                <div class="thumb"><img src="{{ asset('storage/assets/images/testimonial/1.jpg') }}"
                                        alt="testimonial-image">
                                </div>
                                <div class="client-info">
                                    <h4 class="name">Justine Clark</h4>
                                    <span class="designation">US Lotten Winer</span>
                                </div>
                            </div>
                        </div><!-- testimonial-thumb-slider end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->



    <!-- footer-section start -->
    <footer class="footer-section">
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5 col-md-8">
                        <div class="footer-widget about-widget">
                            <div class="widget-body">
                                <a class="site-logo site-title" href="{{ route('home') }}"><img
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
    <script src="{{ asset('storage/assets/js/main.js') }}"></script>
    <script>
        //         var count = 0;
//         $("#choosenumbers li").click(function() {
//             count++
//             // console.log($(this).text()); // gets text contents of clicked li
//         switch(count){
//             case 1:
//                 $("#choosen1").text($(this).text());
//                 break;
//             case 2:
//                 $("#choosen2").text($(this).text());
//                 break;
//             case 3:
//                 $("#choosen3").text($(this).text());
//                 break;
//             case 4:
//                 $("#choosen4").text($(this).text());
//                 break;
//             case 5:
//                 $("#choosen5").text($(this).text());
//                 break;
//             case 6:
//                 $("#choosen6").text($(this).text());
//                 $("#choosenumbers li").unbind("click");
//                 break;
//     }
// });
    </script>
</body>

</html>