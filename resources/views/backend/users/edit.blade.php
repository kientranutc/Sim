@extends('backend.layouts.master') @section('title') Sửa thông tin người dùng
@endsection @section('breadcrumb') Sửa thông tin người dùng @endsection
@section('content')
<div class="padding-md">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form class="no-margin" id="formValidate1" action="{{URL::route('users.edit-profile')}}" method="post">
						 {{ csrf_field() }}
					<div class="panel-heading">Sửa thông tin người dùng</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{($errors->has('name'))?"has-error":""}} ">
									<label for="name" class="control-label">Username</label> <input
										type="text" placeholder="Username" name="name" value="{{Auth::user()->name}}"
										class="form-control input-sm" data-required="true">
										<p class="text-danger"> {{$errors->first('name')}}</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group {{($errors->has('fullname'))?"has-error":""}}">
									<label class="control-label">Họ và tên</label> <input
										type="text" placeholder="Họ và tên" name="fullname" value="{{Auth::user()->fullname}}"
										class="form-control input-sm" data-required="true"
										>
										<p class="text-danger"> {{$errors->first('fullname')}}</p>
								</div>
							</div>
						</div>
						<div class="form-group {{($errors->has('email'))?"has-error":""}}">
									<label class="control-label">Email</label> <input
										type="text" placeholder="email" name="email" value="{{Auth::user()->email}}"
										class="form-control input-sm" data-required="true" disabled="disabled">
										<p class="text-danger"> {{$errors->first('email')}}</p>
								</div>
						<!-- /form-group -->

						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{($errors->has('password'))?"has-error":""}}">
									<label class="control-label">Mật khẩu</label> <input
										type="password" placeholder="Mật khẩu" name="password"
										class="form-control input-sm" id="password"
										data-required="true">
										<p class="text-danger"> {{$errors->first('password')}}</p>
								</div>
								<!-- /form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-6">
								<div class="form-group {{($errors->has('confirm_password'))?"has-error":""}}">
									<label class="control-label">Nhập lại mật khẩu</label> <input
										type="password" name="confirm_password" placeholder="Nhập lại mật khẩu"
										class="form-control input-sm"
										data-required="true">
										<p class="text-danger"> {{$errors->first('confirm_password')}}</p>
								</div>
								<!-- /form-group -->
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
