@extends('client.layouts.layouts')

@section('content')
    


                <!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      
        

      <div class="card-header">
        <h2 class="text-right">نتائج البحث</h2>
        
        

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
