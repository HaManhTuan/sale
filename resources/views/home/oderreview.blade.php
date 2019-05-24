@extends('welcome')
@section('content')
<div class="content-page woocommerce">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="title-shop-page" align="center" style="margin-top: 20px;">ORDER REVIEW</h2>
						<div class="row" style="margin-top: 50px;">
							<div class="col-md-6 col-sm-6 col-ms-12">
								<div class="check-billing">
									<form class="form-group" method="post" action="{{ url('check-out') }}">{{ csrf_field() }}
										<h2 style="margin-bottom: 10px">Billing Details</h2>
								    <div class="form-group">
								    	 <input name="bill_name" value="{{ $customerDetails->name }}" type="text" class="form-control" id="bill_name"   placeholder="Bill Name" readonly>
								    </div>
							
								    <div class="form-group">
								    	 <input name="bill_address" value="{{ $customerDetails->address }}"type="text" class="form-control"  id="bill_address" placeholder="Bill Address"readonly>
								    </div>
								    <div class="form-group">
								    	 <input name="bill_phone" value="{{ $customerDetails->phone }}"type="text" class="form-control" id="bill_phone"   placeholder="Bill Phone"readonly>
								    </div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-ms-12">
										 <h2 style="margin-bottom: 10px">Shipping to</h2>
										<div class="form-group">
								    	 <input name="shipping_name" value="{{ $shippingDetails->name }}" id="shipping_name" type="text" class="form-control"  placeholder="Shipping Name"readonly>
								    </div>
								    <div class="form-group">
								    	 <input name="shipping_address" value="{{ $shippingDetails->address }}" id="shipping_address" type="text" class="form-control"  placeholder="Shipping Address"readonly>
								    </div>
								    <div class="form-group">
								    	 <input name="shipping_phone" value="{{ $shippingDetails->phone }}" id="shipping_phone" type="text" class="form-control"  placeholder="Shipping Phone"readonly>
								    </div>
								    
									</form>
								</div>		
							</div>
						</div>
					</div>
					<div class="row">	
       		<h2 class="title-shop-page" align="center" style="margin-top: 20px;">My Cart</h2>
         <table cellspacing="0" class="shop_table cart table">
								<thead>
									<tr>
										<th class="product-remove">&nbsp;</th>
										<th class="product-thumbnail">&nbsp;</th>
										<th class="product-name">Product</th>
										<th class="product-price">Price</th>
										<th class="product-quantity">Quantity</th>
										<th class="product-subtotal">Total</th>
									</tr>
								</thead>
								
								<tbody>
									    <?php $total_price=0;?>
							         @foreach($customerCart as $cart)
     
									<tr class="cart_item">
										<td class="product-remove">
											<a class="remove" href="{{ url('cart/delete-cart/'.$cart->id) }}"><i class="fa fa-trash-o"></i></a>					
										</td>
										<td class="product-thumbnail">
											<a href="#"><img src="backend/upload/product/{{ $cart->image }}" style="height: 100px" /></a>					
										</td>
										<td class="product-name">
											<label>
											{{ $cart->product_name }}
             <p class="text-primary" >Code: {{ $cart->product_code }}|Size: {{ $cart->size }}</p>
														
										</label>
										<td class="product-price">
											<span class="amount">{{ number_format($cart->price) }} VNĐ </span>					
										</td>
										<td class="product-quantity">
									
									<a class="cart_quantity_up" href="{{ url('cart/update-cart/'.$cart->id.'/1') }}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2" style="border-radius: 20%">
									@if($cart->quantity>1)
									<a class="cart_quantity_down" href="{{ url('cart/update-cart/'.$cart->id.'/-1') }}"> - </a>
									@endif
									
										</td>
										<td class="product-subtotal">
											<span class="amount">{{ number_format($cart->price*$cart->quantity) }} VNĐ </span>					
										</td>
									</tr>
									<?php $total_price= $total_price + ($cart->price*$cart->quantity) ?>
									@endforeach


							</table>
				</div>
					<div class="row">
						<div class="col-md-9"></div>
						<div class="col-md-3">
							<label class="text-success"> Tổng tiền: <?php echo number_format($total_price) ?> VNĐ</label>
				
						</div>
					</div>
							<div class="row">
						
						<div class="col-md-12">
							<form action="{{ url('place-order') }}" method="POST" accept-charset="utf-8">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="total_price" value="{{ $total_price }}">
									<h2 class="text-danger">Chọn hình thức thanh toán:</h2>
								<ul class="payment_methods methods list-none">
									<li class="payment_method_cheque">
										<input type="radio" data-order_button_text="" id= "Paypal" value="COD" name="payment_method" class="input-radio" id="payment_method_cheque">
										<label for="payment_method_cheque">Thanh toán bằng thẻ 	</label>
									
									</li>
									<li class="payment_method_cod">
										<input type="radio" data-order_button_text="" id="COD" value="COD" name="payment_method" class="input-radio" id="payment_method_cod">
										<label for="payment_method_cod">Thanh toán khi giao hàng 	</label>
									</li>
								
								</ul>
								<div class="form-row place-order">
									<button type="submit" class="btn btn-primary" onclick="return selectPaymentMethod();">Place Order</button>
								</div>		
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>	
@endsection