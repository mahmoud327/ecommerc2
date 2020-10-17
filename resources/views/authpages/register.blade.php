<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->

  <div class="card">
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
      <p class="login-box-msg">تسجيل حساب جديد</p>

      <form action="{{route('client-registerSave')}}" method="post">

        <div class="">
          @include('flash::message')
        </div>
        @csrf

        <div class="mb-3" style="direction:rtl;">
          <input type="text" class="form-control" placeholder="اسم المستخدم" name="username" value="{{old('username')}}" required>
        </div>

        <div class="mb-3" style="direction:rtl;">
          <input type="text" class="form-control" placeholder="اسم المحل" name="shop_name" value="{{old('shop_name')}}" required>
        </div>

        <div class="mb-3" style="direction:rtl;">
          <input type="text" class="form-control" placeholder="اسم المسؤول" name="responsible_name" value="{{old('responsible_name')}}" required>
        </div>

        <div class="mb-3" style="direction:rtl;">
          <input type="text" class="form-control" placeholder="اسم المندوب" name="delegate_name" value="{{old('delegate_name')}}" required>
        </div>

        <div class="mb-3" style="direction:rtl;">
          <input type="text" class="form-control" placeholder="العنوان" name="address" value="{{old('address')}}" required>
        </div>

        <div class="mb-3" style="direction:rtl;">
          <input type="text" class="form-control" placeholder="البريد الالكتروني" name="email" value="{{old('email')}}">
        </div>

        <div class="mb-3" style="direction:rtl;">
          <input type="text" class="form-control" placeholder="الهاتف" name="phone" value="{{old('phone')}}" required>
        </div>

        <div class="mb-3" style="direction:rtl;text-align:right">
          <input type="password" class="form-control" placeholder="كلمة المرور" name="password" value="{{old('password')}}" required>
        </div>

        <div class="mb-3" style="direction:rtl;text-align:right">
          <input type="password" class="form-control" placeholder="تأكيد كلمة المرور" name="password_confirmation" required>
        </div>



        <div class="row" style="direction:rtl;text-align:right">
          <div class="col-8">
            <div class="icheck-primary">
              <p class="mb-1">
                <a href="{{url(route('login-user'))}}">لدي حساب بالفعل</a>
              </p>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">حفظ</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>

</body>
</html>
