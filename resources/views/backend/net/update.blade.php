@extends('backend.layouts.master') @section('title') Nhà Mạng
@endsection
 @section('breadcrumb')
Cập nhật nhà mạng
 @endsection
@section('content')
<div class="padding-md">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form class="no-margin" id="formValidate1" action="{{URL::route('net.edit',[$data->id])}}" method="post">
						 {{ csrf_field() }}
					<div class="panel-heading">Cập nhật nhà mạng</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group {{($errors->has('name'))?"has-error":""}} ">
									<label for="name" class="control-label">Tên nhà mạng</label> <input
										type="text" placeholder="Tên nhà mạng" name="name" value="{{old('name')?old('name'):$data->name}}"
										class="form-control input-sm" data-required="true">
										<p class="text-danger"> {{$errors->first('name')}}</p>
								</div>
							</div>

							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- /form-group -->
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
