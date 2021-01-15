@extends('frontend.templates.layout')
@section('content')
<!-- ==========Breadcrumb-Section========== -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="content">
                <h2 class="title">
                    About Us
                </h2>
                <ul class="breadcrumb-list extra-padding">
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Breadcrumb-Section========== -->

    <!-- ==========About-counter-Section========== -->
    <section class="about-counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-counter-image">
                        <img src="{{ asset('storage/assets/newimages/about-counter') }}-bg.jpg" alt="">
                    </div>
                    <div class="counter-area">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="counter-area-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="c-box">
                                                <img class="icon" src="{{ asset('storage/assets/newimages/ac1.png') }}" alt="">
                                                <h3 class="number">23</h3>
                                                <p class="text">Winners Last Month</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="c-box">
                                                <img class="icon" src="{{ asset('storage/assets/newimages/ac2.png') }}" alt="">
                                                <h3 class="number">2837K</h3>
                                                <p class="text">Tickets Sold</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="c-box">
                                                <img class="icon" src="{{ asset('storage/assets/newimages/ac3.png') }}" alt="">
                                                <h3 class="number">28387K</h3>
                                                <p class="text">Payout to Winners</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========About-counter-Section========== -->

    <!-- ==========About-info-Section========== -->
    <section class="about-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="{{ asset('storage/assets/newimages/about-left') }}.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="right-content">
                        <div class="section-header">
                            <h2 class="title">
                                About us
                            </h2>
                            <p>
                                We offer the possibility to play the world’s
                                biggest lotteries online. Our site was designed with a lottery player in mind. We are
                                lotto
                                fans ourselves, therefore we know what it takes to satisfy one.
                            </p>
                            <p>
                                Our team is build up with lottery enthusiasts, but also industry professionals. Our
                                designers and developers ensure the smoothest lotto playing experience. Support is also
                                a
                                pillar of our operations. Our agents are always thriving to help.

                            </p>
                            <p>
                                Your satisfaction is our goal!
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========About-info-Section========== -->

    <!-- ==========Testimonial-Section========== -->
    <section class="testimonial">
        <div class="about-feature">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="a-f-box">
                            <img src="{{ asset('storage/assets/newimages/af1.png') }}" alt="">
                            <h4 class="title">100% Secure</h4>
                            <p class="text">
                                All transactions are protected by
                                GeoTrust 128-bit SSL security layer.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="a-f-box">
                            <img src="{{ asset('storage/assets/newimages/af2.png') }}" alt="">
                            <h4 class="title">No Risk</h4>
                            <p class="text">
                                All transactions are protected by
                                GeoTrust 128-bit SSL security layer.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="a-f-box">
                            <img src="{{ asset('storage/assets/newimages/af3.png') }}" alt="">
                            <h4 class="title">Support</h4>
                            <p class="text">
                                All transactions are protected by
                                GeoTrust 128-bit SSL security layer.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="a-f-box">
                            <img src="{{ asset('storage/assets/newimages/af4.png') }}" alt="">
                            <h4 class="title">Spam-Free</h4>
                            <p class="text">
                                All transactions are protected by
                                GeoTrust 128-bit SSL security layer.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-testimonial">
                        <img src="{{ asset('storage/assets/newimages/map.png') }}" alt="">
                        <div class="client one">
                            <div class="img" data-toggle="popover-x" data-target="#myPopover" data-placement="top"
                                data-trigger="hover focus">
                                <img src="{{ asset('storage/assets/newimages/testi1.png') }}" alt="">
                            </div>
                            <div id="myPopover" class="popover popover-default mypopover">
                                <div class="arrow"></div>
                                <div class="client-review">
                                    <p class="top-text">Awesome Fantra!</p>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="bottom-text">“Ideas are easy. Implementation is hard.”</p>
                                    <div class="client-info">
                                        <h4 class="name">Flora Oliver</h4>
                                        <p class="date">Jan 1, 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client two">
                            <div class="img" data-toggle="popover-x" data-target="#myPopover2" data-placement="top"
                                data-trigger="hover focus">
                                <img src="{{ asset('storage/assets/newimages/testi2.png') }}" alt="">
                            </div>
                            <div id="myPopover2" class="popover popover-default mypopover">
                                <div class="arrow"></div>
                                <div class="client-review">
                                    <p class="top-text">Awesome Fantra!</p>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="bottom-text">“Ideas are easy. Implementation is hard.”</p>
                                    <div class="client-info">
                                        <h4 class="name">Flora Oliver</h4>
                                        <p class="date">Jan 1, 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client three">
                            <div class="img" data-toggle="popover-x" data-target="#myPopover3" data-placement="top"
                                data-trigger="hover focus">
                                <img src="{{ asset('storage/assets/newimages/testi3.png') }}" alt="">
                            </div>
                            <div id="myPopover3" class="popover popover-default mypopover">
                                <div class="arrow"></div>
                                <div class="client-review">
                                    <p class="top-text">Awesome Fantra!</p>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="bottom-text">“Ideas are easy. Implementation is hard.”</p>
                                    <div class="client-info">
                                        <h4 class="name">Flora Oliver</h4>
                                        <p class="date">Jan 1, 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client four">
                            <div class="img" data-toggle="popover-x" data-target="#myPopover4" data-placement="top"
                                data-trigger="hover focus">
                                <img src="{{ asset('storage/assets/newimages/testi4.png') }}" alt="">
                            </div>
                            <div id="myPopover4" class="popover popover-default mypopover">
                                <div class="arrow"></div>
                                <div class="client-review">
                                    <p class="top-text">Awesome Fantra!</p>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="bottom-text">“Ideas are easy. Implementation is hard.”</p>
                                    <div class="client-info">
                                        <h4 class="name">Flora Oliver</h4>
                                        <p class="date">Jan 1, 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client five">
                            <div class="img" data-toggle="popover-x" data-target="#myPopover5" data-placement="top"
                                data-trigger="hover focus">
                                <img src="{{ asset('storage/assets/newimages/testi5.png') }}" alt="">
                            </div>
                            <div id="myPopover5" class="popover popover-default mypopover">
                                <div class="arrow"></div>
                                <div class="client-review">
                                    <p class="top-text">Awesome Fantra!</p>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="bottom-text">“Ideas are easy. Implementation is hard.”</p>
                                    <div class="client-info">
                                        <h4 class="name">Flora Oliver</h4>
                                        <p class="date">Jan 1, 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client six">
                            <div class="img" data-toggle="popover-x" data-target="#myPopover6" data-placement="top"
                                data-trigger="hover focus">
                                <img src="{{ asset('storage/assets/newimages/testi6.png') }}" alt="">
                            </div>
                            <div id="myPopover6" class="popover popover-default mypopover">
                                <div class="arrow"></div>
                                <div class="client-review">
                                    <p class="top-text">Awesome Fantra!</p>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="bottom-text">“Ideas are easy. Implementation is hard.”</p>
                                    <div class="client-info">
                                        <h4 class="name">Flora Oliver</h4>
                                        <p class="date">Jan 1, 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Testimonial-Section========== -->

@endsection
