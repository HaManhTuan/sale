@extends('admin-layout')
@section('content')
<div class="container">
	 @if(Session::has('flash_message_success'))
   <div class="alert bg-success text-white alert-styled-left alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
				<span class="font-weight-semibold">Well done!</span> {{ Session::get('flash_message_success') }}
		 </div>     
            
        
  @endif
	<div class="row">
		<div class="col-md-10">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">Category</span>
					</div>

					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>

		      </div>
		</div>
		<div class="col-md-2">
			<a class="btn btn-primary" href="{{ url('admin/category/add-category') }}" role="button">Thêm mới</a>
		</div>
		
	</div>
	<div class="row">
		<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>ID</th>
									<th>Hiển thị</th>
									<th>Tên Danh Mục</th>
									<th>Trạng thái</th>
									<th>URL</th>
									<th>Mô tả</th>
									<th>Chức năng</th>
								</tr>
							</thead>
							<tbody>
							@foreach($categories as $category)
         <tr>
           <td class="center">{{ $category->id }}</td>
           <td class="center">{{ $category->parent_id }}</td>
           <td class="center">{{ $category->name }}</td>
           <td class="center">
           	@if($category->status == 1)
           	<span class="badge badge-success">Hiển thị</span>
           	@else
           	<span class="badge badge-danger">Ẩn</span>
           	@endif
           </td>
           <td class="center">{{ $category->url }}</td>
           <td class="center">{{ $category->description }}</td>
           <td class="center">
             <a href="{{ url('/admin/category/update-category/'.$category->id) }}" class="btn btn-primary ">Edit</a> 
             <a  id="delete" href="{{ url('/admin/category/delete-category/'.$category->id) }}" class="btn btn-danger ">Delete</a></td>
         </tr>
         @endforeach
							</tbody>
						</table>
					</div>
	</div>
</div>
@endsection