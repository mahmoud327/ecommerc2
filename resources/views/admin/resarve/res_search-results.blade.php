



@extends('layouts.admin')

@section('content')

 <section class="content">

<div class="card">
  
    

  

  <div class="card-header mt-2">
    
    
    @include('flash::message')          
      
    <span style="font-size:30px;color:#000"> ناتج البحث</span>
        

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
              <th> تنزيل الحجز </th>
              <th>حذف </th>
            </tr>
          </thead>

          <tbody>
            @foreach($records as $record)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{optional($record->client->first())->shop_name}}</td>
                <td>{{optional($record->client->first())->responsible_name}}</td>
                <td>{{optional($record->client->first())->delegate_name}}</td>
                <td>{{optional($record->client->first())->phone}}</td>
                <td>{{optional($record->client->first())->email}}</td>
            
                <td><a href="" download=""> <li class="fa fa-edit"></li> </a></td>                
             
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






