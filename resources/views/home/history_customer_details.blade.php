@extends('welcome')
@section('content')
<div class="container">
	<div class="row" style="margin-top: 100px; margin-bottom: 30px">
	<div class="col-md-12">
    <a href="{{ url('history_customer') }}" ><h2 align="left">Order</h2></a>
		
	</div>	
	</div>
  <div class="row"> 
    <a href="">Home</a> /
   <a href="">{{ $orderDetails->id }}</a>  
  </div>
	<div class="row" style="margin-bottom: 100px">
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
        	 	@foreach($orderDetails->orders as $value)
          <tr>
            <td>{{ $value->product_code }}</td>
            <td>{{ $value->product_name }}</td>
            <td>{{ $value->product_size}}</td>
            <td>{{ $value->product_color }}</td>
            <td>{{  number_format($value->product_price* $value->quantity) }} VNĐ</td>
            <td>{{ $value->quantity }}</td>
          </tr>
        @endforeach
        </tbody>
    </table>
	</div>
</div>
@endsection
