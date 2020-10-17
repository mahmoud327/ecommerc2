@extends('layouts.admin')

@section('content')







<section>
    <div class="app-content content" style="height: 620px">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body mt-5">

                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">


                                            <h4>الاكثر مبيعا</h4>
                                            @if (count(App\Models\Item::get()))
                                            <h6 class="text-muted">{{App\Models\Item::orderBy('ord_coun', 'desc')->first()->name}}</h6>

                                            @endif
                                        </div>
                                        <div class="col-5 text-right">
                                        @if (App\Models\Item::first())
                                            <h4>{{App\Models\Item::orderBy('ord_coun', 'desc')->first()->ord_coun}}</h4>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>الاكثر حجزا</h4>

                                            @if (App\Models\Item::first())
                                            
                                            <h6 class="text-muted">{{App\Models\Item::orderBy('res_coun', 'desc')->first()->name}}</h6>
    
                                            @endif
                                        </div>
                                        <div class="col-5 text-right">
                                        @if (App\Models\Item::first())
                                            <h4>{{App\Models\Item::orderBy('res_coun', 'desc')->first()->res_coun}}</h4>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="fa fa-user font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>العميل المميز</h4>
                                    @if (count(App\Models\Client::get()))
                                        <h6 class="text-muted">{{App\Models\Client::orderBy('ord_coun', 'desc')->first()->username}}</h6>

                                    @endif
                                    </div>
                                    <div class="col-5 text-right">

                                    @if (count(App\Models\Client::get()) && count(App\Models\Item::get()))

                                        <h4>{{App\Models\Client::orderBy('ord_coun', 'desc')->first()->ord_coun}}</h4>
                                    
                                    </div>
                                    @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Candlestick Multi Level Control Chart -->

            </div>
        </div>
    </div>
</section>
@endsection
