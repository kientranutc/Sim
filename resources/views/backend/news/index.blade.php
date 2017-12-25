@extends('backend.layouts.master') @section('title') Tin tức @endsection
@section('breadcrumb') Tin tức
 @endsection @section('content')
<div class="padding-md">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<div class="row">
					<div class="col-md-12">
							<div class="form-group form-inline">
								<a href="{{URL::route('news.create')}}" class="form-control btn btn-success">Thêm mới tin tức</a>
							</div>
					</div>
			</div>

			</div>
			<div class="panel-heading">
					<div class="row">
						<div class="col-md-5">
							<lable>Tổng số bản tin: {{$dataNews->total()}}</lable>
						</div>
						<form action="" method="get">
						<div class="col-md-2">
							<div class="form-group form-inline">
								<label for="net" class="filter-title">Tin theo nhà mạng:</label>
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
								<label for="title" class="filter-title">Tiêu đề: </label>
								<input type="text" class="form-control" name="title" id="title" value="{{Request::get('title', '')}}" placeholder="Tiêu đề">
							</div>
						</div>
								<div class="col-md-2">
							<div class="form-group form-inline">
								<label for="status" class="filter-title">Trạng thái:</label>
								<select
									class="form-control" name="status" id="status">
									<option value="-1">--All--</option>
									<option value="1" {{(Request::get('status',-1)==1)?'selected':''}}>Hiển thị</option>
									<option value="0" {{(Request::get('status',-1)==0)?'selected':''}}>Ẩn</option>

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
							<th class="text-center">Tiêu đề</th>
							<th class="text-center">Ảnh đại diện</th>
							<th class="text-center">Tin theo nhà mạng</th>
							<th class="text-center">Trạng thái</th>
							<th class="text-center">Mô tả</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse($dataNews as $item)
						<tr>
						<td width="10%" class="text-center">{{++$stt}}</td>
						<td width="10%" class="text-center">{{$item->title}}</td>
						<td width="10%" class="text-center"><img width="100px" height="100px" src="{{$item->image}}" alt="{{$item->image}}"></td>
						<td width="10%" class="text-center">{{$item->net_name}}</td>
						<td width="10%" class="text-center">
							@if($item->status==1)
							<span class="badge badge-success">Hiển thị</span>
							@else
							<span class="badge badge-danger">Ẩn</span>
							@endif
						</td>
						<td width="10%" class="text-center">{!!$item->description!!}</td>
						<td width="10%" class="text-center">
							  <a href="{{URL::route('news.update',[$item->id])}}" class="btn btn-success"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Sửa</a>
							  <a href="{{URL::route('news.delete',[$item->id])}}"  class="btn btn-danger delete-item"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> Xóa</a>
						</td>
						</tr>
						@empty
					    <tr>
						<td colspan="7" class="text-center"> Dữ liệu trống</td>
					    </tr>
					@endforelse
					</tbody>
				</table>
				</div>
			</div>
			<div class="page-right padding-md text-right">
					 {{
                    $dataNews ->appends(array(
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
@endsection
