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
					<img src="img/user.jpg" alt="User Avatar">
				</div><!-- /user-block -->
				<div class="main-menu">
					<ul>
						<li class="openable open {{(Route::currentRouteName()=='users.index')
								|| (Route::currentRouteName()=='users.create')
						?'active':''}}">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-user fa-lg"></i>
								</span>
								<span class="text">	Administration
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li {{(Route::currentRouteName()=='users.index')||
									(Route::currentRouteName()=='users.create')
								?'active':''}}><a href="{{URL::route('users.index')}}"><span class="submenu-label">User Management</span></a></li>
							</ul>
						</li>

					</ul>
				</div><!-- /main-menu -->
			</div><!-- /sidebar-inner -->
		</aside>