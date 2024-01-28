@extends('frontend.templates.layout')
@section('content')
    <!-- ==========Breadcrumb-Section========== -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="content">
                <h2 class="title">
                    Ticket Information
                </h2>
                <ul class="breadcrumb-list extra-padding">
                    <li>
                        <a href="{{route('home')}}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#">View Ticket</a>
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
                    <div class="info-counter-image">
                        <img src="{{ asset('storage/assets/newimages/family-lotto.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========About-counter-Section========== -->
    <!-- ==========faq-Section========== -->
    <section style="margin-top: 1px" class="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-box">
                        <div class="section-header">
                            <h2 class="title ep">
                                Ticket Information
                            </h2>
                            <p class="text">
                                Do not hesitate to email us if you find any inconvenience.
                            </p>
                        </div>
                        <div class="row">
                            <div class="mycard-body">
                                <h4>Agent: {{$ticket['user']->name}}</h4>
                                <h4>Location: {{$ticket['user']->location}}</h4>
                                <h4>Purchase At: {{$ticket['createdAt']}}</h4>
                                <h4>Lottery Numbers: </h4>
                                @foreach($ticket['lotteryNumbers'] as $number)
                                    <div>
                                        {{$number['first']}},
                                        {{$number['second']}},
                                        {{$number['third']}},
                                        {{$number['fourth']}},
                                        {{$number['fifth']}},
                                        {{$number['sixth']}},
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========faq-Section========== -->
@endsection
