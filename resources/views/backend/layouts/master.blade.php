<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('backend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{asset('backend/css/font-awesome.min.css')}}" rel="stylesheet">

	<!-- Pace -->
	<link href="{{asset('backend/css/pace.css')}}" rel="stylesheet">

	<!-- Color box -->
	<link href="{{asset('backend/css/colorbox/colorbox.css')}}" rel="stylesheet">

	<!-- Morris -->
	<link href="{{asset('backend/css/morris.css')}}" rel="stylesheet"/>

	<!-- Endless -->
	<link href="{{asset('backend/css/endless.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend/css/endless-skin.css')}}" rel="stylesheet">
	<link href="{{asset('backend/style.css')}}" rel="stylesheet">
	<link href="{{asset('backend/responsive.css')}}" rel="stylesheet">
    @yield('style')
  </head>

  <body class="overflow-hidden">
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>

	<a href="" id="theme-setting-icon"><i class="fa fa-cog fa-lg"></i></a>
	<div id="theme-setting">
		<div class="title">
			<strong class="no-margin">Skin Color</strong>
		</div>
		<div class="theme-box">
			<a class="theme-color" style="background:#323447" id="default"></a>
			<a class="theme-color" style="background:#efefef" id="skin-1"></a>
			<a class="theme-color" style="background:#a93922" id="skin-2"></a>
			<a class="theme-color" style="background:#3e6b96" id="skin-3"></a>
			<a class="theme-color" style="background:#635247" id="skin-4"></a>
			<a class="theme-color" style="background:#3a3a3a" id="skin-5"></a>
			<a class="theme-color" style="background:#495B6C" id="skin-6"></a>
		</div>
		<div class="title">
			<strong class="no-margin">Sidebar Menu</strong>
		</div>
		<div class="theme-box">
			<label class="label-checkbox">
				<input type="checkbox" checked id="fixedSidebar">
				<span class="custom-checkbox"></span>
				Fixed Sidebar
			</label>
		</div>
	</div><!-- /theme-setting -->

	<div id="wrapper" class="preload">
		<div id="top-nav" class="fixed skin-6">
			<a href="#" class="brand">
				<span class="text-toggle"> Admin</span>
			</a><!-- /brand -->
			<button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<button type="button" class="navbar-toggle pull-left hide-menu" id="menuToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<ul class="nav-notification clearfix">

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-bell fa-lg"></i>
						<span class="notification-label bounceIn animation-delay6">{{count($orderNew)}}</span>
					</a>
					<ul class="dropdown-menu notification dropdown-3">
						<li><a href="#">Có {{count($orderNew)}} đơn hàng</a></li>
						@forelse($orderNew as $item)
						<li>
							<a href="#">
								<span class="notification-icon bg-warning">
									<i class="fa fa-shopping-bag"></i>
								</span>
								<span class="m-left-xs">Sim: {{($item->sim_name=='')?$item->customer_name:$item->sim_name}}</span>
								<span class="time text-muted">{{$helper::calBetweenDate($item->date_order)}}</span>
							</a>
						</li>
						@empty
						<li>Chưa có đơn hàng</li>
						@endforelse
						<li><a href="{{URL::route('order.index')}}">Hiển thị đơn hàng</a></li>
					</ul>
				</li>
				<li class="profile dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<strong>{{Auth::user()->name}}</strong>
						<span><i class="fa fa-chevron-down"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="clearfix" href="#">
								<img src="{{asset('backend/img/user.jpg')}}" alt="User Avatar">
								<div class="detail">
									<strong>{{Auth::user()->name}}</strong>
									<p class="grey">{{Auth::user()->email}}</p>
								</div>
							</a>
						</li>
						<li><a tabindex="-1" href="{{URL::route('users.edit-profile')}}" class="main-link"><i class="fa fa-edit fa-lg"></i> Sửa thông tin cá nhân</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" class="main-link logoutConfirm_open" href="#logoutConfirm"><i class="fa fa-lock fa-lg"></i> Đăng xuất</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /top-nav-->
		@include('backend.partial.sidebar')
		<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="">Home</a></li>
					 <li class="active"> @yield('breadcrumb')</li>
				</ul>
			</div><!-- /breadcrumb-->
			<div class="padding-md">
				<div class="row">
    				<div class="col-md-12">
    			  		@include('backend.layouts.message')
    			  	</div>
			  	</div>
			  	</div>
			  @yield('content')
		</div><!-- /main-container -->
		<!--Modal-->
		<div class="modal fade" id="newFolder">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Create new folder</h4>
      				</div>
				    <div class="modal-body">
				        <form>
							<div class="form-group">
								<label for="folderName">Folder Name</label>
								<input type="text" class="form-control input-sm" id="folderName" placeholder="Folder name here...">
							</div>
						</form>
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
						<a href="#" class="btn btn-danger btn-sm">Save changes</a>
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div><!-- /wrapper -->

	<a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

	<!-- Logout confirmation -->
	<div class="custom-popup width-100" id="logoutConfirm">
		<div class="padding-md">
			<h4 class="m-top-none"> Bạn có muốn đăng xuất</h4>
		</div>

		<div class="text-center">
			<a class="btn btn-success m-right-sm" href="{{URL::route('logout')}}">Đăng xuất</a>
			<a class="btn btn-danger logoutConfirm_close">Hủy</a>
		</div>
	</div>

<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bạn có muốn xóa không?</h4>
      </div>
      <div class="modal-body text-right">
       <a href="" id="url-modal" class="btn btn-danger"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> Xóa</a>
       <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
      </div>

    </div>

  </div>
</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

	<!-- Jquery -->
	<script src="{{asset('backend/js/jquery-1.10.2.min.js')}}"></script>

	<!-- Bootstrap -->
    <script src="{{asset('backend/bootstrap/js/bootstrap.js')}}"></script>

	<!-- Flot -->
	<script src="{{asset('backend/js/jquery.flot.min.js')}}"></script>

	<!-- Morris -->
	<script src="{{asset('backend/js/rapheal.min.js')}}"></script>
	<script src="{{asset('backend/js/morris.min.js')}}"></script>

	<!-- Colorbox -->
	<script src="{{asset('backend/js/jquery.colorbox.min.js')}}"></script>

	<!-- Sparkline -->
	<script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>

	<!-- Pace -->
	<script src="{{asset('backend/js/uncompressed/pace.js')}}"></script>

	<!-- Popup Overlay -->
	<script src="{{asset('backend/js/jquery.popupoverlay.min.js')}}"></script>

	<!-- Slimscroll -->
	<script src="{{asset('backend/js/jquery.slimscroll.min.js')}}"></script>

	<!-- Modernizr -->
	<script src="{{asset('backend/js/modernizr.min.js')}}"></script>

	<!-- Cookie -->
	<script src="{{asset('backend/js/jquery.cookie.min.js')}}"></script>

     <script src="{{asset('backend/tinymce/js/tinymce/tinymce.min.js')}}"></script>

	<!-- Endless -->
	<script src="{{asset('backend/js/endless/endless.js')}}"></script>
		<script src="{{asset('backend/js/modal/main.js')}}"></script>
    @yield('script')
  </body>
</html>
