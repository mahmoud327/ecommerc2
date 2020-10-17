@extends('layouts.admin')

@section('content')




<section class="content">
  <div class="card-header">
    <h3 class="card-title" style="font-size:30px;color:#000"> الماركات</h3>

  </div>
  <div class="card">
    
  
    <div class="ml-2">
      <a href="{{url(route('type.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i> انشاء ماركة جديد</a>
    </div>     

      <br>
      <div>
      @include('flash::message')          
    </div>  
     
    <div class="card-body col-md-12">
  
  
  
    
  
      @if(count($records))
     
  
        <div class="table-responsive text-center">
          <table class="table table-bordered">
  
            <thead>
              <tr>        
                <th>#</th>
                <th> اسم الماركة</th>
                <th>تعديل</th>
                <th>حذف </th>
              </tr>
            </thead>
  
            <tbody>
              @foreach($records as $record)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$record->name}}</td>
                  <td><a href="{{url(route('type.edit',$record->id))}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                  
                  <td class="text-center">
                      <div class="control-group">
                          {!! Form::open([
                              'action'=> ['Admin\TypeController@destroy',$record->id],
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



