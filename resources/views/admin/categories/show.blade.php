@extends('layouts.admin')

@section('content')





<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="font-size:30px;color:#000">  <span>قائمة المنتجات الخاصة بقسم</span> <span>{{optional($category)->name}}</span> </h3>

    </div>
    <div class="card-body">
      <br>
      @include('flash::message')

      @if(count($records))

        <div class="table-responsive text-center">
          <table class="table table-bordered">

            <thead>
              <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>رقم القطعة</th>
                <th>تاريخ إضافة المنتج</th>
                <th>القسم</th>
                <th>الكمية</th>
                <th> تعديل</th>
                <th> حذف</th>
              </tr>
            </thead>

            <tbody>
              @foreach($records as $record)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{optional($record)->name}}</td>
                  <td>{{optional($record)->type_number}}</td>
                  <td>{{optional($record)->created_at}}</td>
                  <td>{{optional($record->category)->name}}</td>
                  <td>{{optional($record)->quantity}}</td>
                  <td>
                    <a href="{{url(route('item.edit',$record->id))}}" class="btn btn-success btn-xs"><i class="fas fa-edit"></i></a>
                  </td>
                  <td class="text-center">
                    {!! Form::open([
                        'action' => ['Admin\ItemController@destroy',$record->id],
                        'method' => 'delete'
                      ]) !!}
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
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

        <div class="alert alert-danger" role="alert">
            <p> لايوجد منتجات </p>
        </div>

      @endif


    </div>
    <!-- /.card-body -->

  </div>
  <!-- /.card -->

</section>


@endsection
