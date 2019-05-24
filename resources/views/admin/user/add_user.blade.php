@extends('admin-layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header" align="center">Thêm Người Dùng</h1>
		</div>
	</div>

		@if(Session::has('thanhcong'))
          		<div class="alert alert-success">
          			{{ Session::get('thanhcong') }}
          		</div>
          	@endif
	<div class="row">

         <div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="{{ url('admin/add-user') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<fieldset class="form-group">
					<label for="exampleInputEmail1">Chức vụ:</label>
					  <select class="form-control" name="admin">
		                 <option value="">--Level--</option>
		                  <option value="1">Admin</option>
		                  <option value="0">User</option>
		              
		             </select>
				</fieldset>
					@if($errors->has('admin'))
					<small class="text-danger">{{ $errors->first('admin') }}.</small>
				@endif	
			<fieldset class="form-group">
				<label for="exampleInputEmail1">Tên:</label>
				<input type="text" class="form-control" name="name" placeholder="Hãy nhập tên">
				@if($errors->has('name'))
					<small class="text-danger">{{ $errors->first('name') }}.</small>
				@endif			
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Số điện thoại</label>
				<input type="text" class="form-control" name="phone" placeholder="Hãy nhập số điện thoại">
			</fieldset>
			@if($errors->has('phone'))
					<small class="text-danger">{{ $errors->first('phone') }}.</small>
				@endif	
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Địa Chỉ</label>
				<textarea name="address" rows="4" class="form-control" ></textarea>
			</fieldset>
			@if($errors->has('address'))
					<small class="text-danger">{{ $errors->first('address') }}.</small>
				@endif	
				<fieldset class="form-group">
				<label for="exampleInputPassword1">Email</label>
				<input type="email" class="form-control" name="email" placeholder="Hãy nhập email">
			</fieldset>
				@if($errors->has('email'))
					<small class="text-danger">{{ $errors->first('email') }}.</small>
				@endif
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Hãy nhập mật khẩu">
			</fieldset>
				@if($errors->has('password'))
					<small class="text-danger">{{ $errors->first('password') }}.</small>
				@endif
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Re-Password</label>
				<input type="password" class="form-control" name="re_password" placeholder="Hãy nhập lại mật khẩu">
			</fieldset>
				@if($errors->has('re_password'))
					<small class="text-danger">{{ $errors->first('re_password') }}.</small>
				@endif
			<button type="submit" class="btn btn-primary" style="float: right">Đăng Kí</button>
		</form>
				</div>

		<div class="col-md-2"></div>
						

	
</div>
</div>


@endsection