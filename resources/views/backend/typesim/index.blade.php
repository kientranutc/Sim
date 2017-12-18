@extends('backend.layouts.master') @section('title') Loại sim @endsection
@section('breadcrumb') Loại sim
 @endsection @section('content')
<div class="padding-md">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<div class="row">
					<div class="col-md-12">
							<div class="form-group form-inline">
								<a href="{{URL::route('type-sim.create')}}" class="form-control btn btn-success">Thêm mới loại sim</a>
							</div>
					</div>
			</div>
			</div>
				<div class="panel-heading">
				</div>
				<table
					class="table table-bordered table-condensed table-hover table-striped">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">Name</th>
							<th class="text-center">Slug</th>
							<th class="text-center">Image</th>
							<th class="text-center">Nhà mạng</th>
							<th class="text-center">Mô tả</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
					@forelse($dataTypeSim as $item)
					<tr>
    					<td class="text-center">{{++$stt}}</td>
    					<td class="text-center">{{$item->name}}</td>
    					<td class="text-center">{{$item->slug}}</td>
    					<td class="text-center"><img width="100px" height="100px" alt="" src="{{$item->image}}"></td>
    					<td class="text-center">{{$item->net_name}}</td>
    					<td class="text-center">{!! $item->description!!}</td>
    					<td class="text-center">
    					 <a href="{{URL::route('type-sim.update',[$item->id])}}" class="btn btn-success"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Sửa</a>
    					<a href="{{URL::route('type-sim.delete',[$item->id])}}"  class="btn btn-danger delete-item"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> Xóa</a>
    					</td>
					</tr>
					@empty
					<tr>
						<td colspan="7">Dữ liệu trống</td>
					</tr>
					@endforelse

					</tbody>
				</table>
			</div>
			<!-- /panel -->
		</div>
	</div>
</div>
@endsection
