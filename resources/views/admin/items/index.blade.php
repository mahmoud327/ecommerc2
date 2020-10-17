@extends('layouts.admin')

@section('content')

<section class="content">

  <div class="card-header mt-2">
    
    
    @include('flash::message')          
      
       
        <form class="form-inline" action="{{ route('search.item') }}" method="GET">
         
          <div class="form-group mx-sm-3 mb-2">
            <span style="font-size:30px;color:#000"> المنتجات</span>
            
            <input type="text" class="form-control ml-5" name="query" id="query" 
             placeholder="" value="{{ request()->input('query') }}" required>

             
          </div>
          <button type="submit" class="btn btn-primary mb-2 ">بحث</button>
          {{-- <a href="" class="btn btn-primary">الأكثر مبيعا</a> --}}
        </form> 
               

  </div>    


  <div class="card">
  
    


    <div class="container">
      

    <div class="text-center">



      <div class="head row ml-1">





        <a href=" {{url(route('template_item_export')) }}" class="btn btn-primary text-center">
          <i class="fas fas-plus"></i>ملف جاهز
        </a>
          
        <br>        
       <span>  </span>

        <form action="{{route('import_item')}}" method="post" enctype="multipart/form-data" class="left form-file pl-2">
                        
          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary text-center">رفع ملف</button>

          <input type="file" name="import_file" id="file">
          
          

        </form>
                  

       </div>
          

                 

                 
     
    </div>
  
  </div>



  <div class="card-body col-md-12">



    

    @if(count($records))

 <div class="text-center">                     
                          
     </div>
      <div class="table-responsive text-center">
        <table class="table table-bordered">

          <thead>
            <tr>        
              <th>#</th>
              <th>الاسم</th>
              <th>رقم التسلسلي</th>
              <th>القسم</th>

              <th>الكمية</th>
              
              <th> تعديل</th>
              <th> حذف</th>
         
        



              
            </tr>
          </thead>

          <tbody>
            @foreach($records as $record)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{optional($record)->name}}</td>  
                  

                <td>{{optional($record)->type_number}}</td>
                <td>{{optional($record->category)->name}}</td>

          

                <td>{{optional($record)->quantity}}</td>


                
                <td class="text-center">
                 <a href=" {{url(route('item.edit',$record->id))}}"  
                    class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                 </a>
                                
                                                

                 </td>
                <td class="text-center">
                    <div class="control-group">
                        {!! Form::open([
                            'action'=> ['Admin\ItemController@destroy',$record->id],
                            'method'=>'delete',

                                ]) !!}
                        <button type="submit" onclick="return confirm('هل تريد الحذف')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
</button>
                        {!! Form::close() !!}
                    </div>
                </td>

                                                  


                                             </th>


              
            
                
                  
         

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

</section>

<!-- /.content -->

@endsection
@section('scripts')


@endsection



