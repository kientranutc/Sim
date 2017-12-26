 @extends('frontend.layouts.master')
@section('title') Sim số đẹp
@endsection
@section('description') Danh mục
@endsection
@section('keywords')
Danh-muc
@endsection
@section('image')
{{asset('frontend/assets/img/Sim.jpg')}}
@endsection
 @section('content')
 <div class="page-left ">
                    <div class="searchsim">
                    	<form method="get">
                    	 <input type="hidden" name="l" value="{{Request::get('l',-1)}}">
                    	 <input type="hidden" name="p" value="{{Request::get('p',-1)}}">
                    	 <input type="hidden" name="d" value="{{Request::get('d',-1)}}">
                         <input type="text" placeholder="Nhập số sim cần tìm" id="txtsearchsim" name="n" value="{{Request::get('n','')}}">
                        <button type="submit" id="btnsearch">Tìm</button>
                        </form>
                    </div>
                    <div class="findtip">
                        <span>Nhập <b>999</b> tìm sim có chứa 999</span>
                        <span>Nhập <b>098*</b> tìm sim có 3 số đầu 098</span>
                        <span>Nhập <b>*999</b> tìm sim có 3 số cuối 999</span>
                        <span>Nhập <b>098*999</b> tìm sim có đầu số 098 &amp; 3 số cuối 999</span>
                    </div>
                    <form method="get">
                    <div class="simfilter">
                         <div class="filter-name"> <label>Lọc theo:</label></div>
                        <input type="hidden" name="n" value="{{Request::get('n','')}}">
                        <div class="navifil">
                            <div class="form-group form-inline">
                                <label for="sel2" class="filter-title">Loại sim:</label>
                                <select class="form-control" id="sel2"  name="l" onchange="this.form.submit()">
                                        <option value="-1">--Chọn--</option>
                                         @foreach(Config::get('constant.type_sim') as $k=>$v)
                                         <option value="{{$k}}" {{(Request::get('l',-1)==$k)?'selected':''}}>{{$v}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                           <div class="navifil">
                            <div class="form-group form-inline">
                                <label for="sel1" class="filter-title">Giá:</label>
                                <select class="form-control" id="sel1" name="p"  onchange="this.form.submit()">
                                    <option value="-1">--Chọn--</option>
                                    @forelse($priceSim as $item)
                                    	  <option value="{{$item->price}}" {{(Request::get('p',-1)==$item->price)?'selected':''}}>{{number_format($item->price).'₫'}}</option>
                                    @empty
                                    	empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="navifil">
                            <div class="form-group form-inline">
                                <label for="sel3" class="filter-title">Đầu số:</label>
                                <select class="form-control" id="sel3" name="d"  onchange="this.form.submit()">
                                    <option value="10" {{(Request::get('d')==10)?'selected':''}}>Sim 10 số</option>
                                    <option value=11 {{(Request::get('d')==11)?'selected':''}}>Sim 11 số</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="simresult">
                        <div class="table-striped table-responsive">
                            <table class="table">
                                <thead class="simbar">
                                    <tr>
                                        <th>SIM SỐ</th>
                                        <th>GIÁ TIỀN</th>
                                        <th> NHÀ MẠNG</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                               	@forelse($dataCategory as $item)
                                    <tr>
                                        <td class="phone-number">{{$helper::formatPhoneNumber($item->name)}}</td>
                                        <td class="phone-price">{{number_format($item->price)."₫"}}</td>
                                        <td class="phone-address"> {{$item->net_name}}</td>
                                        <td class="order-phone"><a href="{{URL::route('order-frontend.index',[$item->id])}}">Mua</a></td>
                                    </tr>
                               @empty
                                    <tr>
                                    	<td colspan="4" class="text-center">Dữ liệu trống</td>
                                    </tr>
                               @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="paginations text-left">
                        {{
                            $dataCategory ->appends(array(
        						'n' => Request::get('n', ''),
        						'l'	=> Request::get('l',-1),
        						'p' => Request::get('p',-1),
        						'd' => Request::get('d',-1),
                                )
                            )->links()
                        }}
                    </div>
                    <div class="thutuc">
                        <span class="titlesim">Thủ tục đăng ký sim</span>
                        <span>Theo quy định của nhà mạng, thủ tục đăng ký SIM gồm:</span>
                        <span>1. Bản gốc CMND (cấp dưới 15 năm) hoặc Căn cước công dân (còn thời hạn) hoặc Hộ chiếu (còn thời hạn trên 6 tháng) của chủ thuê bao, nếu là bản sao phải có công chứng dưới 6 tháng.</span>
                        <span>2. Ảnh chân dung của chủ thuê bao tại thời điểm giao dịch.</span>
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