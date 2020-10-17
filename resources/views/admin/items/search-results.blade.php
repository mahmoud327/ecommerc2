@extends('layouts.admin')

@section('content')

<section class="content">

  <div class="card-header mt-2">
    
    <span style="font-size:30px;color:#000"> ناتج البحث</span>
    @include('flash::message')          
      
          

  </div>    


  <div class="card">
  
    


    <div class="container">
      

    <div class="text-center">


          

                 

                 
     
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



