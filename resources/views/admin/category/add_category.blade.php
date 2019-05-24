@extends('admin-layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">Add Category</span>
					</div>

					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>

		      </div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-8">
	 @if(Session::has('flash_message_success'))
   <div class="alert bg-success text-white alert-styled-left alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
				<span class="font-weight-semibold">Well done!</span> {{ Session::get('flash_message_success') }}
		 </div>     
            
        
  @endif
		</div>
	</div>	 
	<div class="row"> 
		<div class="col-md-8">
						<legend class="text-uppercase font-size-sm font-weight-bold">Hãy điền đầy đủ thông tin vao form</legend>
		 <form action="{{ url('admin/category/add-category') }}" method="post" accept-charset="utf-8">
		 	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		  <fieldset class="mb-3">
					

								<div class="form-group row">
									<label class="col-form-label col-lg-2">Tên danh mục</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="name" placeholder="Giày Nam">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-2">Mô tả</label>
									<div class="col-lg-10">
										<textarea rows="10" cols="3" class="form-control" name="description" placeholder="Giày Nam "></textarea>
									</div>
								</div>
								<div class="form-group row">
        	<label class="col-form-label col-lg-2">Danh mục</label>
        	<div class="col-lg-10">
             <select class="form-control" name="parent_id">
                 <option value="0">--Danh mục--</option>
                   @foreach($levels as $val)
                  <option value="{{ $val->id }}">{{ $val->name }}</option>
                  @endforeach
             </select>
            </div>
        </div>
       	<div class="form-group row">
									<label class="col-form-label col-lg-2">URL</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="url" placeholder="url">
									</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-lg-2">Hiển thị</label>
									<div class="col-lg-10">
										<div class="form-check">
														<label class="form-check-label">
															<div class="uniform-checker border-warning-600 text-warning-800"><input type="checkbox" class="form-check-input-styled-warning" name="status"></div>
														  Tắt
														</label>
											</div>
										</div>
							</div>
				</fieldset>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Thêm <i class="icon-paperplane ml-2"></i></button>
				</div>
		 </form>
		</div>
		<div class="col-md-4">
			 		@if(count($errors)>0)
	 @foreach($errors->all() as $err)
	     <div class="alert bg-warning text-white alert-styled-left alert-dismissible">
									<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
									<span class="font-weight-semibold">Warning!</span> {{ $err }} <br> 
								</div>
	      @endforeach
	     @endif
		</div>
	</div>
</div>
@endsection