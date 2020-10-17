@extends('layouts.admin')

@section('content')

               <!-- Main content -->
               <section class="content">

    


<div class="card">
  
    
  <div class="card-header">
    <div class="">
      @include('flash::message')
    </div>
  <h1 class="card-title" style="font-size:35px;">  منتجات عرض " {{$offer->name}} "</h1>
  </div>
           
     

  <div class="card-body col-md-12">



    

    @if(count($records))

      <div class="table-responsive text-center">
        <table class="table table-bordered">

          <thead>
            <tr>        
              <th>#</th>
              <th> رقم القطعه</th>
              <th>الاسم</th>
              <th>القسم</th>
              <th>السعر</th>
              @if ($offer->sort == 'temporary')

              <th> اقصي كمية للشراءها</th> 
              
              @endif
              
              <th>الكميه</th>
              <th>الماركة</th>
              <th>تعديل</th>
              <th>حذف</th>
        
            </tr>
          </thead>

          <tbody>
            @foreach($records as $record)
  
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{optional($record)->part_number}}</td>
                <td>{{optional($record)->name}}</td>
                <td>{{optional($record->category)->name}}</td>
                <td>{{optional($record)->price	}}</td>
                @if ($offer->sort == 'temporary')
                <td>{{$record->max_qun}}</td> 
                @endif
                <td>{{optional($record)->quantity	}}</td>

              
                <td>{{optional($record->type)->name}}</td>

                <td><a href="{{url(route('product.edit',$record->id))}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
 
                
                
                <td class="text-center">
                    <div class="control-group">
                        {!! Form::open([
                            'action'=> ['Admin\OffertempController@destroy',$record->id],
                            'method'=>'delete',

                                ]) !!}
                        <button type="submit" onclick="return confirm('هل تريد الحذف')" class="btn btn-danger model-danger"><i class="fa fa-trash" aria-hidden="true"></i>
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
<script type="text/javascript">
  $('.categoryList').on('click', function(){
  var cat_id = $(this).attr('value');
  var url = "";
  $.ajax({
      type: "GET",
      url: url,
      dataType: "JSON",
      success: function(res)
      {
        // amusing res = {"3":"home","4":"home duplex"}; 
        var html = "";
        $.each(res, function (key, value) {
             html += "<option value="+key+">"+value+"</option>";
        });
        $("#subcategory").html(html);
      }
  });
});
</script>

@endsection



