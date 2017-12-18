@extends('backend.layouts.master') @section('title')
Loại Sim
@endsection @section('breadcrumb')
Thêm mới loại sim
@endsection
@section('content')
<div class="padding-md">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form class="no-margin" id="formValidate1" action="{{URL::route('type-sim.create')}}" method="post">
						 {{ csrf_field() }}
					<div class="panel-heading">Thêm mới loại sim</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{($errors->has('name'))?"has-error":""}} ">
									<label for="name" class="control-label">Name</label> <input
										type="text" placeholder="name" name="name" value="{{old('name')}}"
										class="form-control input-sm" data-required="true">
										<p class="text-danger"> {{$errors->first('name')}}</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group  ">
									<label for="name" class="control-label">Nhà mạng</label>
									<select class="form-control input-sm" name="net_id">
									@foreach($dataNet as $item)
									 <option value="{{$item->id}}" {{(old('net_id')==$item->id)?'selected':''}}>{{$item->name}}</option>
									@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-group {{($errors->has('image'))?"has-error":""}}">
									<label class="control-label">Image</label> <input
										type="text" placeholder="click để thêm ảnh" id="image-typesim" name="image" value="{{old('image')}}"
										class="form-control input-sm" data-required="true"
										>
										<p class="text-danger">{{$errors->first('image')}}</p>
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
