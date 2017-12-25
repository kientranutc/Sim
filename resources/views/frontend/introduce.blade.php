 @extends('frontend.layouts.master')
@section('title') Giới thiệu gói cước
@endsection
 @section('content')
 <div class="page-left ">
	<div class="wrapothers">
	 <div class="titlesimcard">Giới thiệu gói cước sim 4g</div>
	 <div class="content-introduce">
	  {!!$dataIntroduce->description!!}
	 </div>
	</div>
                    <div class="wrapother">
                        <div class="titlesimcard">Thông tin nhà mạng</div>
                        <ul>
                            <li>
                                <div class="content-net">
                                    <i class="iconsimcard-vt"></i>Tổng đài 24/24<br>
                                    <strong>1800.8098 - 1800.8168</strong><br>
                                    <a href="{{URL::route('order-frontend.order-now')}}" class="add-cart-now"><strong>Mua Ngay</strong></a>
                                </div>
                                <div>
                                    Đường dây nóng:<br>
                                    <strong>0989.198.198 - 0983.198.198</strong>
                                </div>
                                <div>
                                    Các đầu số nhận biết<br>
                                    <strong>096 - 097 - 098 - 016 - 086</strong>
                                </div>
                            </li>
                            <li>
                                <div class="content-net">
                                    <i class="iconsimcard-mb"></i> Tổng đài 24/24<br>
                                    <strong>1800.1090 - 9090</strong>
                                     <a href="{{URL::route('order-frontend.order-now')}}" class="add-cart-now"><strong>Mua Ngay</strong></a>
                                </div>
                                <div>
                                    Đường dây nóng:<br>
                                    <strong>0908.144.144</strong>
                                </div>
                                <div>
                                    Các đầu số nhận biết<br>
                                    <strong>090 - 093 - 0120 - 0121 - 0122 - 0126 - 0128 - 089</strong>
                                </div>
                            </li>
                            <li>
                                <div class="content-net">
                                    <i class="iconsimcard-vn"></i> Tổng đài 24/24<br>
                                    <strong>1800.1091 - 9191</strong>
                                     <a href="{{URL::route('order-frontend.order-now')}}" class="add-cart-now"><strong>Mua Ngay</strong></a>
                                </div>
                                <div>
                                    Đường dây nóng:<br>
                                    <strong>0912.48.1111 - 0918.68.1111 - 0914.18.1111</strong>
                                </div>
                                <div>
                                    Các đầu số nhận biết<br>
                                    <strong>091 - 094 - 0123 - 0124 - 0125 - 0127 - 0129 - 088</strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
 @endsection