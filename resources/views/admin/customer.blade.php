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
			<h2 align="center">Thông tin khách hàng</h2>
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
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Số điện thoại
								</th>
								<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" aria-sort="descending">Email
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Địa chỉ
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
							 	<td><a href="{{ url('admin/delete-customer/'.$cus->id) }}" class="dropdown-item" id="delete"><i class="icon-bucket"></i></td>
							 </tr> 
							 @endforeach() 
						</tbody>
					</table>
		</div>
	</div>
</div>
@endsection