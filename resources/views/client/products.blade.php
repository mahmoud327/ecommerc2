@extends('client.layouts.layouts')

@section('content')
    


                <!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      
        

      <div class="card-header">
       
        <form class="form-inline" action="{{route('products.client.search' ) }}" method="GET">
         
        <input type="hidden" name="offer" value="{{$idoffer}}">
          <div class="form-group mx-sm-3 mb-2 ">
            <span style="font-size:30px;color:#000"> المنتجات</span>
            
            <input type="text" class="form-control mr-2" name="query" id="query" 
             placeholder="يمكنك البحث بأي شيئ"  >
  
             <input type="text" class="form-control mr-2" name="price" id="query" 
             placeholder="المنتجات أقل من" >
          </div>
          <button type="submit" class="btn btn-primary mb-2 ">بحث</button>
          {{-- <a href="" class="btn btn-primary">الأكثر مبيعا</a> --}}
        </form> 
        

      </div>

      
             
      <div class="card-body col-md-12">
  
  
  
        @include('flash::message')
  
        @if(count($records))
  
          <div class="table-responsive text-center">

            <table class="table table-bordered">
  
              <thead>
                <tr>        
                  <th>#</th>
                  <th>الاسم</th>
                  <th>رقم القطعة</th>
                  <th>الكمية</th>
                  <th>السعر</th>
                  <th>العلامة التجارية</th>
                  <th>القسم </th>

                  <th><i class="fas fa-shopping-cart"></i></th>
                  
                </tr>
              </thead>
  
              <tbody>
                @foreach($records as $record)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{optional($record)->name}}</td>                    
                    <td>{{optional($record)->part_number}}</td>
                    <td>{{optional($record)->quantity}}</td>
                    <td>{{optional($record)->price}}</td>                    
                    <td>{{optional($record->type)->name}}</td>
                    <td>{{optional($record->category)->name}}</td>
                    <td class="text-center">
                     
                        @if ($record->quantity > 0)
                        <form action="{{ route('cart.store') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$record->id}}">
                            <input type="hidden" name="name" value="{{$record->name}}">
                            <input type="hidden" name="price" value="{{$record->price}}">
                            <button class="btn btn-primary" type="submit">شراء</button>
                        </form>
                        @else
                        <form action="{{ route('reservation.store') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$record->id}}">
                            <input type="hidden" name="name" value="{{$record->name}}">
                            <input type="hidden" name="price" value="{{$record->price}}">
                            <button class="btn btn-primary" type="submit">حجز</button>
                          </form>
                        @endif
                      
                    </td>
                                          
                      {!! Form::close() !!}
  
                  </tr>
                @endforeach
              </tbody>
  
            </table>
  
          </div>
  
        @else
  
          <div class="alert text-center" role="alert">
            لا توجد بيانات
          </div>
  
        @endif
  
  
      </div>
      <!-- /.card-body -->
  
    </div>
    <!-- /.card -->
  
  </section>
  <!-- /.content -->

@endsection
