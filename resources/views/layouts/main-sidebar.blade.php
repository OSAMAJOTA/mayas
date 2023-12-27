<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
            <div class="app-sidebar__user clearfix">
                <div class="dropdown user-pro-body">
                    <div class="">
                        <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
                    </div>
                    <div class="user-info">
                        <h4 class="font-weight-semibold mt-3 mb-0">{{auth::user()->name}}</h4>
                        <span class="mb-0 text-muted">{{auth::user()->email}}</span>
                    </div>
                </div>
            </div>
			<div class="main-sidemenu">

				<ul class="side-menu">
					<li class="side-item side-item-category">الرئيسة</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/' . $page='index') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">الرئيسة</span></a>
					</li>
					<li class="side-item side-item-category">الاعدادات</li>
                    <li class="slide ">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z" opacity=".3"/><path d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z"/></svg><span class="side-menu__label">الاعدادات</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li class="sub-slide">
                                <a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label">التأمين</span><i class="sub-angle fe fe-chevron-down"></i></a>
                                <ul class="sub-slide-menu">
                                    <li><a class="sub-slide-item" href="{{ url('/' . $page='#') }}">الأدوار</a></li>
                                    <li><a class="sub-slide-item" href="{{ url('/' . $page='#') }}">المستخدمون</a></li>
                                    <li><a class="sub-slide-item" href="{{ url('/' . $page='#') }}">الصلاحيات</a></li>
                                </ul>
                            </li>
                            <li class="sub-slide">
                                <a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label">الملفات الشخصية</span><i class="sub-angle fe fe-chevron-down"></i></a>
                                <ul class="sub-slide-menu">
                                    <li><a class="sub-slide-item" href="{{ url('/' . $page='#') }}">ملف الشركة	 </a></li>
                                    <li><a class="sub-slide-item" href="{{ url('/' . $page='#') }}">الملف الشخصي للمستخدم	</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

					<li class="side-item side-item-category">مدخلات النظام  </li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z"/></svg><span class="side-menu__label">مدخلات النظام</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('/' . $page='items') }}">	أسماء وأسعار الأصناف</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='sections') }}">	أسماء الأقسام</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='careers') }}">	أسماء الوظائف </a></li>
                            <li class="sub-slide">
                                <a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label">الموظفين</span><i class="sub-angle fe fe-chevron-down"></i></a>
                                <ul class="sub-slide-menu">
                                    <li><a class="sub-slide-item" href="{{ url('/' . $page='#') }}">أسماء الموظفين</a></li>
                                    <li><a class="sub-slide-item" href="{{ url('/' . $page='#') }}">مجموعة الخياطين</a></li>

                                </ul>
                            </li>
                            <li><a class="slide-item" href="{{ url('/' . $page='rangeslider') }}">	أسماء والفروع والشركات   </a></li>
                            <li><a class="slide-item" href="{{ url('/' . $page='rangeslider') }}">عملاء فروع الشركة </a></li>
						</ul>
					</li>


				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
