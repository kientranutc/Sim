@extends('backend.layouts.master') @section('title') create user
@endsection @section('breadcrumb') create user @endsection
@section('content')
<div class="padding-md">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form class="no-margin" id="formValidate1" action="{{URL::route('users.createpost')}}" method="post">
						 {{ csrf_field() }}
					<div class="panel-heading">Add User</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{($errors->has('name'))?"has-error":""}} ">
									<label for="name" class="control-label">Username</label> <input
										type="text" placeholder="Username" name="name" value="{{old('name')}}"
										class="form-control input-sm" data-required="true">
										<p class="text-danger"> {{$errors->first('name')}}</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group {{($errors->has('fullname'))?"has-error":""}}">
									<label class="control-label">Fullname</label> <input
										type="text" placeholder="Fullname" name="fullname" value="{{old('fullname')}}"
										class="form-control input-sm" data-required="true"
										>
										<p class="text-danger"> {{$errors->first('fullname')}}</p>
								</div>
							</div>
						</div>
						<div class="form-group {{($errors->has('email'))?"has-error":""}}">
									<label class="control-label">Email</label> <input
										type="text" placeholder="email" name="email" value="{{old('email')}}"
										class="form-control input-sm" data-required="true">
										<p class="text-danger"> {{$errors->first('email')}}</p>
								</div>
						<!-- /form-group -->

						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{($errors->has('password'))?"has-error":""}}">
									<label class="control-label">Password</label> <input
										type="password" placeholder="Password" name="password"
										class="form-control input-sm" id="password"
										data-required="true">
										<p class="text-danger"> {{$errors->first('password')}}</p>
								</div>
								<!-- /form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-6">
								<div class="form-group {{($errors->has('confirm_password'))?"has-error":""}}">
									<label class="control-label">Confirm Password</label> <input
										type="password" name="confirm_password" placeholder="Confirm Password"
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
						<button type="submit" class="btn btn-success">Add</button>
					</div>
				</form>
			</div>
			<!-- /panel -->
		</div>
		<!-- /.col-->
	</div>
</div>
@endsection
