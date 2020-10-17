@extends('layouts.admin')

@section('content')
@inject('type','App\Models\Type')


    <!-- Main content -->
    <section class="content">
        <div class="row">


        </div>

        <!-- Default box -->
        <div class="card">
            <br>
          <div class="">
            @include('flash::message')
          </div>
          <div class="card-header">
              <h1 class="card-title" style="font-size:30px"> تعديل المنتج</h1>
          </div>

            <div class="card-body">
                {!!  Form::model($model,

                 ['action' =>['Admin\ProductController@update',$model->id],
                 'method'=>'put',
                 ]) !!}
                @include('errors.valdation')


                <div class="control-group">
                    <label for="form">اسم المنتج</label>
                    {!! Form::text('name',null,[
                        'class'=>'form-control'

                  ]) !!}



                  </div>
                  <br>

                  @if($model->offer()->first()->sort == 'temporary')
                <div class="control-group">
                    <label for="form">أقصى كمية يمكن شراؤها</label>
                    <input class="form-control" name="max_qun" type="text" value="{{$model->max_qun}}" required>

                  </div>
                  <br>
                  @endif


                <div class="control-group">
                    <label for="form">الكمية</label>
                    {!! Form::text('quantity',null,[
                        'class'=>'form-control'

                  ]) !!}

                  </div>
                  <br>


                  <div class="control-group">
                    <label for="form">رقم القطعه</label>
                    {!! Form::text('part_number',null,[
                        'class'=>'form-control'

                  ]) !!}

                  </div>
                  <br>
                  <div class="control-group">
                    <label for="form">السعر</label>
                    {!! Form::text('price',null,[
                        'class'=>'form-control'

                  ]) !!}

                  </div>

                  <br>
                    <div class="control-group">
                        <label for="form">الاقسام</label>

                        {!! Form::select('category_id', $categories->pluck('name','id')->toArray(),null, ['class' => 'form-control','id'=>'parents','placeholder' => 'اختر']) !!}


                      </div>
                      <div class="control-group"  style="display:none;" id="parentchildren">
                        <br>
                          <label for="">القسم الفرعي الأول</label>
                          <select class="form-control" id="children" name=""></select>
                      </div>


                    <div class="control-group" style="display:none;" id="parentgrandson">
                      <br>
                      <label for="">القسم الفرعي الثاني</label>
                      <select class="form-control" id="grandson" name=""></select>
                    </div>

                    <br>
                      @inject('types','App\Models\Type')
                    <div class="control-group">
                        <label for="form">اسم الماركه</label>
                        {!! Form::select('type_id', $types->pluck('name','id')->toArray(),null, ['class' => 'form-control','id'=>'parents','placeholder'=>'اختر']) !!}


                      </div>
                      <br>



                   <div class="control-group">
                        <button class="btn btn-primary" type="submit">تعديل</button>
                    </div>

                {!! Form::close() !!}

            </div>

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    @push('scripts')

        <script>


        //if parents changed
        $("#parents").change(function (e){
          e.preventDefault();
          console.log("l");
          $('#children').empty();
          $('#children').attr("name","");
          $("#parentchildren").css("display","none");

          $('#grandson').empty();
          $('#grandson').attr("name","");
          $("#parentgrandson").css("display","none");

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
                    // $("#parentchildren").append("<br>");
                    $('#children').attr("name","category_id");
                    $("#children").append('<option id="first" value="">اختر</option>');

                  $.each(data.data, function(index,child){
                    $("#children").append('<option value="'+child.id+'">'+child.name+'</option>');
                  });

                }
                else
                {
                  $('#children').empty();
                  $('#children').attr("name","");
                  $("#parentchildren").css("display","none");

                  $('#grandson').empty();
                  $('#grandson').attr("name","");
                  $("#parentgrandson").css("display","none");
                }
              },
              error : function (jqXhr, textStatus, errorMessage){
                alert(errorMessage);
              }

            });

          }



        });





        // if children changed
        $("#children").change(function (e){

          e.preventDefault();
          console.log('as');
          $('#grandson').empty();
          $('#grandson').attr("name","");
          $("#parentgrandson").css("display","none");

          var children_id = $("#children").val();
          if(children_id)
          {

            $.ajax({

              url      : '{{url('admin/children?parent_id=')}}'+children_id,
              type     : 'get',
              success  : function (data) {
                if(data.status == 1)
                {
                  // alert('a');
                    $("#parentgrandson").css("display","block");
                    // $("#parentchildren").append("<br>");
                    $('#grandson').attr("name","category_id");
                    $("#grandson").append('<option id="first" value="">اختر</option>');

                  $.each(data.data, function(index,child){
                    $("#grandson").append('<option value="'+child.id+'">'+child.name+'</option>');
                  });

                }

                else
                {
                  $('#grandson').empty();
                  $('#grandson').attr("name","");
                  $("#parentgrandson").css("display","none");
                }
              },
              error : function (jqXhr, textStatus, errorMessage){
                alert(errorMessage);
              }

            });

          }





        });




        </script>

      @endpush


@endsection
