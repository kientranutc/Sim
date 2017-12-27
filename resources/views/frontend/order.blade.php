 @extends('frontend.layouts.master')
@section('title') Đặt hàng
@endsection
@section('description') Đặt hàng
@endsection
@section('keywords')
Dat-hang
@endsection
@section('image')
{{asset('frontend/assets/img/Sim.jpg')}}
@endsection
@section('style')
  <link rel="stylesheet" href="{{asset('frontend/assets/css/order.css')}}">
@endsection
@section('content')
<div class="content-order">
	<div class="bar-top">
		<a href="{{ URL::previous() }}" class="buymore">Trở về</a>
		<div class="yourcart">Đặt mua sim</div>
	</div>
	<form action="{{URL::route('order.process-order')}}" method="post">
		{{ csrf_field() }}
	<input type="hidden" name="sim_id" value="{{$dataSim->id}}">
		<input type="hidden" name="total" value="{{$dataSim->price}}">
		<div class="wrap_cart">
			<div class="detail_cart">
				<ul class="listorder">
					<li class="tragop-item">
						<div class="colimg">
							<a title=""> <img width="55" height="55" src="{{asset('frontend/assets/img/Sim.jpg')}}"></a>
						</div>
						<div class="colinfo">
							<strong>{{number_format($dataSim->price)}}₫</strong> <a title="01264.790.174">Sim <b>{{$dataSim->name}}</b></a>
							<div class="simtypeorder"></div>
							<div class="clear"></div>
						</div>
					</li>
					<li class="promotion">
						<p>
							<b>THÔNG TIN KHUYẾN MÃI:</b>
						</p>
						@if(!empty($dataSim->description))
							{!!$dataSim->description!!}
						@endif
					</li>
					<li class="tragop-price"><span class="text-left" id="fee-left">Phí
							giao hàng:</span> <span class="text-right" id="fee-right"
						data-value="10000">0₫ </span></li>
					<li class="tragop-price"><span class="text-left"><b>Cần thanh toán:</b></span>
						<span class="text-right"><strong><b id="totalpay">{{number_format($dataSim->price)}}₫ </b></strong></span>
					</li>
				</ul>
			</div>
			<div class="infouser ">
				<h5>
					<strong>Thông tin cá nhân</strong>
				</h5>
				<div class="areainfo">
					<input type="text" class="saveinfo" name="name" id="txtname"
						placeholder="Họ và tên" maxlength="50" value="" required="required">
					<div class="clear"></div>
					<input type="tel" class="saveinfo" name="phone" id="txtphone"
						placeholder="Số điện thoại" maxlength="11" value=""
						autocomplete="off"> <input type="tel" class="saveinfo"
						name="cmnd" id="txtcmnd"
						placeholder="Số CMND/Hộ chiếu đăng ký sim (Bắt buộc)"
						maxlength="12" autocomplete="off" value="" required="required">
					<div class="form-group">
						<textarea class="form-control" name="address" id="exampleFormControlTextarea1"
							rows="3" placeholder="Địa chỉ nhận hàng" required="required"></textarea>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<button type="submit" class="cart-btt" id="btn-complete">
				<b>Đặt mua</b>
			</button>
		</div>
	</form>
</div>
@endsection