@extends('backend.layouts.master') @section('title') User @endsection
@section('breadcrumb') User @endsection @section('content')
<div class="padding-md">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<div class="row">
						<div class="col-md-12">
							<div class="form-group form-inline">
								<a href="{{URL::route('users.create')}}" class="form-control btn btn-success">Add User</a>
							</div>
						</div>
			</div>
			</div>
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<lable>Total user:{{$dataUser->total()}}</lable>
						</div>
						<form action="" method="get">
						<div class="col-md-3">
							<div class="form-group form-inline">
								<label for="email" class="filter-title">Name/Email: </label>
								<input type="text" class="form-control" name="email" id="email" value="{{Request::get('email','')}}" placeholder="name/email">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group form-inline">
								<label for="active" class="filter-title">Active:</label>
								<select
									class="form-control" name="active" id="active">
									<option value="-1">--All--</option>
									<option value="0" {{(Request::get('active')==0)?'selected':''}}>InActive</option>
									<option value="1" {{(Request::get('active')==1)?'selected':''}}>Active</option>
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
				<table
					class="table table-bordered table-condensed table-hover table-striped">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">Name</th>
							<th class="text-center">Fullname</th>
							<th class="text-center">Email</th>
							<th class="text-center">Role</th>
							<th class="text-center">Last login</th>
							<th class="text-center">Active</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
					@forelse ($dataUser as $item)
						<tr>
							<td width="10%" class="text-center">{{++$stt}}</td>
							<td width="10%" class="text-center">{{$item->name}}</td>
							<td width="10%" class="text-center">{{$item->fullname}}</td>
							<td width="10%" class="text-center">{{$item->email}}</td>
							<td width="10%" class="text-center">{{$item->role_name}}</td>
							<td width="10%" class="text-center">{{$item->last_login}}</td>
							<td width="10%" class="text-center">
							@if($item->active==1)
							<span class="badge badge-success">Active</span>
							@else
							<span class="badge badge-danger">Inactive</span>
							@endif
							</td>
							<td width="10%" class="text-center">
							@if(env('EMAIL_ADMIN') !=$item->email)
    							@if($item->active==1)
    								<a href="{{URL::route('users.lock-unlock',[$item->id, $item->active])}}" class="btn btn-danger"><i class="fa fa-lock" aria-hidden="true"></i> Lock</a>
    							@else
    								<a href="{{URL::route('users.lock-unlock',[$item->id, $item->active])}}" class="btn btn-warning"><i class="fa fa-unlock" aria-hidden="true"></i> UnLock</a>
    							@endif
							@endif
							<a href="" class="btn btn-success "><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Update</a>
							</td>
						</tr>
				 	@empty
				 		<tr>
				 			<td colspan="8" class="text-center"> No data to show</td>
				 		</tr>
				 	@endforelse

					</tbody>
				</table>
			</div>
			<!-- /panel -->
				<div class="page-right padding-md">
			  {{
                    $dataUser ->appends(array(
                        'email'            => Request::get('email',''),
                        'active'=> Request::get('active',-1),
                        )
                    )->links()
                }}
        </div>
		</div>
	</div>
</div>
@endsection
