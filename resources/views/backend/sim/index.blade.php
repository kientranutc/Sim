@extends('backend.layouts.master') @section('title') Sim @endsection
@section('breadcrumb') Sim
 @endsection @section('content')
<div class="padding-md">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<div class="row">
					<div class="col-md-12">
							<div class="form-group form-inline">
								<a href="{{URL::route('sim.create')}}" class="form-control btn btn-success">Thêm mới sim</a>
							</div>
					</div>
			</div>

			</div>
			<div class="panel-heading">
					<div class="row">
						<div class="col-md-5">
							<lable>Tổng số sim:{{$dataSim->total()}}</lable>
						</div>
						<form action="" method="get">
						<div class="col-md-2">
							<div class="form-group form-inline">
								<label for="net" class="filter-title">Nhà mạng:</label>
								<select
									class="form-control" name="net" id="net">
									<option value="-1">--All--</option>
									@foreach($dataNet as $item)
										<option value="{{$item->id}}" {{(Request::get('net',-1)==$item->id)?'selected':''}}>{{$item->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-inline">
								<label for="name" class="filter-title">Sim số: </label>
								<input type="text" class="form-control" name="name" id="name" value="{{Request::get('name', '')}}" placeholder="Sim số">
							</div>
						</div>
								<div class="col-md-2">
							<div class="form-group form-inline">
								<label for="status" class="filter-title">Trạng thái:</label>
								<select
									class="form-control" name="status" id="status">
									<option value="-1">--All--</option>
									<option value="0" {{(Request::get('status',-1)==0)?'selected':''}}>Chưa đặt hàng</option>
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
							<th class="text-center">Số</th>
							<th class="text-center">Giá</th>
							<th class="text-center">Trạng thái sim</th>
							<th class="text-center">Sim 10/11 Số</th>
							<th class="text-center">Nhà mạng</th>
							<th class="text-center">Loại sim theo phong thủy</th>
							<th class="text-center">Mô tả</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
					@forelse($dataSim as $item)
						<tr>
						<td class="text-center">{{++$stt}}</td>
						<td class="text-center">{{$helper::formatPhoneNumber($item->name)}}</td>
						<td class="text-center">{{number_format($item->price)}}đ</td>
						<td width="10%" class="text-center">
							@if($item->status==1)
							<span class="badge badge-success">Đã đặt hàng</span>
							@else
							<span class="badge badge-danger">Chưa đặt hàng</span>
							@endif
							</td>
							<td width="10%" class="text-center">
							@if($item->first_number==10)
							<span class="badge badge-success">Sim 10 số</span>
							@else
							<span class="badge badge-success">Sim 11 số</span>
							@endif
							</td>
						<td class="text-center">{{$item->net_name}}</td>
						<td class="text-center">{{Config::get('constant.type_sim')[$item->type_sim_name]}}</td>
						<td class="text-center">{!!$item->description!!}</td>
						<td class="text-center">
							  <a href="{{URL::route('sim.update',[$item->id])}}" class="btn btn-success"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Sửa</a>
							  <a href="{{URL::route('sim.delete',[$item->id])}}"  class="btn btn-danger delete-item"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> Xóa</a>
							</td>
						</tr>
					@empty
					<tr>
						<td colspan="9" class="text-center"> Dữ liệu trống</td>
					</tr>
					@endforelse

					</tbody>
				</table>
			</div>
			</div>
			<div class="page-right padding-md text-right">
                {{
                    $dataSim ->appends(array(
						'net' => Request::get('net', -1),
						'name'	=> Request::get('name',''),
						'status' => Request::get('status',-1),
                        )
                    )->links()
                }}
                 </div>
			<!-- /panel -->
		</div>
	</div>
</div>
@endsection
