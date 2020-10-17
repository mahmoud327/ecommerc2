@extends('client.layouts.layouts')

@section('content')

  <!--Main layout-->
  <main>
    <div class="container">


      <div class="cart-content">

        <h2 class="text-right">الحجزات</h2>
        <!--Body-->
        <div class="cart-body">
          {{-- @include('flash::message') --}}

          {{Cart::instance('saveForLater')->count()}}
          {{-- <a href="{{route('cart.empty')}}">حذف السلة</a> --}}
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>اسم المنتج</th>
                <th>السعر</th>
                <th>الكمية</th>
                <th>االعلامة التجارية</th>
                <th>حذف</th>
              </tr>
            </thead>
            <tbody>

              @if (Cart::instance('saveForLater')->count() > 0)
                  
              @foreach (Cart::instance('saveForLater')->content() as $item)
              
              
              


              <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->model->name}}</td>
                <td>{{$item->model->price}}</td>

                <td>


                  <form class="quantity" id="form-quantity" >

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input class="inp" type="number" value="{{$item->qty}}"  id=" {{$item->rowId}}" name="quantity" min="1" 

                      

                      
                    @if ( ($item->model->offer->sort) == 'temporary' )

                        
                      max="{{($item->model->max_qun) }}"
                  

                    {{-- @elseif( ($item->model->offer->sort) == 'temporary' &&  ( $item->model->quantity <= $item->model->max_qun ) )
                    
                      max="{{$item->model->quantity}}" --}}

                     
                     
                    @endif
                    >
                    
                  </form>

                </td>

                <td>
                  {{optional($item->model->type)->name}}
                </td>

                <td>

                  <form action="{{ route('reservation.destroy', $item->rowId)}}" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit ">
                        <i class="fas fa-eraser"></i>
                    </button>
                  </form>

                </td>

                
              </tr>
              @endforeach

              @else
               <tr><td>لا توجد بيانات</td></tr> 
              @endif


      
            </tbody>
          </table>
        
        
        
      </div>


     

      @if (Cart::instance('saveForLater')->count())
        <div class="button mt-5" >
          
          <a href="{{route('new_reservation')}}" class="btn btn-primary cart"> حجز </a>
        </div>
      @endif
    </div>
  </main>

  <!--Main layout-->


@endsection


@push('script')

<script>
  $(function(){
    
var quantity = $('.quantity');

var qunVal  = $('.quantity .inp').val();
// var route = $('#form-quantity').data('route');

$('#form-quantity .inp').on("change", function(e){
  var rowId = $(this).attr('id');

  qunVal = $(this).val();


  e.preventDefault();
  
  $.ajax({

    type: 'post',
    url:  "/reservation/update" ,
    data:{

      '_token': "{{csrf_token()}}",
      id:rowId,
      quantity:qunVal
    },

    success: function(data)
    {      
      console.log('ffffff');
    }    

});

});

}); 
</script>



@endpush