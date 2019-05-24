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
					<div class="col-xl-7">
						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Chi tiết đơn hàng</h6>
								<div class="header-elements">
									<div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
					      <span class="badge badge-success">Order</span>
									</div>
								</div>
							</div>
			    <table class="table table-bordered">
								  <tbody>

								    <tr>
								      <td>Ngày đặt hàng</td>
								      <td>{{ $ordersdetails->created_at }}</td>
								    </tr>
								    <tr>
								      <td>Trạng thái</td>
								      <td >{{ $ordersdetails->status }}</td>
								    </tr>
								    <tr>
								      <td>Trạng thái</td>
								      <td >{{ $ordersdetails->payment_method }}</td>
								    </tr>
								 
								  </tbody>
								</table>
						</div>
						<!-- /traffic sources -->
					</div>
					<div class="col-xl-5">
						<!-- Sales stats -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Khách hàng</h6>
	       </div>
	         <table class="table table-bordered">
								  <tbody>
								    <tr>
								      <td>Tên khách hàng</td>
								      <td>{{ $ordersdetails->name }}</td>
								    </tr>
								    <tr>
								      <td>Email</td>
								      <td >{{ $ordersdetails->customer_email }}</td>
								    </tr>
								  </tbody>
								</table>
	      </div>
	      <div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Cập nhật trạng thái đơn hàng</h6>
	       </div>
	       <form class="form-inline" action="{{ url('admin/order/update-order-status') }}" method="POST" accept-charset="utf-8">
							  <input type="hidden" name="_token" value="{{ csrf_token() }}">
							   <input type="hidden" name="order_id" value="{{ $ordersdetails->id}}">
	      		<select name="status" required="" class="form-control" style="width: 200px;">
	      			<option value="New" @if($ordersdetails->status=="New") selected @endif >Mới</option>
	      			<option value="Pending"  @if($ordersdetails->status=="Pending") selected @endif>Đang xử lý</option>
	      			<option value="Shipping" @if($ordersdetails->status=="Shipping") selected @endif>Đang vận chuyển</option>
	      			<option value="Shipped" @if($ordersdetails->status=="Shipped") selected @endif>Đã vận chuyển</option>
	      			<option value="Cancelled" @if($ordersdetails->status=="Cancelled") selected @endif>Hủy</option>	      	
	      		</select>
							  <button type="submit" class="btn btn-success " style="margin-left: 25px;">Cập nhật</button>
							</form>
	      </div>
	     </div>
	</div>
	<div class="row">
					<div class="col-xl-7">
						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Hóa đơn</h6>
								<div class="header-elements">
									<div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
					      <span class="badge badge-danger">Billing</span>
									</div>
								</div>
							</div>
								<table class="table table-bordered">
									  <tbody>
									    <tr>
									      <td>{{ $customer_details->name }}</td>
									    </tr>
									     <tr>
									      <td>{{ $customer_details->phone }}</td>
									    </tr>
									     <tr>
									      <td>{{ $customer_details->address }}</td>
									    </tr>
									  </tbody>
									</table>
						</div>
						<!-- /traffic sources -->
					</div>
					<div class="col-xl-5">
						<!-- Sales stats -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title"> Vận chuyển</h6>
	       </div>
	       			<table class="table table-bordered">
					  <tbody>
					    <tr>
					      <td>{{ $ordersdetails->name }}</td>
					    </tr>
					     <tr>
					      <td>{{ $ordersdetails->phone }}</td>
					    </tr>
					     <tr>
					      <td>{{ $ordersdetails->address }}</td>
					    </tr>
					  </tbody>
					</table>
	      </div>
	     </div>
	</div>
	<div class="row">
		<div class="col-md-12">
				<table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Product_code</th>
            <th scope="col">Product_name</th>
            <th scope="col">Product_size</th>
            <th scope="col">Product_color</th>
            <th scope="col">Product_price</th>
            <th scope="col">Product_qty</th>
          </tr>
        </thead>
        <tbody>
        	 	@foreach($ordersdetails->orders as $value)
          <tr>
            <td>{{ $value->product_code }}</td>
            <td>{{ $value->product_name }}</td>
            <td>{{ $value->product_size}}</td>
            <td>{{ $value->product_color }}</td>
            <td>{{ number_format($value->product_price*$value->quantity ) }} VNĐ</td>
            <td>{{ $value->quantity }}</td>
          </tr>
        @endforeach
        </tbody>
    </table>
		</div>
	</div>
	</div>
</div>
@endsection