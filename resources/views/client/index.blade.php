@extends('client.layouts.layouts')

@section('content')
    
    <div class="offer_buttons">
        <div class="">
            @include('flash::message')
          </div>
        <div class="container">
            <div class="row text-center mt-5">

                <div class="col-md-6">
                    <a href="{{ route('permanent_offer') }}" class="btn btn-primary btn-lg">عروض دائمة</a>
                </div>

                <div class="col-md-6">
                    <a href="{{route('temporary_offer')}}" class="btn btn-primary btn-lg">عروض مؤقتة</a>
                </div>
            </div>


            
        </div>
        </div>
    </div>


    {{-- <div class="" style="width: 500px; margin:100px auto">
        <div class="card crypto-card-3 pull-up">
            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row ">
                        <div class="col-2">
                            <h1><i class="fab fa-product-hunt font-large-2" title="BTC"></i></h1>
                        </div>
                        <div class="col-5 pl-2">


                            <h4> المنتج الاكثر مبيعا</h4>
                            @if (App\Models\Item::first())
                            
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
    </div> --}}
@endsection
