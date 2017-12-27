<aside class="col-md-4">
            <div class="newquestion">
                <h4><i class="glyphicon glyphicon-star-empty"></i> Hotline (24/7)</h4>
                <div class="contact">

            	<div class="table-responsive">
            		<div class="panel-body">
            			<i class="fa fa-phone" aria-hidden="true"></i>
            			<p style="text-align: center;"><span style="font-size:16px;"><span style="color:#006400;">
            			<strong>Hỗ trợ khách hàng:</strong></span></span>
            			<br>
            			<span style="font-size:20px;">
            			<span style="color:#FF0000;"><strong><br>0944.956.866</strong></span></span><br>
            			<span style="font-size:20px;"><span style="color:#FF0000;"><strong><br>0988.918.919</strong>
            			</span></span>
            			</p>
            			 <br>
            			<p style="text-align: center;"><span style="color:#006400;"><strong>Phản ánh DV:</strong></span><br><span style="color:#0000CD;"><strong>&nbsp;</strong></span><span style="color:#40E0D0;"><strong></strong></span><br><span style="font-size:20px;"><span style="color:#008000;"><strong>0944.956.866</strong></span></span><span style="font-size:18px;"><span style="color:#000080;"><strong><br>--------------------------</strong></span></span><span style="font-size:16px;"><span style="color:#40E0D0;"><span style="line-height: 37.1429px;"><b><br>Thời gian làm việc</b></span></span><br><span style="color:#FF8C00;"><span style="line-height: 37.1429px;"><b>T2 - T7&nbsp;: 8h - 17h30</b></span></span></span></p>
            			<p style="font-family: sans-serif, Arial, Verdana, 'Trebuchet MS'; font-size: 13px; font-weight: bold; line-height: 20.8px; text-align: center;"><span style="font-size:14px;"><span style="font-family: arial, helvetica, sans-serif;"><em>Qúy Khách &nbsp;mua sim </em></span></span></p>
            			<p style="font-family: sans-serif, Arial, Verdana, 'Trebuchet MS'; font-size: 13px; font-weight: bold; line-height: 20.8px; text-align: center;"><span style="font-size:14px;"><span style="font-family: arial, helvetica, sans-serif;"><em>xin vui lòng&nbsp;</em></span><em style="font-size: 16px; line-height: 20.8px;">nhấn vào chữ</em><span style="line-height: 20.8px;"><strong>&nbsp;<span style="color:#FF0000;"><span style="background-color:#AFEEEE;">Đặt mua</span></span></strong></span></span></p>
            			<p style="font-family: sans-serif, Arial, Verdana, 'Trebuchet MS'; font-size: 13px; font-weight: bold; line-height: 20.8px; text-align: center;"><span style="font-size:14px;"><em>Chúng tôi sẽ liên hệ lại cho quý khách</em></span></p>
            			<p style="font-family: sans-serif, Arial, Verdana, 'Trebuchet MS'; font-size: 13px; font-weight: bold; line-height: 20.8px; text-align: center;"><span style="font-size:14px;"><em>Xin chân thành cảm ơn!</em></span></p>
            			<p>&nbsp;</p>
            		</div>

            </div>
                </div>
            </div>
            <div class="newquestion">
                <h4><i class="glyphicon glyphicon-shopping-cart"></i> Đơn đặt hàng sim số đẹp</h4>
                @forelse($orderNew as $item)
                <div class="newdh">
                    <strong class="red"><strong>Số sim: {{(empty($item->sim_name))?$item->customer_name:$helper::formatPhoneNumbers($item->sim_name)}}</strong></strong>
                    <p class="list-group-item-text font-11">Thời gian đặt: {{date_format(date_create($item->date_order),'s:i:H d-m-Y')}}</p>
                    <p class="list-group-item-text font-13">Khách đặt sim: {{$item->customer_name}}</p>
                </div>
                @empty
                 <p class="text-center">Dữ liệu trống</p>
                @endforelse

            </div>

            <div class="newquestion">
                <h4><i class="glyphicon glyphicon-star-empty"></i> Tin mới cập nhật</h4>
                <div class="news-content">
                    <ul>
                    @forelse($newsStatus as $item)
                        <li><a href="{{URL::route('frontend-news.show-detail',[$item->slug])}}">{{$item->title}}</a></li>
                    @empty
                    <p class="text-center">Dữ liệu trống</p>
                    @endforelse
                    </ul>
                </div>
            </div>
        </aside>