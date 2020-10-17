  

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
                          <a href=" {{url(route('template_permanent_export')) }}"  
                          class="btn btn-primary text-center">
                              <i class="fas fas-plus"></i>ملف جاهز
                          </a>
                         </div>   
                            
                        <form action="{{route('import_permanent')}}" method="post" enctype="multipart/form-data" class="text-center mt-4">
                          {{ csrf_field() }}
                           <input type="file" name="import_file" id="file">
                           <button type="submit" class="btn btn-primary text-center">رفع ملف</button>
        
                        </form>
                        
                        <div class="text-center">                     
                          <form action="{{ route('per.search') }}" method="GET">
                          
                            <input type="text" name="query" id="query" 
                            value="{{ request()->input('query') }}" 
                            class=""required>
                          </form>                 
                        </div>

                        
                <div class="card-body col-md-12">
                
                
                
                
                
                  
                  <div class="table-responsive text-center">
                    <table class="table table-bordered">
                      @if(count($records))
                
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
                                    'action'=> ['Admin\OfferpermanentController@destroy',$record->id],
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
                