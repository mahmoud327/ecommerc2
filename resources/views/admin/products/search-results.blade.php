@extends('layouts.admin')



@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

   

    <div class="search-results-container container">
        <h1 class="text-center">ناتج البحث</h1>

  
        @if(count($records))

<div class="table-responsive text-center">
  <table class="table table-bordered">

    <thead>
      <tr>        
        <th>#</th>
        <th>الاسم</th>
        <th>الكميه</th>
        <th>رقم القطعه</th>
        <th>القسم </th>
        <th>النوع</th>
        <th> تعديل</th>
        <th> حذف</th>
      </tr>
    </thead>

    <tbody>
      @foreach($records as $record)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{optional($record)->name}}</td>  
          <td>{{optional($record)->quantity}}</td>
          <td>{{optional($record)->type_number}}</td>
          <td>{{optional($record->category)->name}}</td>
          <td>{{optional($record->type)->name}}</td>


    



          
          <td class="text-center">
           <a href=" {{url(route('item.edit',$record->id))}}"  
              class="btn btn-primary">
                  <i class="fas fas-edit"></i>
           </a>
                          
                                          

           </td>
          <td class="text-center">
              <div class="control-group">
                  {!! Form::open([
                      'action'=> ['Admin\ItemController@destroy',$record->id],
                      'method'=>'delete',

                          ]) !!}
                  <button type="submit" onclick="return confirm('هل تريد الحذف')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
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





