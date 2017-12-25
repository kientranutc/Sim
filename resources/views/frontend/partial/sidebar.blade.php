<aside class="col-md-4">
            <div class="newquestion">
                <h4><i class="glyphicon glyphicon-phone-alt"></i> HỖ TRỢ KHÁCH HÀNG</h4>
                <div class="contact">
                	@foreach($contact as $k=>$v)
                    <h6><strong><a href="tel:{{$v}}">{{$v}}</a></strong></h6>
                    @endforeach
                </div>
            </div>
            <div class="newquestion">
                <h4><i class="glyphicon glyphicon-shopping-cart"></i> Đơn đặt hàng sim số đẹp</h4>
                @forelse($orderNew as $item)
                <div class="newdh">
                    <strong class="red"><strong>Số sim: {{$helper::formatPhoneNumber($item->sim_name)}}</strong></strong>
                    <p class="list-group-item-text font-11">Thời gian đặt: {{date_format(date_create($item->date_order),'s:i:H d-m-Y')}}</p>
                    <p class="list-group-item-text font-13">Khách đặt sim: {{$item->customer_name}}</p>
                </div>
                @empty
                Dữ liệu trống
                @endforelse

            </div>

            <div class="newquestion">
                <h4><i class="glyphicon glyphicon-star-empty"></i> Tin mới cập nhật</h4>
                <div class="news-content">
                    <ul>
                    @forelse($newsStatus as $item)
                        <li><a href="{{URL::route('frontend-news.show-detail',[$item->slug])}}">{{$item->title}}</a></li>
                    @empty
                    empty
                    @endforelse
                    </ul>
                </div>
            </div>

        </aside>