@extends('admin-layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">Đơn hàng</span>
					</div>

					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>

		  </div>
		</div>
</div>

<div class="row">
<div class="col-xl-4">
<div class="card bg-pink-400">
	<div class="card-body">
		<div class="d-flex">
			<h3 class="font-weight-semibold mb-0">{{ count($ngay) }}</h3>
			<div class="list-icons ml-auto">
  		<div class="list-icons-item dropdown">
  			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-cog3"></i></a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 16px, 0px);">
							<a href="{{ url('admin/order/view-order') }}" class="dropdown-item"><i class="icon-sync"></i> Chi tiết</a>
						</div>
     </div>
   </div>
  </div>       	
 <div>
		Đơn hàng hôm nay
			<div class="font-size-sm opacity-75">{{ number_format($tien_ngay) }} VNĐ</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-4">
<div class="card bg-teal-400">
	<div class="card-body">
		<div class="d-flex">
			<h3 class="font-weight-semibold mb-0">{{ count($tuan) }}</h3>
			<div class="list-icons ml-auto">
  		<div class="list-icons-item dropdown">
  			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-cog3"></i></a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 16px, 0px);">
							<a href="{{ url('admin/order/view-order') }}" class="dropdown-item"><i class="icon-sync"></i> Chi tiết</a>
						</div>
     </div>
   </div>
  </div>       	
 <div>
		Đơn hàng tuần này
			<div class="font-size-sm opacity-75">{{ number_format($tien_tuan) }} VNĐ</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-4">
<div class="card bg-blue-400">
	<div class="card-body">
		<div class="d-flex">
			<h3 class="font-weight-semibold mb-0">{{ count($thang) }}</h3>
			<div class="list-icons ml-auto">
  		<div class="list-icons-item dropdown">
  			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-cog3"></i></a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 16px, 0px);">
							<a href="{{ url('admin/order/view-order') }}" class="dropdown-item"><i class="icon-sync"></i> Chi tiết</a>
						</div>
     </div>
   </div>
  </div>       	
 <div>
		Đơn hàng tháng này
			<div class="font-size-sm opacity-75">{{ number_format($tien_thang) }} VNĐ</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
<div class="row">	
		<div class="col-md-12">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">Đơn hàng cần xử lý</span>
					</div>
					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>
		  </div>
		</div>
</div>
<div class="row">
	<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
		<div class="datatable-scroll">
			<table class="table datatable-html dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
				<thead>
								<tr>
									<th>ID</th>
									<th>Ngày tạo</th>
									<th>Tên </th>
									<th>SĐT</th>
									<th style="width: 180px">Sản phẩm</th>
									<th>Thanh toán</th>
									<th >Trạng thái</th>
									<th>Tiền</th>
									<th>Actions</th>
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
         <td>{{ number_format($value->total_price )}} VNĐ</td>
            <td><a href="{{ url('admin/order/view-orderdetails/'.$value->id) }}" ><i class="icon-eye2"></i></a>
            <a href="{{ url('admin/order/invoice/'.$value->id) }}" ><i class="icon-coins "></i></a></td>
        </tr>
        @endforeach()
							</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row">	
		<div class="col-md-12">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">Đơn hàng đang  xử lý</span>
					</div>
					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>
		  </div>
		</div>
</div>
<div class="row">
	<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
		<div class="datatable-scroll">
			<table class="table datatable-html dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
				<thead>
								<tr>
									<th>ID</th>
									<th>Ngày tạo</th>
									<th>Tên </th>
									<th>SĐT</th>
									<th style="width: 180px">Sản phẩm</th>
									<th>Thanh toán</th>
									<th >Trạng thái</th>
									<th>Tiền</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders_pending as $value)
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
         <td>{{ number_format($value->total_price )}} VNĐ</td>
            <td><a href="{{ url('admin/order/view-orderdetails/'.$value->id) }}" ><i class="icon-eye2"></i></a>
            <a href="{{ url('admin/order/invoice/'.$value->id) }}" ><i class="icon-coins "></i></a></td>
        </tr>
        @endforeach()
							</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row">	
		<div class="col-md-12">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">Đơn hàng tháng này</span>
					</div>
					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>
				<a href="{{ url('admin/thongke-tien') }}" class="btn btn-primary " role="button" style="margin-right: 10px">Thống kê tiền</a>
		  </div>
		</div>
</div>
<div class="row">
<div class="col-md-12">
	 	 <div id="container" data-order="{{ $tk_1thang }}"></div>
	<script>
$(document).ready(function(){
    var order = $('#container').data('order');
    var listOfValue = [];
    var listOfYear = [];
    order.forEach(function(element){
        listOfYear.push(element.getYear);
        listOfValue.push(element.value);
    });
    console.log(listOfValue);
    var chart = Highcharts.chart('container', {

        title: {
            text: 'Thống kê đơn hàng tháng này'
        },

        subtitle: {
            text: 'Plain'
        },

        xAxis: {
            categories: listOfYear,
        },

        series: [{
            type: 'column',
            colorByPoint: true,
            data: listOfValue,
            showInLegend: false
        }]
    });
    
    $('#plain').click(function () {
        chart.update({
            chart: {
                inverted: true,
                polar: true
            },
            subtitle: {
                text: 'Plain'
            }
        });
    });

    $('#inverted').click(function () {
        chart.update({
            chart: {
                inverted: true,
                polar: false
            },
            subtitle: {
                text: 'Inverted'
            }
        });
    });

    $('#polar').click(function () {
        chart.update({
            chart: {
                inverted: false,
                polar: true
            },
            subtitle: {
                text: 'Polar'
            }
        });
    });
});
	</script>
</div>
</div>


</div>
 
@endsection