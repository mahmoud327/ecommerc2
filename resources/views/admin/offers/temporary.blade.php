@extends('layouts.admin')

@section('content')



    <!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header mt-2">
    
    
    @include('flash::message')          
      
       
        <form class="form-inline" action="{{ route('temp.search') }}" method="GET">
         
          <div class="form-group mx-sm-3 mb-2">
            <span style="font-size:30px;color:#000"> العروض المؤقتة</span>
            
            <input type="text" class="form-control ml-5" name="query" id="query" 
             placeholder="" value="{{ request()->input('query') }}" required>
          </div>
          <button type="submit" class="btn btn-primary mb-2 ">بحث</button>
        </form>        

  </div>


            @if(count($records))
            
<div class="card-body col-md-12">






  <div class="table-responsive text-center">
    <table class="table table-bordered">

      <thead>
        <tr>
          <th>#</th>
          <th>اسم العرض</th>
          <th>الصورة</th>
          <th>تاريخ انتهاء العرض</th>
          <th>تفعيل | إالغاء التعديل</th>
          <th>تفاصيل</th>
          <th>تعديل</th>
          <th>حذف</th>




        </tr>
      </thead>

      <tbody>

          @foreach($records as $record)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td class="text-center">{{$record->name}}</td>
              <td class="text-center">
                  <img src="{{asset($record->image)}}" height="60px" width="60p">
              </td>

              <td>{{$record->deadline}}</td>



              <td class="text-center">
                 @if($record->is_activated)
                     <a href="{{url(route('offer.hide',$record->id))}}"
                        class="btn btn-danger btn-xs">إلغاء التفعيل</a>
                 @else
                     <a href="{{url(route('offer.showoffer',$record->id))}}"
                        class="btn btn-success btn-sm">تفعيل</a>
                 @endif
             </td>

             <td class="text-center">
        
                  <a href="{{url(route('offer.show',$record->id))}}"
                     class="btn btn-success btn-xs">تفاصيل</a>  
            </td>
            
              <td>
                <a href="{{url(route('offer.edit',$record->id))}}" class="btn-lg"><i class="fas fa-edit"></i></a>
              </td>
              <td class="text-center">
                {!! Form::open([
                    'action' => ['Admin\OfferController@destroy',$record->id],
                    'method' => 'delete'
                  ]) !!}
                  <button type="submit" onclick="return confirm('هل تريد الحذف')" class="btn btn-outline-danger btn-lg"><i class="fa fa-trash"></i></button>
                  {!! Form::close() !!}

              </td>

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
</section>
@endsection
