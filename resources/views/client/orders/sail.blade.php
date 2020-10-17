@extends('client.layouts.layouts')

@section('content')
    


                <!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      
        

      <div class="card-header">
        <h2 class="card-title">المشتريات</h2>
  
      </div>
      <div class="card-body col-md-12">
  
  
  
        @include('flash::message')
  
        @if(count($records))
  
          <div class="table-responsive text-center">

            <table class="table table-bordered">
  
              <thead>
                <tr>        
                  <th>#</th>
                  <th>تاريخ البيع </th>
                  <th> تفاصيل الطلب </th>
                  
                </tr>
              </thead>
  
              <tbody>
                @foreach($records as $record)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$record->created_at}}</td>    
                    <td><a href="{{route('offer_export', $record->id)}}"> <li class="fa fa-edit"></li> </a></td>                
                
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
