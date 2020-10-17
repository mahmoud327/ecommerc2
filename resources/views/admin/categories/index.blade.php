@extends('layouts.admin')

@section('content')







  <section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="font-size:30px;color:#000"> الاقسام</h3>

    </div>

    <div class="card-body">
      <div class="">
        <a href="{{url(route('category.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i> انشاء قسم جديد</a>
      </div>
      <br>
      @include('flash::message')

      @if(count($records))

        <div class="table-responsive text-center">
          <table class="table table-bordered">

            <thead>
              <tr>
                <th>#</th>
                <th>اسم القسم</th>
                <th>عرض كل منتجات القسم</th>
                <th>تعديل القسم</th>
                <th>حذف القسم</th>

              </tr>
            </thead>

            <tbody>
              @foreach($records as $record)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>
                    @if(count($record->children))
                     <a href="{{url(route('categorychildren',$record->id))}}"> {{$record->name}} </a>

                    @else

                    <p> {{$record->name}} </p>

                    @endif
                  </td>
                  <td><a href="{{url(route('category.show',$record->id))}}" class="btn btn-primary">عرض</a></td>

                  <td><a href="{{url(route('category.edit',$record->id))}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                  <td class="text-center">
                    {!! Form::open([
                        'action' => ['Admin\CategoryController@destroy',$record->id],
                        'method' => 'delete'
                      ]) !!}
                      <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('هل تريد الحذف')"> <i class="fa fa-trash"></i> </button>
                    {!! Form::close() !!}

                  </td>


                </tr>
              @endforeach
            </tbody>

          </table>
          <div style="margin-left:40%">
            {!! $records->render() !!}
          </div>
        </div>

      @else

        <div class="alert alert-success" role="alert">
          <p>لايوجد أقسام</p>
        </div>

      @endif


    </div>
    <!-- /.card-body -->

  </div>
  <!-- /.card -->

</section>

@endsection
