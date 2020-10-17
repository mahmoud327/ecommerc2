@extends('layouts.admin')

@section('content')


<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h1 class="card-title" style="font-size:35px;">انشاء ماركة جديدة</h1>
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


      @inject('model','App\Models\Type')
      {!! Form::model($model, [
        'action' => 'Admin\TypeController@store'
        ]) !!}

      <div class="form-group">
        <label for="name">اسم الماركة</label>
        {!! Form::text('name',null,[
          'class' => 'form-control'
        ]) !!}

      </div>

   
      <div class="form-group">
        <button type="submit" class="btn btn-primary">حفظ</button>
      </div>



      {!! Form::close() !!}


    </div>
    <!-- /.card-body -->

  </div>
  <!-- /.card -->

</section>
<!-- /.content -->

@endsection
