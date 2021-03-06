@extends('backend.layouts.master')
 @section('title')
 Thêm mới sim
@endsection
@section('breadcrumb')
Thêm mới sim
@endsection
@section('content')
<div class="padding-md">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form class="no-margin" id="formValidate1" action="{{URL::route('sim.create')}}" method="post">
						 {{ csrf_field() }}
					<div class="panel-heading">Thêm mới sim</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{($errors->has('name'))?"has-error":""}} ">
									<label for="name" class="control-label">Số điện thoại</label> <input
										type="text" placeholder="Số điện thoại" name="name" value="{{old('name')}}"
										class="form-control input-sm phone" data-required="true">
										<p class="text-danger"> {{$errors->first('name')}}</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group {{($errors->has('price'))?"has-error":""}}">
									<label class="control-label">Giá</label> <input
										type="text" placeholder="Giá" name="price" value="{{old('price')}}"
										class="form-control input-sm" data-required="true"
										>
										<p class="text-danger"> {{$errors->first('price')}}</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{($errors->has('type_sim_id'))?"has-error":""}}">
									<label class="control-label">Nhà mạng</label>
										<select class="form-control input-sm" name="net_id">
											@forelse($dataTypeSim as $item)
											<option value="{{$item->id}}" {{(old('net_id')==$item->id)?'selected':''}}>{!!$item->name!!}</option>
											@empty
												<option value="0"></option>
											@endforelse
										</select>
										<p class="text-danger"> {{$errors->first('net_id')}}</p>
								</div>
								<!-- /form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-6">
								<div class="form-group {{($errors->has('type_sim_name'))?"has-error":""}}">
									<label class="control-label">Loại sim phong thủy</label>
										<select class="form-control input-sm" name="type_sim_name">
											@foreach(Config::get('constant.type_sim') as $k=>$v)
											<option value="{{$k}}" {{(old('type_sim_name')==$k)?'selected':''}}>{{$v}}</option>
											@endforeach
										</select>
										<p class="text-danger"> {{$errors->first('type_sim_name')}}</p>
								</div>
								<!-- /form-group -->
							</div>

							<!-- /.col -->
						</div>
						<!-- /form-group -->

						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{($errors->has('first_number'))?"has-error":""}}">
									<label class="control-label">Đầu số</label>
										<select class="form-control input-sm" name="first_number">
										@foreach(Config::get('constant.first_number_sim') as $k=>$v)
											<option value="{{$k}}"  {{(old('first_number')==$k)?'selected':''}}> {{$v}}</option>
										@endforeach
										</select>
										<p class="text-danger"> {{$errors->first('first_number')}}</p>
								</div>
								<!-- /form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-6">
									<div class="form-group {{($errors->has('status'))?"has-error":""}}">
									<label class="control-label">Trạng thái sim</label>
										<select class="form-control input-sm" name="status">
											<option value='0' {{(old('status')==0)?'selected':''}}>Chưa đặt hàng</option>
											<option value='1' {{(old('status')==1)?'selected':''}}>Đã đặt hàng bán</option>
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
						<!-- /.row -->

						<!-- /form-group -->
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
@endsection
@section('script')
@section('script')
	<script type="text/javascript" src="{{asset('backend/js/tinymce/main.js')}}">
</script>
<script type="text/javascript" src="{{asset('backend/js/modal/add_image_file_management.js')}}"></script>
@endsection
