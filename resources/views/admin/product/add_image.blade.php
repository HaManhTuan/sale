@extends('admin-layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">Add Image </span>
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
       <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/product/add-images/'.$productDetails->id) }}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
    <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
    <div class="control-group">
      <label class="col-lg-2 col-form-label font-weight-semibold">Danh mục:</label>
      <label class="form-control">{{ $category_name }}</label>
    </div>
    <div class="control-group">
      <label class="col-lg-2 col-form-label font-weight-semibold">Tên SP:</label>
      <label  class="form-control">{{ $productDetails->product_name }}</label>
    </div>
    <div class="control-group">
      <label class="col-lg-2 col-form-label font-weight-semibold">Mã SP:</label>
      <label  class="form-control">{{ $productDetails->product_code }}</label>
    </div>
  <div class="form-group">
  <label class="col-lg-2 col-form-label font-weight-semibold">Ảnh:</label>
  <div class="col-lg-10">
    <input type="file" class="file-input" name="image[]" data-show-caption="false" data-show-upload="false" data-fouc>
  </div>
</div>
   
    <div class="form-actions" style="margin-top: 20px">
      <input type="submit" value="Add Images" class="btn btn-success">
    </div>
  </form>
    
    </div>	
	</div>
	<div class="row">
		<div class="col-md-12">
		  <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Image ID</th>
                  <th>Product ID</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productImages as $image)
                <tr class="gradeX">
                  <td class="center">{{ $image->id }}</td>
                  <td class="center">{{ $productDetails->product_name }}</td>
                  <td class="center"><img width=130px src="{{ asset('backend/upload/product/'.$image->image) }}"></td>
                  <td class="center">
                    <a id="delete" href=" {{url('admin/product/delete-alt-image/'.$image->id)  }}" class="btn btn-danger btn-mini ">Delete</a></td>

                </tr>
                @endforeach
              </tbody>
        </table>
		</div>
		
	</div>
</div>
@endsection