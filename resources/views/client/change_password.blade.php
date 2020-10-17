@extends('client.layouts.layouts')

@section('content')
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title float-md-right" style="font-size:30px;color:#000"> تغيير كلمة المرور</h3>
    
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

            'action' => ['AuthController@updateResetClient'],
            'method' => 'post',

            ]) !!}


            @include('flash::message')

            <div class="form-group ">
              <label class="float-md-right">كلمة المرور القديمة</label>
              {!! Form::password('old-password',[
                'class' => 'form-control'
              ]) !!}

            </div>

            <div class="form-group">
              <label class="float-md-right">كلمة المرور الجديدة</label>
              {!! Form::password('password',[
                'class' => 'form-control'
              ]) !!}

            </div>

            <div class="form-group">
              <label class="float-md-right">تأكيد كلمة المرور الجديدة</label>
              {!! Form::password('password_confirmation',[
                'class' => 'form-control'
              ]) !!}

            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary float-md-right"> تعديل </button>
            </div>

            {!! Form::close() !!}
        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
