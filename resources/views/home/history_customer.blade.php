@extends('welcome')
@section('content')
<div class="container">
	<div class="row" style="margin-top: 100px; margin-bottom: 30px">
	<div class="col-md-12">
		<h2 align="center">Lịch sử mua hàng</h2>
	</div>	
	</div>
	<div class="row" style="margin-bottom: 100px">
		<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Order_ID</th>
      <th scope="col">Product</th>
      <th scope="col">Payment_method</th>
      <th scope="col">Total Price</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  	 	@foreach($order as $value)
    <tr>
      <td>{{ $value->id }}</td>
      <td>
      	@foreach($value->orders as $value2)
          <a href="{{ url('history_customer/'.$value->id) }}" >{{ $value2->product_code }}</a><br>
      	@endforeach
      </td>
      <td>{{ $value->payment_method}}</td>
      <td>{{ number_format($value->total_price) }} VNĐ</td>
      <td>{{ $value->created_at }}</td>
      <td><a href="{{ url('history_customer/'.$value->id) }}" >Xem chi tiết</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
	</div>
</div>
@endsection
