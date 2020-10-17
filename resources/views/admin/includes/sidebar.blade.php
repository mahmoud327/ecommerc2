<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


        
          <li class=" nav-item">
              <a href="{{url(route('category.index'))}}">
                <i class="la la-text-height"></i>
                  <span>الاقسام</span>
              </a>
          </li>

          <li class=" nav-item">
            <a href="{{url(route('type.index'))}}">
              <i class="la la-text-height"></i>
                <span>الماركة</span>
            </a>
          </li>

          <li class="nav-item  open ">
            <a href=""><i class="la la-home"></i>
                <span class="menu-title" data-i18n="nav.dash.main">العروض</span>
            </a>
            <ul class="menu-content">

                <li class=" nav-item">
                  <a href="{{url(route('offer.create'))}}">
                      <i class="la la-text-height"></i>
                        <span>انشاء عرض جديد</span>
                    </a>
                </li>

                <li class=" nav-item">
                  <a href="{{url(route('offer.permanent'))}}">
                      <i class="la la-text-height"></i>
                        <span>العروض الدائمة</span>
                    </a>
                </li>


                <li class=" nav-item">
                  <a href="{{url(route('offer.temporary'))}}">
                      <i class="la la-text-height"></i>
                        <span>العروض المؤقتة</span>
                    </a>
                </li>



            </ul>
          </li> 


            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات</span>
                </a>
                <ul class="menu-content">

                    <li class=" nav-item">
                        <a href="{{url(route('item.index'))}}">
                          <i class="la la-text-height"></i>
                            <span>المنتجات</span>
                            
                        </a>
                    </li>

                    <li class=" nav-item">
                      <a href="{{url(route('item.more.sail'))}}">
                        <i class="la la-text-height"></i>
                          <span>المنتجات الأكثر مبيعا</span>
                          
                      </a>
                    </li>

                    <li class=" nav-item">
                      <a href="{{url(route('item.more.res'))}}">
                        <i class="la la-text-height"></i>
                          <span>المنتجات الأكثر حجزا  </span>
                          
                      </a>
                    </li>

                    <li class=" nav-item">
                      <a href="{{url(route('item.create'))}}">
                        <i class="la la-plus"></i>
                          <span>إضافة منتج يدويا  </span>
                          
                      </a>
                    </li>

                    
                    
                    

                </ul>
              </li>


            


                <li class=" nav-item">
                <a href="{{url(route('order.index'))}}">
                  <i class="la la-text-height"></i>
                    <span>الطلبات</span>
                    
                </a>
            </li>
            <li class=" nav-item">
                <a href="{{url(route('resarve.index'))}}">
                  <i class="la la-text-height"></i>
                    <span>الحجوزات</span>
                </a>
            </li>

            <li class=" nav-item">
                <a href="{{url(route('clients.index'))}}">
                  <i class="la la-text-height"></i>
                    <span>العملاء</span>
                    
                </a>
            </li>

            

            </li>

        </ul>
    </div>
</div>
