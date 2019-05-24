@extends('welcome')
@section('content')
	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="{{ url('/')}}"> &lt;&lt; Back to Home</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="backend/upload/product/{{ $productDetails->image }}" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
								@if(count($productAltImages)>0)
								 @foreach($productAltImages as $altimg)
									<div class="pt active" data-imgbigurl="backend/upload/product/{{ $altimg->image }}"><img src="backend/upload/product/{{ $altimg->image }}" alt=""></div>
									@endforeach
									@endif					
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					@if(Session::has('thatbai'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
         <strong>{!! session('thatbai') !!}</strong>
    </div>
    @endif
					<form action="{{ url('add-cart') }}" method="POST" accept-charset="utf-8">{{ csrf_field() }}
						<input type="hidden" name="product_id" value="{{ $productDetails->id }}">
      <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
      <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
      <input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
      <input type="hidden" name="price" id="price" value="{{ $productDetails->price }}">
					<h2 class="p-title">{{ $productDetails->product_name }}</h2>
					<h3 class="p-price text-danger" >{{ number_format($productDetails->price) }} VNĐ</h3>
					<h4 class="p-title">{{ $productDetails->product_code }}</h4>
					<h4 class="p-stock">Available: <span>@if($total_stock>0) In Stock @else Out Of Stock @endif</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div>
					<div class="fw-size-choose">
						<select id="selSize" name="size" style="width:150px;" required>
							<option value="">Chọn Size</option>
							@foreach($productDetails->attributes as $sizes)
							<option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>
							@endforeach
						</select>	
					</div>
					<div class="quantity">
						<p>Quantity</p>
       <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
     </div>
					<button type="submit" class="site-btn">SHOP NOW</button>
					</form>
				
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>{{ $productDetails->description }}</p>
									<p> Chất liệu: {{ $productDetails->care }}</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<!-- <section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>RELATED PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
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
	</section> -->
	<!-- RELATED PRODUCTS section end -->
@endsection