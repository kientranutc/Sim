 @extends('frontend.layouts.master')
@section('title') Tin tức
@endsection
 @section('content')
 <div class="page-left ">
	<div class="wrapothers">
	 <div class="titlesimcard">Tin tức</div>
	 <div class="content-introduce">
		<ul class="item-news">
			@forelse($showNews as $item)
			<li>
			  <a href="{{URL::route('frontend-news.show-detail',[$item->slug])}}">
			   <img src="{{$item->image}}" alt="{{$item->image}}">
				<div class="item-news-right">
				<h5>{!!$item->title!!}</h5>
				<p><i class="fa fa-calendar" aria-hidden="true"></i> {{$helper::calBetweenDate($item->created_at)}}</p>
				</div>
				</a>
			</li>
			@empty
			<li class="text-center">Dữ liệu trống</li>
			@endforelse
		</ul>
		<div class="text-center">
		{{ $showNews->links() }}
		</div>
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