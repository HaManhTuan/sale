@extends('admin-layout')
@section('content')
<div class="container">
	<div class="row">
			<div class="col-md-12">
				<h2 align="center">Cập nhật chức vụ</h2>
			</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<form action="" method="post" accept-charset="utf-8">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
     <div class="form-group">
      <label>Tên: </label>
      <label class="form-control">{{ $user_name->name }}</label>
     </div>
     <div class="form-group">
     	<label>Level:</label>
     	  <select class="form-control" name="admin">
       
          <option value="1" @if($user_name->admin==1) selected 	@endif >
          	  Admin
         </option>
          <option value="0" 	@if($user_name->admin==0) selected 	@endif>
           	User
          </option>
        </select>
     </div>
     <button type="submit" class="btn btn-primary">Cập nhật</button>
		 </form>
		</div>
	</div>

</div>


@endsection