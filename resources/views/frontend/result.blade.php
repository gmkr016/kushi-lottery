@extends('frontend.templates.layout')
@section('content')
<!-- ==========Breadcrumb-Section========== -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="content">
                <h2 class="title">
                    Results
                </h2>
                <ul class="breadcrumb-list extra-padding">
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#">Results</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Breadcrumb-Section========== -->

    <!-- ==========Results-Section========== -->
    <section class="results">
        <div class="top-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="image">
                            <img src="{{asset('storage/assets/newimages/result.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="check-number result-page">
            <div class="container">
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
        </div>
        <div class="lottery-result result-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="result-list">
                            <div class="single-list">
                                <div class="light-area">
                                    <div class="light-area-top">
                                        <div class="left">
                                            <h4>Powerball</h4>
                                        </div>
                                        <div class="right">
                                            <span>Draw took place on</span>
                                            <h6>Saturday April 20, 2020</h6>
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
                                            <h6>$116 M Win BTC</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="color-area">
                                    <div class="top">
                                        <span>Next Draw</span>
                                        <h6>Wed, Oct 28, 2020</h6>
                                    </div>
                                    <div class="bottom">
                                        <span>Est. Jackpot </span>
                                        <h6>$116 M Win BTC</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="single-list">
                                <div class="light-area">
                                    <div class="light-area-top">
                                        <div class="left">
                                            <h4>Megamillions</h4>
                                        </div>
                                        <div class="right">
                                            <span>Draw took place on</span>
                                            <h6>Saturday April 20, 2020</h6>
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
                                            <h6>$116 M Win BTC</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="color-area">
                                    <div class="top">
                                        <span>Next Draw</span>
                                        <h6>Wed, Oct 28, 2020</h6>
                                    </div>
                                    <div class="bottom">
                                        <span>Est. Jackpot </span>
                                        <h6>$116 M Win BTC</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="single-list">
                                <div class="light-area">
                                    <div class="light-area-top">
                                        <div class="left">
                                            <h4>Euromillions</h4>
                                        </div>
                                        <div class="right">
                                            <span>Draw took place on</span>
                                            <h6>Saturday April 20, 2020</h6>
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
                                            <h6>$116 M Win BTC</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="color-area">
                                    <div class="top">
                                        <span>Next Draw</span>
                                        <h6>Wed, Oct 28, 2020</h6>
                                    </div>
                                    <div class="bottom">
                                        <span>Est. Jackpot </span>
                                        <h6>$116 M Win BTC</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="view-all" href="#">Load more </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Results-Section========== -->

@endsection
