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
      <h1 class="card-title" style="font-size:35px;">تعديل  البيانات</h1>
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
        'action' => ['AuthController@editProfileAdminUpdate'],
        'method' => 'post',


        ]) !!}

      <div class="form-group">
        <label for="name">اسم البريد الإلكتروني</label>
        {!! Form::text('email',null,[
          'class' => 'form-control'
        ]) !!}

      </div>


      <br>
      <div class="form-group">
        <label for="name">اسم المستخدم </label>
        {!! Form::text('username',null,[
          'class' => 'form-control'
        ]) !!}

      </div>

      <br>
      <div class="form-group">
        <button type="submit" class="btn btn-primary"> تعديل </button>
      </div>



      {!! Form::close() !!}


    </div>
    <!-- /.card-body -->

  </div>
  <!-- /.card -->

</section>
<!-- /.content -->

@endsection
