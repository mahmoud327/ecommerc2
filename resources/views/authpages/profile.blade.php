@extends('client.layouts.layouts')

@section('content')

<div class="login-box">

  <!-- /.login-logo -->

  <div class="card">

    @include('flash::message')
    <div class="card-body login-card-body">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <p class="login-box-msg">تعديل البيانات</p>

      {!! Form::model($model, [
        'action' => ['AuthController@profileSave'],
        'method' => 'post',


        ]) !!}

        <div class="">
          @include('flash::message')
        </div>
        @csrf


        <div class="form-group" style="direction:rtl;">
          {!! Form::text('username',null,array('class'=>'form-control', 'placeholder'=>"اسم المستخدم")) !!}

        </div>

        <div class="form-group" style="direction:rtl;">
          {!! Form::text('shop_name',null,array('class'=>'form-control', 'placeholder'=>'اسم المحل')) !!}

        </div>

        <div class="form-group" style="direction:rtl;">
          {!! Form::text('responsible_name',null,array('class'=>'form-control', 'placeholder'=>"اسم المسؤول")) !!}

        </div>


        <div class="form-group" style="direction:rtl;">
          {!! Form::text('delegate_name',null,array('class'=>'form-control', 'placeholder'=>"اسم المندوب")) !!}

        </div>

        <div class="form-group" style="direction:rtl;">
          {!! Form::text('email',null,array('class'=>'form-control', 'placeholder'=>"البريد الالكتروني")) !!}

        </div>

        <div class="form-group" style="direction:rtl;">
          {!! Form::text('phone',null,array('class'=>'form-control', 'placeholder'=>"الهاتف")) !!}

        </div>


        <!-- <div class="mb-3" style="direction:rtl;text-align:right">
          <input type="password" class="form-control" placeholder="كلمة المرور" name="password" required>
        </div>

        <div class="mb-3" style="direction:rtl;text-align:right">
          <input type="password" class="form-control" placeholder="تأكيد كلمة المرور" name="password_confirmation" required>
        </div> -->



        <div class="row" style="direction:rtl;text-align:right">

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">تعديل</button>
          </div>
          <!-- /.col -->
        </div>
      {!! Form::close() !!}



    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@endsection