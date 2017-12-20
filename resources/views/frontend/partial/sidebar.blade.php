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
                <div class="newdh">
                    <strong class="red"><strong>Số sim: 08x8.x00x313</strong></strong>
                    <p class="list-group-item-text font-11">Thời gian đặt: 12:39:09 14/12/2017</p>
                    <p class="list-group-item-text font-13">Khách đặt sim: mai văn chính</p>
                </div>
                <div class="newdh">
                    <strong class="red"><strong>Số sim: 08x8.x00x313</strong></strong>
                    <p class="list-group-item-text font-11">Thời gian đặt: 12:39:09 14/12/2017</p>
                    <p class="list-group-item-text font-13">Khách đặt sim: mai văn chính</p>
                </div>
                <div class="newdh">
                    <strong class="red"><strong>Số sim: 08x8.x00x313</strong></strong>
                    <p class="list-group-item-text font-11">Thời gian đặt: 12:39:09 14/12/2017</p>
                    <p class="list-group-item-text font-13">Khách đặt sim: mai văn chính</p>
                </div>
            </div>

            <div class="newquestion">
                <h4><i class="glyphicon glyphicon-star-empty"></i> Tin mới cập nhật</h4>
                <div class="news-content">
                    <ul>
                    @forelse($newsStatus as $item)
                        <li><a href="">{{$item->title}}</a></li>
                    @empty
                    empty
                    @endforelse
                    </ul>
                </div>
            </div>

        </aside>