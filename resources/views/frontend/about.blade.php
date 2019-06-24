@extends('frontend.templates.layout')
@section('content')
<!-- about-section start -->
<section class="about-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-wrapper d-flex">
                    <div class="thumb"><img src="{{ asset('storage/assets/images/about/1.jpg') }}" alt="about-image">
                    </div>
                    <div class="content">
                        <h2 class="title">about us</h2>
                        <p>In up so discovery my middleton eagerness dejection explained. Estimating excellence ye
                            contrasted insensible as. Oh up unsatiable advantages decisively as at interested.
                            Present suppose in esteems in demesne colonel it to. End horrible she landlord screened
                            stanhill.</p>
                        <p>Repeated offended you opinions off dissuade ask packages screened. She alteration
                            everything sympathize impossible his get compliment. Collected few extremity suffering
                            met had sportsman. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-section end -->

<!-- brand-section start -->
<div class="brand-section section-padding section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-slider">
                    <div class="brand-single-slide">
                        <div class="thumb"> <img src="{{ asset('storage/assets/images/brand/1.png') }}"
                                alt="brand-image"></div>
                    </div><!-- brand-single-slide end -->
                    <div class="brand-single-slide">
                        <div class="thumb"><img src="{{ asset('storage/assets/images/brand/5.png') }}"
                                alt="brand-image"></div>
                    </div><!-- brand-single-slide end -->
                    <div class="brand-single-slide">
                        <div class="thumb"><img src="{{ asset('storage/assets/images/brand/2.png') }}"
                                alt="brand-image"></div>
                    </div><!-- brand-single-slide end -->
                    <div class="brand-single-slide">
                        <div class="thumb"><img src="{{ asset('storage/assets/images/brand/3.png') }}"
                                alt="brand-image"></div>
                    </div><!-- brand-single-slide end -->
                    <div class="brand-single-slide">
                        <div class="thumb"><img src="{{ asset('storage/assets/images/brand/4.png') }}"
                                alt="brand-image"></div>
                    </div><!-- brand-single-slide end -->
                    <div class="brand-single-slide">
                        <div class="thumb"><img src="{{ asset('storage/assets/images/brand/5.png') }}"
                                alt="brand-image"></div>
                    </div><!-- brand-single-slide end -->
                    <div class="brand-single-slide">
                        <div class="thumb"><img src="{{ asset('storage/assets/images/brand/1.png') }}"
                                alt="brand-image"></div>
                    </div><!-- brand-single-slide end -->
                    <div class="brand-single-slide">
                        <div class="thumb"><img src="{{ asset('storage/assets/images/brand/2.png') }}"
                                alt="brand-image"></div>
                    </div><!-- brand-single-slide end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand-section end -->

<!-- stay-connected-section start -->
<section class="stay-connected-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="stay-connected-wrapper">
                    <h2 class="title">Our Partner</h2>
                    <p>One advanced diverted domestic repeated bringing you old. Possible procured her trifling
                        laughter thoughts
                        property she met way. Companions shy had solicitude favourable own. Which could saw guest
                        man now heard but.
                        Lasted my coming uneasy marked so should. Gravity letters it amongst herself dearest an
                        windows by.</p>
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

<!-- team-section start -->
<section class="team-section section-padding section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">Our Management Team</h2>
                    <p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite
                        disposed me an at subjects an.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team-single-item">
                    <div class="thumb">
                        <img src="{{ asset('storage/assets/images/team/1.png') }}" alt="team-image">
                    </div>
                    <div class="content">
                        <h4 class="name">Kule Medina</h4>
                        <span class="designation">Managing Director</span>
                        <ul class="d-flex justify-content-center">
                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- team-single-item end -->
            <div class="col-lg-3 col-md-6">
                <div class="team-single-item">
                    <div class="thumb">
                        <img src="{{ asset('storage/assets/images/team/2.png') }}" alt="team-image">
                    </div>
                    <div class="content">
                        <h4 class="name">Ann Zink</h4>
                        <span class="designation">Web Developer</span>
                        <ul class="d-flex justify-content-center">
                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- team-single-item end -->
            <div class="col-lg-3 col-md-6">
                <div class="team-single-item">
                    <div class="thumb">
                        <img src="{{ asset('storage/assets/images/team/3.png') }}" alt="team-image">
                    </div>
                    <div class="content">
                        <h4 class="name">Harold Glenn</h4>
                        <span class="designation">App Developer</span>
                        <ul class="d-flex justify-content-center">
                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- team-single-item end -->
            <div class="col-lg-3 col-md-6">
                <div class="team-single-item">
                    <div class="thumb">
                        <img src="{{ asset('storage/assets/images/team/4.png') }}" alt="team-image">
                    </div>
                    <div class="content">
                        <h4 class="name">Fahad Bin Faiz</h4>
                        <span class="designation">Front-end engineer</span>
                        <ul class="d-flex justify-content-center">
                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- team-single-item end -->
        </div>
    </div>
</section>
<!-- team-section end -->

@endsection
