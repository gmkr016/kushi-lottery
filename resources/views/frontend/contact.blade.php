@extends('frontend.templates.layout')
@section('content')

<!-- contact-us-section start -->
<section class="contact-us-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">Contact With Our Team </h2>
                    <p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite disposed
                        me an at subjects an.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="contact-form-area">
                    <form action="http://brotherslab.thesoftking.com/html/lotten/demo/contact.php"
                        id="contact_form_submit" class="cmn-form message-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="frm-group">
                                    <input type="text" name="f_name" id="f_name" placeholder="Your First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="frm-group">
                                    <input type="text" name="l_name" id="l_name" placeholder="Your Last Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="frm-group">
                                    <input type="email" name="con_email" id="con_email" placeholder="Mail Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="frm-group">
                                    <input type="tel" name="phn_num" id="phn_num" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="frm-group">
                                    <textarea name="con_message" id="con_message"
                                        placeholder="Write a Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="frm-group">
                                    <button id="con_submit" type="submit" class="cmn-btn btn-lg">Post Comment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="company-address-block">
                    <h4 class="title">Our Office Address</h4>
                    <ul class="address-list">
                        <li class="address-item">
                            <div class="icon"><i class="fa fa-building"></i></div>
                            <div class="content">
                                <span>Street: Lazimpat Rd</span>
                                <span>Place: Kathmandu</span>
                                <span>County: Nepal</span>
                                <span>State: Bagmati</span>
                            </div>
                        </li>
                        <li class="address-item">
                            <div class="icon"><i class="fa fa-phone"></i></div>
                            <div class="content">
                                <span>+977-01-4444865</span>
                            </div>
                        </li>
                        <li class="address-item">
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <div class="content">
                                <span>info@crupee.org</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-us-section end -->

<!-- map-section start -->
<div class="map-section">
    <div id="map"></div>
</div>
<!-- map-section end -->

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

@endsection
