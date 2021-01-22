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
        <!-- ==========Results-Section========== -->
        <div class="check-number result-page">
            <div class="container">
                @include('inc.check-number')
            </div>
        </div>
        <div class="lottery-result result-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
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
                                                <span class="plus">+</span>
                                                <span>87</span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span>Est. Jackpot</span>
                                            <h6>@convert($cat->estprize) Win NPR </h6>
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
                                        <h6>@convert($cat->estprize) Win NPR </h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <div class="text-center">
                            <a class="view-all" href="#">Load more </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
