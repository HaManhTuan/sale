@extends('admin-layout')
@section('content')
<div class="container">
	<div class="row">
		<h1 >Thông tin đơn hàng</h1>
	</div>
	<div class="row">
		<div class="col-md-12">
	<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
		<div class="datatable-scroll">
			<table class="table datatable-html dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
							<thead>
								<tr role="row">
								<!-- 	<th>ID</th>
								<th>Ngày tạo</th>
								<th>Tên </th>
								<th>SĐT</th>
								<th style="width: 180px">Sản phẩm</th>
																    <th>Giá
																    </th>	
																    <th >Trạng thái</th>
								<th>Thanh toán</th>
								<th>Actions</th> -->
								
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">ID
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Ngày Tạo
								</th>
								<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" aria-sort="descending">Tên
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">SĐT
								</th>	
								<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" aria-sort="descending">Sản Phẩm
								</th>
								<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Thanh toán
								</th>
								<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" aria-sort="descending">Trạng thái
								</th>
								<th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" aria-sort="descending">Giá
								</th>			
								<th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">Actions
								</th>

								</tr>
							</thead>
							<tbody>
								@foreach($orders as $value)
								<tr>
           <td>{{ $value->id }}</td>
           <td>{{ $value->created_at }}</td>
           <td>{{ $value->name }}</td>
           
           <td>{{ $value->phone }}</td>
           <td>
           	@foreach($value->orders as $value2 )
           	{{ $value2->product_code }}
           	<span class="badge badge-danger">{{ $value2->quantity }}</span><br>
           	@endforeach
           </td>
              <td>{{ $value->payment_method }}</td>
          
           <td><span class=" badge badge-success">{{ $value->status }}</span></td>
         <td>{{ number_format($value->total_price )}} </td>
            <td><a href="{{ url('admin/order/view-orderdetails/'.$value->id) }}" ><i class="icon-eye2"></i></a>
            <a href="{{ url('admin/order/invoice/'.$value->id) }}" ><i class="icon-coins "></i></a></td>
        </tr>
        @endforeach()
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
</div>
@endsection