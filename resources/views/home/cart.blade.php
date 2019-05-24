@extends('welcome')
@section('content')
		<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">
							@if(Session::has('thanhcong'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
         <strong>{!! session('thanhcong') !!}</strong>
    </div>
    @endif
    					@if(Session::has('thatbai'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
         <strong>{!! session('thatbai') !!}</strong>
    </div>
    @endif
					<div class="cart-table">
						<h3>Your Cart</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Product</th>
									<th class="quy-th">Quantity</th>
									<th class="size-th">SizeSize</th>
									<th class="total-th">Price</th>
									<th class="total-th">Update</th>
								</tr>
							</thead>
							<tbody>
      <?php $total_amount = 0; ?>
						@foreach($customerCart as $cart)
								<tr>
									<td class="product-col">
										<img src="backend/upload/product/{{ $cart->image }}" alt="">
										<div class="pc-title">
											<h4> {{ $cart->product_name }}</h4>
											<p>{{ number_format($cart->price) }} VNĐ</p>
										</div>
									</td>
									<td class="quy-col">
												
									<a class="cart_quantity_up"  style="font-size: 20px;" href="{{ url('cart/update-cart/'.$cart->id.'/1') }}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2" style="border-radius: 30%;align-items: center;text-align: center;" >
									@if($cart->quantity>1)
									<a class="cart_quantity_down"  style="font-size: 20px;"href="{{ url('cart/update-cart/'.$cart->id.'/-1') }}"> - </a>
									@endif
									</td>
									<td class="size-col"><h4>{{ $cart->size }}</h4></td>
									<td class="total-col"><h4>{{ number_format($cart->price*$cart->quantity) }} VNĐ</h4></td>
									<td><a class="remove" href="{{ url('cart/delete-cart/'.$cart->id) }}"><i class="fa fa-trash-o"></i></a></td>
								</tr>
					 <?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
						@endforeach
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Total <span><?php echo number_format($total_amount) ?> VNĐ</span></h6>
						</div>
					</div>
				</div>
				</div>
				<div class="row" style="margin-top: 20px;">

				<div class="col-lg-4 card-right">
					<form class="promo-code-form">
						<input type="text" placeholder="Enter promo code">
						<button>Submit</button>
					</form>
					<a href="{{ url('check-out') }}" class="site-btn">Proceed to checkout</a>
					<a href="{{ url('/') }}" class="site-btn sb-dark">Continue shopping</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title text-uppercase">
				<h2>Continue Shopping</h2>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<div class="tag-new">New</div>
							<img src="./img/product/2.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Black and White Stripes Dress</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/5.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/9.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/1.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Related product section end -->
@endsection