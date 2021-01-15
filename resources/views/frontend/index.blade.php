@extends('frontend.templates.layout')
@section('content')
<!-- Login Area -->
    <!-- ==========Header-Section========== -->

    <!-- ==========Banner-Section========== -->
    <section class="banner-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="banner-subtitle">Khushi Lottery </p>
                    <h1 class="banner-title">
                        Winning Number
                    </h1>
                    <div class="winningNumbers">
                        <span>11</span>
                        <span>88</span>
                        <span>23</span>
                        <span>9</span>
                        <span>19</span>
                        <span>26</span>
                        <span>87</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->
    <!-- ==========Draw-Section========== -->
    <section class="draw-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="draw-slider owl-carousel">
                        <div class="item">
                            <div class="single-draw">
                                <div class="icon">
                                    <img src="{{ asset('storage/assets/newimages/d1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-draw">

                                <div class="icon">
                                    <img src="{{ asset('storage/assets/newimages/d2.png') }}" alt="">
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="single-draw">

                                <div class="icon">
                                    <img src="{{ asset('storage/assets/newimages/d3.png') }}" alt="">
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="single-draw">

                                <div class="icon">
                                    <img src="{{ asset('storage/assets/newimages/d4.png') }}" alt="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Feature-Section========== -->
    <!-- ==========Features-Section========== -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="icon">
                            <img src="{{ asset('storage/assets/newimages/f1.png') }}" alt="">
                        </div>
                        <h4 class="title">Trust</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="icon">
                            <img src="{{ asset('storage/assets/newimages/f2.png') }}" alt="">
                        </div>
                        <h4 class="title">Safe & Security</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="icon">
                            <img src="{{ asset('storage/assets/newimages/f3.png') }}" alt="">
                        </div>
                        <h4 class="title">Zero commission</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="icon">
                            <img src="{{ asset('storage/assets/newimages/f4.png') }}" alt="">
                        </div>
                        <h4 class="title">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Features-Section========== -->
    <!-- ==========Lottery-Result-Section========== -->
    <section class="lottery-result">
        <img class="bg-image" src="{{ asset('storage/assets/newimages/result-background.jpg') }}" alt="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="content">
                        <div class="section-header">
                            <h2 class="title">
                                Latest Lottery results
                            </h2>
                            <p class="text">
                                Check Your lotto online, find all the lotto winning numbers and see
                                if you won the latest lotto jackpots
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="result-box">
                        <h4 class="box-header">Lottery Winning Numbers</h4>
                        <div class="result-list">
                            @foreach($lcat->splice(0, 5)->sortByDesc('draw_date') as $cat)
                            <div class="single-list">
                                <div class="light-area">
                                    <div class="light-area-top">
                                        <div class="left">
                                            <h4>{{$cat->title}}</h4>
                                        </div>
                                        <div class="right">
                                            <span>Draw took place on</span>
                                            <h6>{{gmdate("l F j, Y", $cat->draw_date)}}</h6>
                                        </div>
                                    </div>
                                    <div class="light-area-bottom">
                                        <div class="left">
                                            <p>Winning Numbers:</p>
                                            <div class="numbers">
                                                <span>11</span>
                                                <span>88</span>
                                                <span>23</span>
                                                <span>9</span>
                                                <span>19</span>
                                                <span>26</span>
                                                <span>87</span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span>Est. Jackpot</span>
                                            <h6>{{$cat->estprize}} Win NPR </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="color-area">
                                    <div class="top">
                                        <span>Next Draw</span>
                                        <h6>{{$nextDraw}}</h6>
                                    </div>
                                    <div class="bottom">
                                        <span>Est. Jackpot </span>
                                        <h6>{{$cat->estprize}} Win NPR </h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <div class="text-center">
                            <a class="view-all" href="#">View All Result ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Lottery-Result-Section========== -->

    <!-- ==========Check-Number-Section========== -->
    <section class="check-number">
        <img class="img-left" src="{{ asset('storage/assets/newimages/check-num-left.png') }}" alt="">
        <img class="img-right" src="{{ asset('storage/assets/newimages/check-num-right.png') }}" alt="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="content">
                        <div class="section-header">
                            <h2 class="title">
                                Check your numbers
                            </h2>
                            <p class="text">
                                Are you holding on to a winning ticket? Here's an
                                easy way to find out.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="check-box">
                        <h4 class="title">1. Select a Game</h4>
                        <div class="form-area">
                            <select>
                                <option value="#">Power Ball</option>
                                <option value="#">Megamillions</option>
                                <option value="#">Euromillions</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="check-box">
                        <h4 class="title">2. Pick a Date</h4>
                        <div class="form-area">
                            <input type="date">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="check-box">
                        <h4 class="title">3. Enter Your Number</h4>
                        <div class="form-area input-round-wrapper">
                            <input type="text" class="input-round">
                            <input type="text" class="input-round">
                            <input type="text" class="input-round">
                            <input type="text" class="input-round">
                            <input type="text" class="input-round">
                            <input type="text" class="input-round">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Check-Number-Section========== -->
@endsection
