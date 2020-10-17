@extends('layouts.admin')

@section('content')

 <section class="content">

<div class="card">
  
    

  

  <div class="card-header mt-2">
    
    
    @include('flash::message')          
      {{-- <form action="{{ route('client.search') }}" method="GET">
    
          <input type="text" name="query" id="query" 
          value="{{ request()->input('query') }}" 
          class="textbox"required>
        </form>                 
      --}}
       
        <form class="form-inline" action="{{ route('client.search') }}" method="GET">
         
          <div class="form-group mx-sm-3 mb-2">
            <span style="font-size:30px;color:#000"> العملاء</span>
            
            <input type="text" class="form-control ml-5" name="query" id="query" 
             placeholder="" value="{{ request()->input('query') }}" required>
          </div>
          <button type="submit" class="btn btn-primary mb-2 ">بحث</button>
        </form>        

  </div>
  <div class="ml-2">
    <a href="{{url(route('clients.more'))}}" class="btn btn-primary"> العملاء الأكثر شراء</a>
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
                        <button type="submit" onclick="return confirm('هل تريد الحذف')" class="btn btn-outline-danger btn-lg"><i class="fa fa-trash" aria-hidden="true"></i>
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
