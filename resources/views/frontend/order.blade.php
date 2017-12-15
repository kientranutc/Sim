 @extends('frontend.layouts.master')
@section('title') Mua online sim 4G Viettel 1G Viettel giá rẻ
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
	<form>
		<div class="wrap_cart">
			<div class="detail_cart">
				<ul class="listorder">
					<li class="tragop-item">
						<div class="colimg">
							<a title=""> <img width="55" height="55" src="{{asset('frontend/assets/img/Sim.jpg')}}"></a>
						</div>
						<div class="colinfo">
							<strong>75.000₫</strong> <a title="01264.790.174">Sim <b>01264.790.174</b></a>
							<div class="simtypeorder">Loại sim: Sim Mobi Big</div>
							<div class="clear"></div>
						</div>
					</li>
					<li class="promotion">
						<p>
							<b>THÔNG TIN KHUYẾN MÃI:</b>
						</p> <span>1000 phút/tháng gọi nội mạng &lt; 10 phút.</span><span>1GB/tháng.
							Hết 1GB, hạ băng thông không tính phí.</span><span>30 phút/tháng
							gọi ngoại mạng.</span><span>6 tháng Facebook không giới hạn dung
							lượng. </span><span>Cú pháp: DK BIG gửi 789 (miễn phí).</span><span>Phí
							gói: 50.000đ/tháng.</span><span>Thời gian KM: 12 tháng. </span>
					</li>
					<li class="tragop-price"><span class="text-left" id="fee-left">Phí
							giao hàng:</span> <span class="text-right" id="fee-right"
						data-value="10000">+10.000₫</span></li>
					<li class="tragop-price"><span class="text-left"><b>Cần thanh toán:</b></span>
						<span class="text-right"><strong><b id="totalpay">85.000₫</b></strong></span>
					</li>
				</ul>
			</div>
			<div class="infouser ">
				<h5>
					<strong>Thông tin cá nhân</strong>
				</h5>
				<div class="areainfo">
					<input type="text" class="saveinfo" name="txtname" id="txtname"
						placeholder="Họ và tên" maxlength="50" value="">
					<div class="clear"></div>
					<input type="tel" class="saveinfo" name="txtphone" id="txtphone"
						placeholder="Số điện thoại" maxlength="11" value=""
						autocomplete="off"> <input type="tel" class="saveinfo"
						name="txtcmnd" id="txtcmnd"
						placeholder="Số CMND/Hộ chiếu đăng ký sim (Bắt buộc)"
						maxlength="12" autocomplete="off" value="">
					<div class="form-group">
						<textarea class="form-control" id="exampleFormControlTextarea1"
							rows="3" placeholder="Địa chỉ nhận hàng"></textarea>
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