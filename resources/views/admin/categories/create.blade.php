@extends('layouts.admin')

@section('content')


<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h1 class="card-title" style="font-size:35px;">انشاء قسم جديد</h1>
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


      @inject('model','App\Models\Category')
      {!! Form::model($model, [
        'action' => 'Admin\CategoryController@store'
        ]) !!}

      <div class="form-group">
        <label for="name">اسم القسم</label>
        {!! Form::text('name',null,[
          'class' => 'form-control'
        ]) !!}

      </div>

      @if(!$categories->isEmpty())

        <div class="form-group">
          <label for="">القسم الرئيسي</label>
          {!! Form::select('parent_id', $categories->pluck('name','id')->toArray(),null, ['class' => 'form-control','id'=>'parents','placeholder'=>'لايوجد']) !!}

        </div>

      @endif
      <div class="form-group" style="display:none;" id="parentchildren">
        <label for="">القسم الفرعي</label>
        {!! Form::select('child_id',[],null, ['class' => 'form-control','id'=>'children','placeholder'=>'لايوجد']) !!}

      </div>


      <br>
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

      //if parents changed
      $("#parents").change(function (e){
        e.preventDefault();

        // get cheldern category
        var parent_id = $("#parents").val();
        //console.log(g);
        if(parent_id)
        {

          $.ajax({

            url      : '{{url('admin/children?parent_id=')}}'+parent_id,
            type     : 'get',
            success  : function (data) {
              if(data.status == 1)
              {

                  $("#parentchildren").css("display","block");
                  $("#children").empty();
                  $("#children").append('<option id="first" value="">لايوجد</option>');
                $.each(data.data, function(index,child){
                  $("#children").append('<option value="'+child.id+'">'+child.name+'</option>');
                });

                if($("#children option").length==1)
                {
                  $("#children").empty();
                  $("#parentchildren").css("display","none");
                }
              }
            },
            error : function (jqXhr, textStatus, errorMessage){
              alert(errorMessage);
            }

          });

        }

        else
        {
          $("#children").empty();
          $("#children").append('<option id="first" value="">لايوجد</option>');
          $("#parentchildren").css("display","none");
        }

      });




      $("#children").on('change',function (e){
        e.preventDefault();
        var value = $('#children').val();
        if(value != '')
        {
          $("#children").attr("name","parent_id");
        }
        else
        {
          // $("#parents").attr("name","parent_id");
          $("#children").attr("name","child_id");
        }

      });

      $("#parents").on('change',function (e){
        e.preventDefault();
        $("#children").attr("name","child_id");

      });

    </script>

  @endpush
@endsection
