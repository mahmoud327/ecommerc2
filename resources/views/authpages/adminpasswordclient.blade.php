@extends('layouts.admin')

@section('content')
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" style="font-size:20px">تغيير كلمة المرور للعميل</h3>


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
          {!! Form::open([

            'action' => ['AuthController@adminPasswordClientUpdate'],
            'method' => 'post'

            ]) !!}


            @include('flash::message')


            <div class="form-group">
              <label>اسم المستخدم</label>
              {!! Form::text('username',null,[
                'class' => 'form-control'
              ]) !!}

            </div>
            <div class="form-group">
              <label>كلمة المرور الجديدة</label>
              {!! Form::password('password',[
                'class' => 'form-control'
              ]) !!}

            </div>

            <div class="form-group">
              <label>تأكيد كلمة المرور الجديدة</label>
              {!! Form::password('password_confirmation',[
                'class' => 'form-control'
              ]) !!}

            </div>

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
