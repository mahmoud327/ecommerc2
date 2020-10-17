



@extends('layouts.admin')

@section('content')

 <section class="content">

<div class="card">
  
    

  

  <div class="card-header mt-2">
    
    
    @include('flash::message')          
      
       
        <form class="form-inline" action="{{ route('search.order') }}" method="GET">
         
          <div class="form-group mx-sm-3 mb-2">
            <span style="font-size:30px;color:#000"> المبيعات</span>
            
            <input type="text" class="form-control ml-5" name="query" id="query" 
             placeholder="" value="{{ request()->input('query') }}" required>
          </div>
          <button type="submit" class="btn btn-primary mb-2 ">بحث</button>
        </form>        

  </div>
  <div class="card-body col-md-12">



  

    @if(count($records))
   

      <div class="table-responsive text-center">
        <table class="table table-bordered">

          <thead>
            <tr>        
              <th>#</th>
              <th>تاريخ البيع </th>
              <th> اسم المحل</th>
              <th> اسم المسئول</th>
              <th>اسم المندوب</th>
              <th>رقم التليفون</th>
              <th> البريد الالكترونى</th>
              <th> تنزيل الطلب </th>
            </tr>
          </thead>

          <tbody>
            @foreach($records as $record)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$record->created_at}}</td>
                <td>{{optional($record->client->first())->shop_name}}</td>
                <td>{{optional($record->client->first())->responsible_name}}</td>
                <td>{{optional($record->client->first())->delegate_name}}</td>
                <td>{{optional($record->client->first())->phone}}</td>
                <td>{{optional($record->client->first())->email}}</td>
            
              <td><a href="{{route('offer_export', $record->id)}}"> <li class="fa fa-edit"></li> </a></td>                
             
               


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






