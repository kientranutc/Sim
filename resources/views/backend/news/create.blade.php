@extends('backend.layouts.master') @section('title')
Thêm mới tin tức
@endsection @section('breadcrumb')
Thêm mới tin tức
@endsection
@section('content')
<div class="padding-md">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form class="no-margin" id="formValidate1" action="{{URL::route('news.create')}}" method="post">
						 {{ csrf_field() }}
					<div class="panel-heading">Thêm mới tin tức</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{($errors->has('title'))?"has-error":""}} ">
									<label for="name" class="control-label">Tiêu đề bản tin</label> <input
										type="text" placeholder="Tiêu đề bản tin" name="title" value="{{old('title')}}"
										class="form-control input-sm" data-required="true">
										<p class="text-danger"> {{$errors->first('title')}}</p>
								</div>
							</div>
							<div class="col-md-6">
									<div class="form-group {{($errors->has('image'))?"has-error":""}}">
									<label class="control-label">Ảnh đại diện bản tin</label> <input
										type="text" placeholder="click để thêm ảnh" id="image-typesim" name="image" value="{{old('image')}}"
										class="form-control input-sm" data-required="true">
										<p class="text-danger">{{$errors->first('image')}}</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{($errors->has('net_id'))?"has-error":""}}">
									<label class="control-label">Tin theo nhà mạng</label>
										<select class="form-control input-sm" name="net_id">
										@foreach($dataNet as $items)
										<option value="{{$items->id}}" {{(old('net_id')==$items->id)?'selected':''}}>{{$items->name}}</option>
										@endforeach
										</select>
										<p class="text-danger"> {{$errors->first('net_id')}}</p>
								</div>
								<!-- /form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-6">
								<div class="form-group {{($errors->has('status'))?"has-error":""}}">
									<label class="control-label">Trạng thái bản tin</label>
										<select class="form-control input-sm" name="status">
    										<option value="1" {{(old('status')==1)?'selected':''}}>Hiển thị</option>
    										<option value="0" {{(old('status')==0)?'selected':''}}>Ẩn</option>
										</select>
										<p class="text-danger"> {{$errors->first('status')}}</p>
								</div>
								<!-- /form-group -->
							</div>

							<!-- /.col -->
						</div>

						<div class="form-group {{($errors->has('description'))?"has-error":""}}">
									<label class="control-label">Description</label>
									<textarea  rows="" class="form-control input-sm" cols="" name="description">{{old('description')}}</textarea>
						</div>
					</div>
					<div class="panel-footer text-center">
						<button type="submit" class="btn btn-success">Thêm mới</button>
					</div>
				</form>
			</div>
			<!-- /panel -->
		</div>
		<!-- /.col-->
	</div>
</div>
<div id="imageModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<iframe  width="100%" height="550" frameborder="0" src="{{URL::to('/')}}/filemanager/dialog.php?type=&field_id=image-typesim">
				</iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
			</div>
		</div>

	</div>
</div>

@endsection
@section('script')
	<script type="text/javascript" src="{{asset('backend/js/tinymce/main.js')}}">
</script>
<script type="text/javascript" src="{{asset('backend/js/modal/add_image_file_management.js')}}"></script>
@endsection
