@extends('backend.layouts.master')
@section('title')
Giới thiệu gói cước
@endsection
@section('breadcrumb')
Giới thiệu gói cước
@endsection
 @section('content')
<div class="padding-md">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<div class="row">
					<div class="col-md-12">
						<div class="form-group form-inline">
							<a href="{{URL::route('introduce.create')}}" class="form-control btn btn-success">Thêm mới giới thiệu gói cước</a>
						</div>
				</div>
			</div>
			</div>
			<div class="panel-heading">
				</div>
				<div class="panel-heading">
				</div>
				<div class="table-responsive">
				<table
					class="table table-bordered table-condensed table-hover table-striped">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">Tiêu đề</th>
							<th class="text-center">Chi tiết</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
					@forelse($dataIntroduce  as $item)
					<tr>
						<td width="10%" class="text-center">{{++$stt}}</td>
						<td width="20%" class="text-center">{{$item->title}}</td>
						<td width="50%" class="text-center">{!!$item->description!!}</td>
						<td width="20%" class="text-center">
							 <a href="{{URL::route('introduce.update',[$item->id])}}" class="btn btn-success"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Sửa</a>
							  <a href="{{URL::route('introduce.delete',[$item->id])}}"  class="btn btn-danger delete-item"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> Xóa</a>
						</td>
					</tr>
					@empty
					@endforelse
					</tbody>
				</table>
				</div>
			</div>
			<div class="page-right padding-md text-right">

                 </div>
			<!-- /panel -->
		</div>
	</div>
</div>
@endsection
