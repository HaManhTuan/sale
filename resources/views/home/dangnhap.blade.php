@extends('welcome')
@section('content')
<div class="container">	
	<div class="row" style="margin-top:30px;" >
		<h4 align="left" class="text-success" >Đăng nhập:*</h4>
	</div>
		@if(Session::has('thatbai'))
 		<div class="alert alert-danger">
 			{{ Session::get('thatbai') }}
 		</div>
 	@endif
 	
 			@if(Session::has('thanhcong'))
 		<div class="alert alert-success">
 			{{ Session::get('thanhcong') }}
 		</div>
 	@endif
	<div class="row" style="margin-top:10px; margin-bottom: 10px;" >
		<div class="col-md-8">
			<form action="{{ url('dang-nhap') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
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

			<button type="submit" class="btn btn-primary" style="float: right">Đăng Nhập</button>
			<a href="{{ url('dang-ki') }}"  style="float: right; margin-right:10px" class="btn btn-primary " role="button">Đăng kí</a>
		</form>
		</div>

	</div>
</div>
@endsection