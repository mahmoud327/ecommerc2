@extends('layouts.admin')

@section('content')


<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="">
      @include('flash::message')
    </div>
    <div class="card-header">
      <h1 class="card-title" style="font-size:35px;">تعديل العرض</h1>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif



      {!! Form::model($model, [
        'action' => ['Admin\OfferController@update',$model->id],
        'method' => 'put',
        'files' => 'true'
        ]) !!}

      <div class="form-group">
        <label for="name">اسم العرض</label>
        {!! Form::text('name',null,[
          'class' => 'form-control'
        ]) !!}

      </div>

    <div class="form-group">
        <label>صورة العرض</label>
        <br>
        {!! Form::file('image',null,[
          'class' => 'form-control'
        ]) !!}
    </div>


    @if($model->sort == "temporary")

      <div class="form-group date">
        <label for="">تاريخ انتهاء العرض</label>
        <br>
        {{ Form::date('deadline',null,['class' => 'form-control']) }}
      </div>

    @endif

        <div class="form-group date">

        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">تعديل</button>
        </div>
      {!! Form::close() !!}


    </div>
    <!-- /.card-body -->

  </div>
  <!-- /.card -->

</section>
<!-- /.content -->




@endsection
