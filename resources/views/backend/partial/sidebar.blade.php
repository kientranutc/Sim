<aside class="fixed skin-6">
			<div class="sidebar-inner scrollable-sidebar">
				<div class="size-toggle">
					<a class="btn btn-sm" id="sizeToggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm">
						<i class="fa fa-power-off"></i>
					</a>
				</div><!-- /size-toggle -->
				<div class="user-block clearfix">
					<div class="row">
						<div class="col-md-5">
							<img src="{{asset('backend/img/user.jpg')}}" alt="User Avatar">
						</div>
						<div class="col-md-7">
						<p class=" text-left text-success"><strong>Tài khoản:</strong></p>
						<p class=" text-left text-success"><strong>{{Auth::user()->name}}</strong></p>
						</div>
					</div>

				</div><!-- /user-block -->
				<div class="main-menu">
					<ul>
						<li class="openable open {{(Route::currentRouteName()=='users.index')
									||(Route::currentRouteName()=='users.create')
						?'active':''}}">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-user fa-lg"></i>
								</span>
								<span class="text">	Quản lý người dùng
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li class="{{(Route::currentRouteName()=='users.index')
									||(Route::currentRouteName()=='net.create')
									|| (Route::currentRouteName()=='net.edit')
								?'active':''}}"><a href="{{URL::route('users.index')}}"><span class="submenu-label">Quản lý người sử dụng</span></a></li>
								<li class="{{(Route::currentRouteName()=='users.index')
									||(Route::currentRouteName()=='net.create')
									|| (Route::currentRouteName()=='net.edit')
								?'active':''}}"><a href="{{URL::route('users.index')}}"><span class="submenu-label">Quản lý quyền truy cập</span></a></li>
							</ul>
						</li>
						<li class="{{(Route::currentRouteName()=='net.index')
									||(Route::currentRouteName()=='net.create')
									|| (Route::currentRouteName()=='net.edit')
								?'active':''}}"><a href="{{URL::route('net.index')}}"><span class="submenu-label"> <i class="fa fa-random fa-lg" aria-hidden="true"></i> Nhà mạng</span></a></li>
						<li class="{{(Route::currentRouteName()=='type-sim.index')
									|| (Route::currentRouteName()=='type-sim.create')
									|| (Route::currentRouteName()=='type-sim.update')
								?'active':''}}"><a href="{{URL::route('type-sim.index')}}"><span class="submenu-label"> <i class="fa fa-server fa-lg" aria-hidden="true"></i> Loại Sim</span></a></li>
						<li class="{{(Route::currentRouteName()=='sim.index')
									|| (Route::currentRouteName()=='sim.create')
									|| (Route::currentRouteName()=='sim.update')
								?'active':''}}"><a href="{{URL::route('sim.index')}}"><span class="submenu-label"> <i class="fa fa-credit-card fa-lg" aria-hidden="true"></i> Sim</span></a></li>
						<li class="{{(Route::currentRouteName()=='news.index')
									||(Route::currentRouteName()=='news.create')
							    	||(Route::currentRouteName()=='news.update')
								?'active':''}}"><a href="{{URL::route('news.index')}}"><span class="submenu-label"> <i class="fa fa-newspaper-o fa-lg" aria-hidden="true"></i> Tin tức</span></a></li>
						<li class="{{(Route::currentRouteName()=='order.index')
								?'active':''}}"><a href="{{URL::route('order.index')}}"><span class="submenu-label"> <i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i> Đơn hàng</span></a></li>
					</ul>
				</div><!-- /main-menu -->
			</div><!-- /sidebar-inner -->
		</aside>