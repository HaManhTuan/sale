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
						<span class="breadcrumb-item active">Product</span>
					</div>

					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>

		</div>
	</div>
		
		<div class="col-md-2">
			<a class="btn btn-primary" href="{{ url('admin/product/add-product') }}" role="button">Thêm mới</a>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-12">
	<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
		<div class="datatable-scroll">
			<table class="table datatable-html dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">ID
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Danh mục
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Tên SP
								</th>
								<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" aria-sort="descending">Mã SP
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Giá
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" >Image
								</th>
								
								<th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">Actions
								</th>
							</tr>
						</thead>
						<tbody>
						@foreach($products as $pro)           
					       <tr role="row" class="even">
					        <td class="">{{ $pro->id }}</td>
					        <td>{{ $pro->category->name }}</td>
					        <td>{{ $pro->product_name }}</td>
					        <td class="sorting_1">{{ $pro->product_code }}</td>
					        <td class="">{{ number_format($pro->price)  }} VNĐ
					        </td>
					        <td class=""><img src="backend/upload/product/{{ $pro->image }}" style="width: 100px">
					        </td>
						<td class="text-center">
							<div class="list-icons">
								<div class="dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-right">
										<a href="#exampleModal{{ $pro->id }}" class="dropdown-item" data-toggle="modal" ><i class="icon-eye2"></i> Xem</a>
										<a href="{{ url('/admin/product/update-product/'.$pro->id) }}" class="dropdown-item"><i class="icon-pen6"></i> Sửa</a>
										<a href="{{ url('/admin/product/add-attribute/'.$pro->id) }}" class="dropdown-item"><i class="icon-book"></i> Thuộc tính</a>
										<a href="{{ url('/admin/product/add-images/'.$pro->id) }}" class="dropdown-item"><i class="icon-images2"></i> Thêm Ảnh</a>
										<a href="{{ url('/admin/product/delete-product/'.$pro->id) }}" class="dropdown-item" id="delete"><i class="icon-bucket"></i> Xóa</a>
									</div>
								</div>
							</div>
						</td>
						<div class="modal fade" id="exampleModal{{ $pro->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					    <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h3 class="modal-title" id="exampleModalLabel">Product Details</h3>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
									<?php
									$attribute=DB::table('product_attributes')->where('product_id',$pro->id)->get();
									
									?>
					  <div class="modal-body">
					   	<div class="row">
					   		 <div class="col-md-8">
					   		 	 <p>Tên: <span class=" badge badge-success" style="font-size: 16px">{{ $pro->product_name }}</span></p>
					        <p>Mã: <span class=" badge badge-primary" style="font-size: 14px">{{ $pro->product_code }}</span></p>
					         <p>Price: <span class=" badge badge-danger" style="font-size: 14px">{{ number_format($pro->price)}} VNĐ</span></p>
							       <p>Material: {{ $pro->care }} </p>																     
							       <p>Description: {{ $pro->description }}</p>
							       <p>Màu: </p>
					         <p>Size: 
					          @foreach($attribute as $value)
					             {{ $value->size }} |
					             @endforeach
					          </p>
					          <p>Số lượng: @foreach($attribute as $value)
					             {{ $value->stock }} |
					             @endforeach
					          </p>
					  		 </div>
					  		 <div class="col-md-4">
					   		  <img src="{{ asset('backend/upload/product/'.$pro->image) }}" style="width:100%;">
					   	</div>
					  		</div>
					  </div>
					   <div class="modal-footer">
					     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					   </div>
					      	</div>
					      </div>
					</div>
					       </tr>
					       @endforeach
					      </tbody>
					</table>
				</div>
			</div>
		</div>
	
	</div>
</div>
@endsection