@extends('admin-layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">Update Product</span>
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
		<legend class="text-uppercase font-size-sm font-weight-bold">Hãy điền đầy đủ thông tin vào form</legend>
		 <form enctype="multipart/form-data"  method="post" action="{{url('admin/product/update-product/'.$productDetails->id) }}"accept-charset="utf-8">
		 	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		  <fieldset class="mb-3">
	
       <div class="form-group row">
	    <label class="col-form-label col-lg-2">Danh mục</label>
	    <div class="col-lg-10">
	      <select name="category_id"  class="form-control" >
	        <?php echo $categories_drop_down; ?>
	      </select>
	    </div>
	  </div>
								<div class="form-group row">
									<label class="col-form-label col-lg-2">Tên sản phẩm</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="product_name" value="{{ $productDetails->product_name }}" placeholder="Giày Nam">
									</div>
								</div>
							<div class="form-group row">
									<label class="col-form-label col-lg-2">Mã sản phẩm</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="product_code" value="{{ $productDetails->product_code }}" placeholder="NAM720">
									</div>
								</div>
					
								<div class="form-group row">
									<label class="col-form-label col-lg-2">Giá sản phẩm</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="price" value="{{ $productDetails->price }} "placeholder="5400000">
									</div>
							</div>
							<div class="form-group row">
									<label class="col-form-label col-lg-2">Mô tả sản phẩm:</label>
				
										<div class="col-lg-10">
										<textarea rows="10" cols="3" class="form-control" name="description" placeholder="Giày Nam ">{{
										  $productDetails->description }}</textarea>
					
									</div>
							</div>
							<div class="form-group row">
									<label class="col-form-label col-lg-2">Chất liệu:</label>
				
										<div class="col-lg-10">
										<textarea rows="1" cols="3" class="form-control" name="care" placeholder="Giày Nam ">{{  $productDetails->care }}</textarea>
					
									</div>
							</div>
							<div class="form-group row">

							</div>
							<div class="form-group row">
								<label class="col-form-label col-lg-2">Hiển thị</label>
									<div class="col-lg-10">
										<div class="form-check">
											<label class="form-check-label">
												<div class="uniform-checker border-warning-600 text-warning-800"><input type="checkbox" class="form-check-input-styled-warning" name="status" @if($productDetails->status == "0") checked @endif value="1"></div>
											  Tắt
											</label>
											</div>
										</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-2 col-form-label font-weight-semibold">Ảnh:</label>
								 <table>
                      <tr>
                        <td>
                          <input name="image" id="image" type="file">
                          @if(!empty($productDetails->image))
                            <input type="hidden" name="current_image" value="{{ $productDetails->image }}"> 
                          @endif
                        </td>
                        <td>
                          @if(!empty($productDetails->image))
                            <img style="width:30px;" src="{{ asset('backend/upload/product/'.$productDetails->image) }}"> 
                          @endif
                        </td>
                      </tr>
                    </table>
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