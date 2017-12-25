@extends('backend.layouts.master') @section('title') Đơn hàng @endsection
@section('breadcrumb') Đơn hàng
 @endsection @section('content')
<div class="padding-md">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<lable>Tổng đơn hàng:{{$dataOrder->total()}} </lable>
						</div>
						<form action="" method="get">

						<div class="col-md-2">
							<div class="form-group form-inline">
								<label for="name" class="filter-title">Sim số: </label>
								<input type="text" class="form-control" name="name" id="name" value="{{Request::get('name', '')}}" placeholder="sim số">
							</div>
						</div>
								<div class="col-md-3">
							<div class="form-group form-inline">
								<label for="status" class="filter-title">Trạng thái đơn hàng:</label>
								<select
									class="form-control" name="status" id="status">
									<option value="-1">--All--</option>
									<option value="0" {{(Request::get('status',-1)==0)?'selected':''}}>Mới đặt hàng</option>
									<option value="1" {{(Request::get('status',-1)==1)?'selected':''}}>Đã đặt hàng</option>

								</select>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group form-inline">
								<button type="submit" class="form-control btn btn-success">Search</button>
							</div>
						</div>
						</form>
					</div>
				</div>
				<div class="panel-heading">
				</div>
				<div class="table-responsive">
				<table
					class="table table-bordered table-condensed table-hover table-striped">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">Sim số</th>
							<th class="text-center">Ngày đặt sim</th>
							<th class="text-center">Thông tin khách hàng</th>
							<th class="text-center">Số điện thoại người nhận</th>
							<th class="text-center">CMTND/Hộ chiếu</th>
							<th class="text-center">Địa chỉ giao hàng</th>
							<th class="text-center">Giá</th>
							<th class="text-center">Trạng thái đơn hàng</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse($dataOrder as $item)
						<tr>
							<td width="10%" class="text-center">{{++$stt}}</td>
							<td width="10%" class="text-center">{{$item->sim_name}}</td>
							<td width="15%" class="text-center">{{date_format(date_create($item->date_order),"H:i:s d-m-Y ")}}</td>
							<td width="10%" class="text-center">{{$item->customer_name}}</td>
							<td width="10%" class="text-center">{{$item->customer_phone}}</td>
							<td width="10%" class="text-center">{{$item->customer_cmnd}}</td>
							<td width="10%" class="text-center">{{$item->customer_address}}</td>
							<td width="15%" class="text-center">{{number_format($item->total).'đ'}}</td>
							<td width="10%" class="text-center">
							@if($item->status==1)
							<span class="badge badge-success">Đã giao hàng</span>
							@else
							<span class="badge badge-danger">Mới đặt hàng</span>
							@endif
						</td>
						<td width="5%" class="text-center"> <a href="{{URL::route('order.update-status-order',[$item->id, $item->status])}}" class="btn btn-success update-status-order"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Cập nhật trạng thái đơn hàng</a></td>
						</tr>
						@empty
						<tr>
							<td colspan="7" class="text-center">Dữ liệu trống</td>
						</tr>
						@endforelse

					</tbody>
				</table>
				</div>
			</div>
			<div class="page-right padding-md text-right">
					 {{
                    $dataOrder ->appends(array(
						'net' => Request::get('net', -1),
						'title'	=> Request::get('title',''),
						'status' => Request::get('status',-1),
                        )
                    )->links()
                }}
                 </div>
			<!-- /panel -->
		</div>
	</div>
</div>
<div id="statusModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Trạng thái đơn hàng</h4>
      </div>
      <div class="modal-body text-center">
      <form class="form-inline" action="" method="post">
      		{{csrf_field()}}
      	  <input type="hidden" value="" name="order_id" id="order_id">
          <div class="form-group">
            <label for="email">Trạng thái :</label>
           <select class="form-control" id="sel1" name="status" onchange="this.form.submit()">
            <option value="0">Mới đặt hàng</option>
            <option value="1">Đã giao hàng</option>
          </select>
  		</div>
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
@section('script')
	<script  src="{{asset('backend/js/order/main.js')}}"></script>
@endsection
