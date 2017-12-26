<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="{{asset('frontend/assets/img/favicon.ico')}}" rel="shortcut icon" type="image/x-icon" />
	<meta http-equiv="content-language" content="vi" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta property="og:image" content="@yield('image')"/>
  	<meta property="og:site_name" content="sim4gpro.net" />
  	<meta property="article:section" content="Sim 4g" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="{{asset('backend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend/assets/carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
     @yield('style')
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
</head>
<header>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                            <a class="navbar-brand" href="/"> SIM <strong>4G</strong></a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                            	@foreach($netAll  as $item)
                                <li><a href="{{URL::route('category.index',[$item->slug])}}">{{$item->name}}</a></li>
                                @endforeach
                                <li><a href="{{URL::route('frontend-news.index')}}">Tin tức</a></li>
                                <li><a href="{{URL::route('frontend-introduce.index')}}">Giới thiệu gói cước</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
@include('frontend.partial.banner')
<section class="content">
    <div class="container">
         <div class="row">
           <div class="col-md-12">
            @include('frontend.layouts.message')
           </div>
         </div>
        <div clas="row">

          <aside class="col-md-8">
          	@yield('content')
        </aside>
        @include('frontend.partial.sidebar')
    </div>
    </div>
</section>
<footer>
    <div class="rowfoot2">
        <p>© 2016 Sim 4g <a href="/">Xem chính sách sử dụng web</a></p>
    </div>
</footer>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend/assets/carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main_carousel.js')}}"></script>
    @yield('script')
</body>

</html>