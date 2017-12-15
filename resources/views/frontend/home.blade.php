 @extends('frontend.layouts.master')
@section('title') Sim số đẹp
@endsection
 @section('content')
 <div class="page-left ">
                    <div class="simwrap">
                        <h2 class="titlesimcard">Mua sim nghe gọi, 3G, 4G</h2>
                        <div class="simpackage">
                            <ul>
                                <li>
                                    <a href="">
                                        <div>Sim 3G, 4G</div>
                                        <span>Không nghe, gọi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div>Sim 3G, 4G</div>
                                        <span>Không nghe, gọi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div>Sim 3G, 4G</div>
                                        <span>Không nghe, gọi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div>Sim 3G, 4G</div>
                                        <span>Không nghe, gọi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div>Sim 3G, 4G</div>
                                        <span>Không nghe, gọi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div>Sim 3G, 4G</div>
                                        <span>Không nghe, gọi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div>Sim 3G, 4G</div>
                                        <span>Không nghe, gọi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div>Sim 3G, 4G</div>
                                        <span>Không nghe, gọi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div>Sim 3G, 4G</div>
                                        <span>Không nghe, gọi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div>Sim 3G, 4G</div>
                                        <span>Không nghe, gọi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="searchsim">
                        <input type="text" placeholder="Nhập số sim cần tìm" id="txtsearchsim" name="txtsearchsim" value="">
                        <button type="button" id="btnsearch" onclick="SearchSim()">Tìm</button>
                    </div>
                    <div class="findtip">
                        <span>Nhập <b>999</b> tìm sim có chứa 999</span>
                        <span>Nhập <b>098*</b> tìm sim có 3 số đầu 098</span>
                        <span>Nhập <b>*999</b> tìm sim có 3 số cuối 999</span>
                        <span>Nhập <b>098*999</b> tìm sim có đầu số 098 &amp; 3 số cuối 999</span>
                    </div>
                    <div class="simfilter">
                        <div class="filter-name"> <label>Lọc theo:</label></div>
                        <div class="navifil">
                            <div class="form-group form-inline">
                                <label for="sel1" class="filter-title">Mạng:</label>
                                <select class="form-control" id="sel1">
                                    <option>Viettel</option>
                                </select>
                            </div>
                        </div>
                        <div class="navifil">
                            <div class="form-group form-inline">
                                <label for="sel2" class="filter-title">Loại sim:</label>
                                <select class="form-control" id="sel2">
                                        <option>Tam hoa</option>
                                    </select>
                            </div>
                        </div>
                        <div class="navifil">
                            <div class="form-group form-inline">
                                <label for="sel3" class="filter-title">Đầu số:</label>
                                <select class="form-control" id="sel3">
                                            <option>Sim 10 số</option>
                                            <option>Sim 11 số</option>
                                        </select>
                            </div>
                        </div>

                    </div>
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
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone"><a href="{{URL::route('order.index')}}">Mua</a></td>
                                    </tr>
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone"><a href="{{URL::route('order.index')}}">Mua</a></td>
                                    </tr>
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone"><a href="{{URL::route('order.index')}}">Mua</a></td>
                                    </tr>
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone"><a href="{{URL::route('order.index')}}">Mua</a></td>
                                    </tr>
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone"><a href="{{URL::route('order.index')}}">Mua</a></td>
                                    </tr>
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone"><a href="{{URL::route('order.index')}}">Mua</a></td>
                                    </tr>
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone">Mua</td>
                                    </tr>
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone">Mua</td>
                                    </tr>
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone">Mua</td>
                                    </tr>
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone">Mua</td>
                                    </tr>
                                    <tr>
                                        <td class="phone-number">01269.894.453</td>
                                        <td class="phone-price">75.000₫</td>
                                        <td class="phone-address"> Mobifone</td>
                                        <td class="order-phone">Mua</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pagination">
                        <ul class="pagination">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul>
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
                                <div>
                                    <i class="iconsimcard-vt"></i> Tổng đài 24/24<br>
                                    <strong>1800.8098 - 1800.8168</strong>
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
                                <div>
                                    <i class="iconsimcard-mb"></i> Tổng đài 24/24<br>
                                    <strong>1800.1090 - 9090</strong>
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
                                <div>
                                    <i class="iconsimcard-vn"></i> Tổng đài 24/24<br>
                                    <strong>1800.1091 - 9191</strong>
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
        </div
@endsection