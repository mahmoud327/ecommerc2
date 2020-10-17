@extends('layouts.admin')

@section('content')


<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    
    <div class="card-header">
      <div class="">
        @include('flash::message')
      </div>
      <h1 class="card-title" style="font-size:35px;">انشاء عرض جديد</h1>
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


      @inject('model','App\Models\Offer')
      {!! Form::model($model, [
        'action' => 'Admin\OfferController@store',
        'files' => 'true'
        ]) !!}

      <div class="form-group">
        <label for="name">اسم العرض</label>
        {!! Form::text('name',null,[
          'class' => 'form-control'
        ]) !!}

      </div>


      <div class="form-group" >
        <label for="">نوع العرض</label>
        <select class="form-control" id="sortt" name="sort">
          <option selected="selected" value="permanent">دائم</option>
          <option  value="temporary">مؤقت</option>
        </select>

      </div>

      <div class="form-group date">

      </div>

      <div class="form-group">
        <label>صورة العرض</label>
        <br>
        {!! Form::file('image',null,[
          'class' => 'form-control'
        ]) !!}
    </div>

      <div class="form-group" id="file_import">
        <label>اضافة ملف العرض</label>
        <br>
        <a href="{{route('template_permanent_export')}}" class="btn btn-primary"> تنزيل ملف جاهز للعروض الدائمة</a>
        
        <span></span>
        {!! Form::file('import_file',null,[
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

@push('scripts')

    <script>

      //if sort changed
      $("#sortt").change(function (e){
        e.preventDefault();


        var value = $("#sortt").val();


       if(value == "temporary")
       {
         console.log(value);

         $('.card .date').append('<label for="">تاريخ انتهاء العرض</label>');
         $('.card .date').append('<br>');
         $('.card .date').append('{{ Form::date('deadline', \Carbon\Carbon::now()->format('Y-m-d'),['class' => 'form-control']) }}');
         // $('.card .date').append('<input class="form-control" name="deadline" type="date"   >');

        $('#file_import').empty().append('<label>اضافة ملف العرض</label>').append('<br>').append('<a href="{{route('template_temporary_export')}}" class="btn btn-primary"> تنزيل ملف جاهز للعروض المؤقتة</a>').append('<span>  </span>').append('{!! Form::file('import_file',null,[
          'class' => 'form-control'
        ]) !!}');

       }
       else
       {
         $('.card .date').empty();
         $('#file_import').empty().append('<label>اضافة ملف العرض</label>').append('<br>').append('<a href="{{route('template_permanent_export')}}" class="btn btn-primary"> تنزيل ملف جاهز للعروض الدائمة</a>').append('<span>  </span>').append('{!! Form::file('import_file',null,[
          'class' => 'form-control'
        ]) !!}');

       }


      });







    </script>

  @endpush


@endsection
