@extends('admin-layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			 @if(Session::has('thanhcong'))
   <div class="alert bg-success text-white alert-styled-left alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
				<span class="font-weight-semibold">Well done!</span> {{ Session::get('thanhcong') }}
		 </div>       
  @endif
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2 align="center">Thông tin nhân viên</h2>
		</div>
	</div>
<div class="row">
		<div class="col-md-10">
			
		</div>
			<div class="col-md-2">
			<a href="{{ url('admin/user/add-user') }}" class="btn btn-primary " role="button">Thêm </a>
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
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Tên
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Địa chỉ
								</th>
								<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" aria-sort="descending">Email
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Số điện thoại
								</th>	
								<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" aria-sort="descending">Level
								</th>			
								<th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">Actions
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($customer as $cus)
							 <tr role="row" class="even">
							 	<td>{{  $cus->id }}</td>
							 	<td>{{  $cus->name }}</td>
							 	<td>{{  $cus->address }}</td>
							 	<td>{{  $cus->email }}</td>
							 	<td>{{  $cus->phone }}</td>
							 	<td>
							 		@if($cus->admin==1)
            <span class="badge badge-danger">Admin</span>
          @else
             <span class="badge badge-primary">User</span>
							 		@endif
							 		</td>
							 	<td>
							 			<div class="list-icons">
											<div class="dropdown">
												<a href="#" class="list-icons-item" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="{{ url('admin/user/delete-user/'.$cus->id) }}" class="dropdown-item" id="delete"><i class="icon-bucket"></i>Xóa</a>
							 		<a href="{{ url('admin/user/update-user/'.$cus->id) }}" class="dropdown-item"><i class="icon-pen6"></i>Level</a>
												</div>
											</div>
										</div>
							 		
							 	</td>
							 </tr> 
							 @endforeach() 
						</tbody>
					</table>
		</div>
	</div>
</div>


@endsection