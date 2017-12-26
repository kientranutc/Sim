@extends('frontend.layouts.master')
@section('title') Mua online sim 4G Viettel 1G Viettel giá rẻ
@endsection
@section('description') Đặt hàng ngày
@endsection
@section('keywords')
Dat-hang-ngay
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
	<form action="{{URL::route('order.process-order-now')}}" method="post">
			{{ csrf_field() }}
		<div class="wrap_cart">
		<br>
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
							rows="3" placeholder="Địa chỉ nhận hàng"  required="required"></textarea>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<button type="submit" class="cart-btt" id="btn-complete">
				<b>Đặt mua</b>
			</button>
		</div>
	</form>
	<br>
</div>
@endsection