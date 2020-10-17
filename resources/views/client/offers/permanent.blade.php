@extends('client.layouts.layouts')

@section('content')
    


                <!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      
        

      <div class="card-header">
        <a href="{{route('temporary_offer')}}" class="btn btn-primary"> العروض المؤقتة</a>
        <h2 class="card-title">العروض الدائمة</h2>
  
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
                  <th>الصورة</th>
                  <th>التفاصيل</th>
                  
                </tr>
              </thead>
  
              <tbody>
                @foreach($records as $record)
                @if ( $record->is_activated ==1 )
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{optional($record)->name}}</td>  
                    <td>
                      <img src="{{asset($record->image)}}" width="100px"  >
                    </td>  

                    <td> <a href="{{route('products', $record->id)}}" class="btn btn-primary">التفاصيل</a>  </td>
                
                 @endif     
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
