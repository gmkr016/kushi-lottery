@extends('frontend.templates.layout')
@section('content')
    <!-- ==========Breadcrumb-Section========== -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="content">
                <h2 class="title">
                    FAQ
                </h2>
                <ul class="breadcrumb-list extra-padding">
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Breadcrumb-Section========== -->

    <!-- ==========faq-Section========== -->
    <section class="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-box">
                        <div class="section-header">
                            <h2 class="title ep">
                                Asked Questions
                            </h2>
                            <p class="text">
                                Do not hesitate to send us an email if you can't find what you're looking for.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="faq-menu">
                                    <ul>
                                        <li>
                                            <a href="#aboutfaq" class="active">
                                                <i class="fas fa-chevron-right"></i> About Khushi Lottery
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#bankingfaq">
                                                <i class="fas fa-chevron-right"></i> Banking
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#winingfaq">
                                                <i class="fas fa-chevron-right"></i> Wining
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#securityfaq">
                                                <i class="fas fa-chevron-right"></i> Security
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="faq-collaps-box">
                                    <h4 class="title">About Khushi Lottery</h4>
                                    <div class="accordion" id="aboutfaq">
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left" data-toggle="collapse" data-target="#one"
                                                            aria-expanded="true" aria-controls="one">
                                                        What is Khushi Lottery.com ?
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="one" class="collapse show" data-parent="#aboutfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left collapsed" data-toggle="collapse"
                                                            data-target="#two" aria-expanded="false" aria-controls="two">
                                                        How do I create an account?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="two" class="collapse" data-parent="#aboutfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left collapsed" data-toggle="collapse"
                                                            data-target="#three" aria-expanded="false"
                                                            aria-controls="three">
                                                        Can I play any lottery on the site?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="three" class="collapse" data-parent="#aboutfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-collaps-box">
                                    <h4 class="title">Banking</h4>
                                    <div class="accordion" id="bankingfaq">
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left" data-toggle="collapse" data-target="#four"
                                                            aria-expanded="true" aria-controls="four">
                                                        What is Khushi Lottery.com ?
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="four" class="collapse show" data-parent="#bankingfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                    accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non
                                                    cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                    eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left collapsed" data-toggle="collapse"
                                                            data-target="#five" aria-expanded="false" aria-controls="five">
                                                        How do I create an account?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="five" class="collapse" data-parent="#bankingfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                    accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non
                                                    cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                    eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left collapsed" data-toggle="collapse"
                                                            data-target="#six" aria-expanded="false" aria-controls="six">
                                                        Can I play any lottery on the site?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="six" class="collapse" data-parent="#bankingfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                    accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non
                                                    cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                    eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-collaps-box">
                                    <h4 class="title">Winning</h4>
                                    <div class="accordion" id="winingfaq">
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left" data-toggle="collapse"
                                                            data-target="#seven" aria-expanded="true" aria-controls="seven">
                                                        What is Khushi Lottery.com ?
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="seven" class="collapse show" data-parent="#winingfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                    accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non
                                                    cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                    eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left collapsed" data-toggle="collapse"
                                                            data-target="#eight" aria-expanded="false"
                                                            aria-controls="eight">
                                                        How do I create an account?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="eight" class="collapse" data-parent="#winingfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                    accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non
                                                    cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                    eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left collapsed" data-toggle="collapse"
                                                            data-target="#nine" aria-expanded="false" aria-controls="nine">
                                                        Can I play any lottery on the site?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="nine" class="collapse" data-parent="#winingfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                    accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non
                                                    cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                    eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-collaps-box">
                                    <h4 class="title">Security</h4>
                                    <div class="accordion" id="securityfaq">
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left" data-toggle="collapse" data-target="#ten"
                                                            aria-expanded="true" aria-controls="ten">
                                                        What is Khushi Lottery.com ?
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="ten" class="collapse show" data-parent="#securityfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                    accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non
                                                    cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                    eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left collapsed" data-toggle="collapse"
                                                            data-target="#eleven" aria-expanded="false"
                                                            aria-controls="eleven">
                                                        How do I create an account?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="eleven" class="collapse" data-parent="#securityfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                    accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non
                                                    cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                    eiusmod.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mycard">
                                            <div class="mycard-header">
                                                <h2 class="mb-0">
                                                    <button class="text-left collapsed" data-toggle="collapse"
                                                            data-target="#twelve" aria-expanded="false"
                                                            aria-controls="twelve">
                                                        Can I play any lottery on the site?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="twelve" class="collapse" data-parent="#securityfaq">
                                                <div class="mycard-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                    accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non
                                                    cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                    eiusmod.
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
        </div>
    </section>
    <!-- ==========faq-Section========== -->
@endsection
