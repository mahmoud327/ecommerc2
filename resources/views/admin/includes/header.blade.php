<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                class="nav-link nav-menu-main menu-toggle hidden-xs" href="{{route('admin.dashboard')}}"><i
                            class="ft-menu font-large-1"></i></a>
                          </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{route('admin.dashboard')}}">
                        <img class="brand-logo" alt="modern admin logo"
                             src="{{asset('assets/admin/images/logo/logo.png')}}">
                        <h3 class="brand-text">قطع غيار</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">

                    @inject('notifications','App\Models\Notification')
                      <li class="dropdown dropdown-notification nav-item">
                          <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                              <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow" id="con">{{count($notifications->where('is_read',0)->orderBy('id', 'DESC')->take(25)->get())}}</span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right text-center" >
  
                              <li class="scrollable-container media-list w-100" id="noti">
  
                              @if(count($notifications->where('is_read',0)->orderBy('id', 'DESC')->take(25)->get()))
  
                                @foreach($notifications->where('is_read',0)->orderBy('id', 'DESC')->take(25)->get()  as $notification)
                                @if($notification->content == 'يوجد تسجيل عميل جديد')
                                <i class="la la-user"></i>
  
                                <a href="{{url(route('update-notification-client',$notification->id))}}" class=" media-heading" >{{$notification->content}}</a>
                                <br>
                                <br>
  
                                <time class="media-meta text-muted"
                                      datetime="2015-06-11T18:29:20+08:00">{{$notification->created_at}}
                                </time>
  
                                <hr>
  
  
                                @elseif($notification->content =='يوجد عملية شراء جديدة')
                                <i class="la la-cart-plus"></i>
  
                                <a href="{{url(route('update-notification-sail',$notification->id))}}" class=" media-heading">{{$notification->content}}</a>
                                <br>
                                <br>
  
                                <time class="media-meta text-muted"
                                      datetime="2015-06-11T18:29:20+08:00">{{$notification->created_at}}
                                </time>
  
                                <hr>
  
                                @else
  
                                <i class="la la-cart-arrow-down"></i>
  
                                <a href="{{url(route('update-notification-reservation',$notification->id))}}" class=" media-heading">{{$notification->content}}</a>
                                <br>
                                <br>
  
                                <time class="media-meta text-muted"
                                      datetime="2015-06-11T18:29:20+08:00">{{$notification->created_at}}
                                </time>
  
                                <hr>
                                @endif
  
  
                                @endforeach
  
                                @endif
                                
  
                              </li>
  
                          </ul>
                      </li>
  
  
                      <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="fa fa-cog fa-lg"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right text-center" >

                            <li class="scrollable-container media-list w-100" id="noti">
                                
                                <br>
                                <a href="{{url(route('edit-profile-admin'))}}" class=" media-heading" style="font-size: 18px;color:#000"> تغيير  البيانات</a>
                                <br>
                                <br>
                                <hr>

                               

                                
                                <br>
                                <a href="{{url(route('admin-change-password'))}}" class=" media-heading" style="font-size: 18px; color:#000"> تغيير كلمة المرور </a>
                                <br>
                                <br>
                                <hr>

                                
                                <br>
                                <a href="{{url(route('admin-change-password-for-client'))}}" class=" media-heading" style="font-size: 18px; color:#000"> تغيير كلمة المرور للعميل</a>
                                <br>
                                <br>
                                
                            </li>

                        </ul>
                    </li>
                 
                
                    
                     {!! Form::open([
   
                       'route' => 'logout',
                       'method'=> 'post'
   
                       ]) !!}
   
                       <div class="form-group mt-2">
                         <button type="submit" style="background:none;border:none;cursor:pointer; color:#fff;margin-right:10px;font-size:18px">تسجيل خروج</button>
                       </div>
   
                    {!! Form::close() !!}
                </ul>
   
                   
                 
            </div>
        </div>
    </div>
</nav>
