@extends('layouts.admin')

@section('content')

 <section class="content">

<div class="card">
  
    

  

  <div class="card-header mt-2">
    
    
    @include('flash::message')          
      
      <span style="font-size:30px;color:#000">  العملاء الأكثر شراء</span>
             

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
              <th>  عدد المنتجات التي تم شراؤها</th>
              

         
        



              
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
                <td>{{optional($record)->ord_coun}}</td>
                
                




                
             
               


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
