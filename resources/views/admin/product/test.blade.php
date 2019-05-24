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
		<div class="col-md-6">
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
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
		<div class="datatable-scroll">
			<table class="table datatable-html dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Position
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Age
								</th>
								<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" aria-sort="descending">Start date
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Salary
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" >Image
								</th>
								<th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">Actions
								</th>
							</tr>
						</thead>
						<tbody>
						@foreach($product as $value)           
       <tr role="row" class="even">
        <td class="">{{ $value->id }}</td>
        <td>{{ $value->category->name }}</td>
        <td>{{ $value->product_name }}</td>
        <td class="sorting_1"><a href="#">{{ $value->product_code }}</a></td>
        <td class="">{{ $value->price }}
        <p></p></td>
        <td class=""><img src="backend/upload/product/{{ $value->image }}" style="width: 100px">
        </td>
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
												<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
												<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
											</div>
										</div>
									</div>
								</td>
       </tr>
       @endforeach
      </tbody>
					</table>
				</div>
			</div>
	</div>
	<div class="row">
	<div class="col-md-10"></div>
	<div class="col-md-2">
	</div>
</div>
</div>
@endsection
