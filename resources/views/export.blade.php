

<table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>اسم المنتج</th>
                <th>السعر</th>
                <th>الكمية</th>
                <th>الاجمالي</th>

              </tr>
            </thead>
            <tbody>

                
            @foreach ($items as $item)
                @foreach ($item->products()->get() as $it)
                
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$it->name}}</td>
                        <td>{{$it->pivot->price}}</td>
                        <td> {{$it->pivot->quantity}}</td>
                        <td> {{$it->pivot->quantity * $it->pivot->price}}</td>
                        
                
                    </tr>
                @endforeach

                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>

                    <th>نوع الطلب</th>
                    <th>اجمالي سعر الطلب</th>
                    <th>اسم المحل</th>
                    <th>اسم المندوب</th>
                    <th>اسم المسؤول</th>
                    <th>التليفون</th>
                  </tr>


                  <tr>
                    
                    <td>
                        @if ($item->type == 'sail')
                            شراء
                        @else
                            حجز
                        @endif
                    
                    </td>
                <td>{{$item->total}}</td>
                <td>{{$item->client->shop_name}}</td>  
                <td>{{$item->client->delegate_name}}</td>
                <td>{{$item->client->responsible_name}}</td>
                <td>{{$item->client->phone}}</td>
            
                </tr>
            @endforeach

             

        </tbody>
  </table>


