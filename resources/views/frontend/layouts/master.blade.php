<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{asset('frontend/assets/img/favicon.ico')}}" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
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
                            <a class="navbar-brand" href="#"> SIM <strong>SỐ</strong> ĐẸP</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Viettel</a></li>
                                <li><a href="#">Vinaphone</a></li>
                                <li><a href="#">Mobiphone</a></li>
                                <li><a href="#">Hỏi đáp</a></li>
                                <li><a href="#">Liên hệ</a></li>
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
        <p>© 2016 Sim số đẹp <a href="/tos">Xem chính sách sử dụng web</a></p>
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