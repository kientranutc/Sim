@extends('backend.layouts.master')
 @section('title')
 Cập nhật giới thiệu gói cước
@endsection
@section('breadcrumb')
Cập nhật giới thiệu gói cước
@endsection
@section('content')
<div class="padding-md">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form class="no-margin" id="formValidate1" action="{{URL::route('introduce.update', [$dataEdit->id])}}" method="post">
						 {{ csrf_field() }}
					<div class="panel-heading"> Sửa giới thiệu gói cước</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group {{($errors->has('title'))?"has-error":""}} ">
									<label for="name" class="control-label">Số điện thoại</label> <input
										type="text" placeholder="Tiêu đề" name="title" value="{{$dataEdit->title}}"
										class="form-control input-sm phone" data-required="true">
										<p class="text-danger"> {{$errors->first('title')}}</p>
								</div>
							</div>

						</div>
						<!-- /form-group -->
						<div class="form-group {{($errors->has('description'))?"has-error":""}}">
								<label class="control-label">Giới thiệu gói cước</label>
								<textarea  rows="" class="form-control input-sm"  name="description">{!!$dataEdit->description!!}</textarea>
						</div>
					</div>
					<div class="panel-footer text-center">
						<button type="submit" class="btn btn-success">Cập nhật</button>
					</div>
				</form>
			</div>
			<!-- /panel -->
		</div>
		<!-- /.col-->
	</div>
</div>
@endsection
@section('script')
@section('script')
	<script type="text/javascript" src="{{asset('backend/js/tinymce/main.js')}}">
</script>
<script type="text/javascript" src="{{asset('backend/js/modal/add_image_file_management.js')}}"></script>
@endsection
