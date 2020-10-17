@extends('layouts.admin')

@section('content')      
    


    <!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
            <div class="card-header">
            
              @include('errors.valdation')

            </div>

            <div class="text-center">

              <h1>العروض المؤقتة</h1>
            </div>

          
            <div class="mb-3"> 

              <a href=" {{url(route('template_temporary_export')) }}"  
                    class="btn btn-primary mt-2">
                        <i class="fas fas-plus"></i>ملف جاهز
                 </a>
              <form action="{{route('import_temporary')}}" method="post" enctype="multipart/form-data" class="text-right">
                    
                {{ csrf_field() }}
               <input type="file" name="import_file" id="file">
               <button type="submit" class="btn btn-primary text-center">رفع ملف</button>

            </form>

            @if(count($records))
          <div class="text-center">                     
            <form action="{{ route('temp.search') }}" method="GET">

                <input type="text" name="query" id="query" 
                value="{{ request()->input('query') }}" 
                class=""required>
              </form>                 
          </div>
            </div>
          
<div class="card-body col-md-12">





  
  <div class="table-responsive text-center">
    <table class="table table-bordered">

      <thead>
        <tr>        
          <th>#</th>
          <th>الاسم</th>
          <th>رقم القطعه </th>
          <th>الكمية</th>
          <th>السعر</th>
          <th>الماركه</th>
          <th>تعديل</th>
          <th>حذف</th>


          
          
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
            <td>{{optional($record)->sort}}</td>



            
       
        
            <td class="text-center">
         <a href=" {{url(route('offertempory.edit',$record->id))}}"  
            class="btn btn-primary">
                <i class="fas fa-edit"></i>
         </a>
                        
                                        

         </td>
        <td class="text-center">
            <div class="control-group">
                {!! Form::open([
                    'action'=> ['Admin\OffertemporyController@destroy',$record->id],
                    'method'=>'delete',

                        ]) !!}
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
               </button>
                {!! Form::close() !!}
            </div>
        </td>


            
        
            
              
              
              {!! Form::close() !!}

          </tr>
        @endforeach
      </tbody>

    </table>

  </div>
  <div class="text-center "> 
    
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


<!-- /.content -->

@endsection
