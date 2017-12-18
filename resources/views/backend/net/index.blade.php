@extends('backend.layouts.master') @section('title') Mạng @endsection
@section('breadcrumb') Mạng @endsection @section('content')
<div class="padding-md">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<div class="row">
						<div class="col-md-12">
							<div class="form-group form-inline">
								<a href="{{URL::route('net.create')}}" class="form-control btn btn-success">Thêm Nhà Mạng</a>
							</div>
						</div>
			</div>
			</div>
				<div class="panel-heading">
					<div class="row">

					</div>
				</div>
				<table
					class="table table-bordered table-condensed table-hover table-striped">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">Name</th>
							<th class="text-center">Slug</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
					@forelse($dataNet as $item)
						<tr>
							<td width="10%" class="text-center">{{++$stt}}</td>
							<td width="30%" class="text-center">{{$item->name}}</td>
							<td width="30%" class="text-center">{{$item->slug}}</td>
							<td class="text-center">
							  <a href="{{URL::route('net.edit',[$item->id])}}" class="btn btn-success"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Sửa</a>
							  <a href="{{URL::route('net.delete',[$item->id])}}"  class="btn btn-danger delete-item"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> Xóa</a>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="4" class="text-center">Dữ liệu rỗng</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
			<!-- /panel -->
        </div>
		</div>
	</div>
</div>

@endsection
