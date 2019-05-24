@extends('admin-layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">Add Attribute</span>
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
     @if(Session::has('flash_message_error'))
   <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Well done!</span> {{ Session::get('flash_message_error') }}
     </div>     
            
        
  @endif
		</div>
	</div>	 
	<div class="row"> 
		  <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/product/add-attribute/'.$productDetails->id) }}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
       <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
       <div class="form-group">
         <label>Category Name</label>
         <label class="form-control">{{ $category_name }}</label>
       </div>
       <div class="form-group">
         <label >Product Name</label>
         <label class="form-control">{{ $productDetails->product_name }}</label>
       </div>
       <div class="form-group">
         <label >Product Code</label>
         <label class="form-control">{{ $productDetails->product_code }}</label>
       </div>
       <div class="form-group">
         <label>Thuộc tính</label>
        <div class="field_wrapper">				    
					        <input  type="text" name="sku[]" id="sku" placeholder="SKU" style="width:150px;">
					        <input  type="text" name="size[]" id="size" placeholder="SIZE" style="width:150px;">
					        <input  type="text" name="price[]" id="price" placeholder="PRICE" style="width:150px;">
					        <input  type="text" name="stock[]" id="stock" placeholder="STOCK" style="width:150px;">
					        <a href="javascript:void(0);" class=" btn btn-primary add_button" style="font-size:11px" title="Add field">Add</a> 
					   </div>
       </div>
      
       <div class="form-group">
         <input type="submit" value="Add Attributes" class="btn btn-success">
       </div>
     </form>
		
		
	</div>
	<div class="row">
		<div class="col-md-12">
			 <form  action="{{ url('admin/product/edit-attributes/'.$productDetails->id) }}" method="post">{{ csrf_field() }}
              <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th>Attribute ID</th>
                    <th>Sku</th>
                    <th>Size</th>
                    <th>Price</th>
               
                    <th>Stock</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($productDetails['attributes'] as $attribute)
                  <tr class="gradeX">
                    <td class="center"><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                    <td class="center">{{ $attribute->sku }}</td>
                    <td class="center">{{ $attribute->size }}</td>
                    <td class="center"><input name="price[]" type="text" value="{{ $attribute->price }}" /></td>
               
                    <td class="center"><input name="stock[]" type="text" value="{{ $attribute->stock }}" required style="width: 100px" /></td> 
                    <td class="center">
                      <input type="submit" value="Update" class="btn btn-primary btn-mini" />
                      <a id="delete" href="{{ url('/admin/product/delete-attribute/'.$attribute->id) }}" class="btn btn-danger btn-mini ">Delete</a>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
    </form>
		</div>
		
	</div>
</div>
@endsection