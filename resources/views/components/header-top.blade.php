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
                                <h6>
                                    {{$totalSale}}
                                </h6>
                            </div>
                        </div>
                        <div class="next-draw">
                            <span class="text">Draw At</span>
                            <div class="time">

                                <h6 class="time-countdown" data-countdown={{$game->endDate}}></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
