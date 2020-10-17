@extends('layouts.admin')

@section('content')
@inject('type','App\Models\Type')


    <!-- Main content -->
    <section class="content">
        <div class="row">


        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">تعديل العروض الدائمه</h3>

                
            </div>
            <div class="card-body">
                {!!  Form::model($model,

                 ['action' =>['Admin\ItemController@update',$model->id],
                 'method'=>'put',
                 ]) !!}
                @include('errors.valdation');
              
      
                <div class="control-group">
                    <label for="form">الاسم</label>
                    {!! Form::text('name',null,[
                        'class'=>'form-control'

                  ]) !!}

       

                  </div>
                  <br>
                  <div class="control-group">
                    <label for="form">الكميه</label>
                    {!! Form::text('quantity',null,[
                        'class'=>'form-control'

                  ]) !!}
                  

       

                  </div>
                  <br>
                  <div class="control-group">
                    <label for="form">الرقم</label>
                    {!! Form::text('type_number',null,[
                        'class'=>'form-control'

                  ]) !!}
                  

       

                  </div>
                  <br>
                  <div class="control-group">
                    <label for="form">الكميه</label>
                    {!! Form::text('quantity',null,[
                        'class'=>'form-control'

                  ]) !!}
                  

       

                  </div>

                  @inject('type','App\Models\Type')
                <div class="control-group">
                    <label for="form">الماركة</label>

                    {!! Form::select('type_id', $type->pluck('name', 'id')->toArray() ,null,[
                        'class'=>'form-control'

                  ]) !!}

                  
          
                  
          

                   <br>
                   <div class="control-group">
                        <button class="btn btn-primary" type="submit">submit</button>
                    </div>
                    
                {!! Form::close() !!}

            </div>

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection














