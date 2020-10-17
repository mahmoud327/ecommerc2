@extends('layouts.admin')



@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

   

    

<section class="content">

  <div class="card">
  
    <div class="card-header mt-2">
      <h1 class="text-center">ناتج البحث</h1>
    </div>
    <div class="card-body col-md-12">
  
  
  
    
  
      @if(count($records))
     
  
        <div class="table-responsive text-center">
          <table class="table table-bordered">
  
            <thead>
              <tr>        
                <th>#</th>
                <th> اسم المحل</th>
  
                <th> اسم المسئول</th>
                <th>اسم المندوب</th>
                <th>رقم التليفون</th>
                <th> البريد الالكترونى</th>
                <th> تفعيل | الغاء التفعيل</th>
                <th>حذف </th>
  
           
          
  
  
  
                
              </tr>
            </thead>
  
            <tbody>
              @foreach($records as $record)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{optional($record)->shop_name}}</td>
                  <td>{{optional($record)->responsible_name}}</td>
                  <td>{{optional($record)->delegate_name}}</td>
                  <td>{{optional($record)->phone}}</td>
                  <td>{{optional($record)->email}}</td>
                  <td class="text-center">
                    @if($record->activate)
                        <a href="{{url(route('clients.deactivate',$record->id))}}"
                           class="btn btn-danger btn-xs">إلغاء التفعيل</a>
                    @else
                        <a href="{{url(route('clients.activate',$record->id))}}"
                           class="btn btn-success btn-xs">تفعيل</a>
                    @endif
                </td>
                  
  
  
  
  
                  
               
                  <td class="text-center">
                      <div class="control-group">
                          {!! Form::open([
                              'action'=> ['Admin\ClientController@destroy',$record->id],
                              'method'=>'delete',
  
                                  ]) !!}
                          <button type="submit" class="btn btn-outline-danger btn-lg"><i class="fa fa-trash" aria-hidden="true"></i>
                          </button>
                          {!! Form::close() !!}
                      </div>
                  </td>
  
  
                </tr>
  
            
              @endforeach
  
            </tbody>
  
          </table>
        </div>
        
  
        <div class="text-center " style="margin-right: 46%;margin-top:10px; "> 
    
          <div class="text-center">{{$records->links()}} </div>
          
       
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





