@extends('welcome')
@section('content')
	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="frontend/img/bg.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
						
							<h2> Shop</h2>
							<p>Chuyên cung cấp các loại giày chính hãng. </p>
							
						</div>
					</div>

				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="frontend/img/bg-2.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							
							<h2>Hãy đến với  Shop</h2>
							<p>Đi mua giày nhớ đến  Shop. </p>
						
						</div>
					</div>
		
				</div>
			</div>

		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->



	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="frontend/img/icons/1.png" alt="#">
						</div>
						<h2>Thanh toán nhanh chóng</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="frontend/img/icons/2.png" alt="#">
						</div>
						<h2>Sản phẩm chất lượng</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="frontend/img/icons/3.png" alt="#">
						</div>
						<h2>Vận chuyển nhanh chóng</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>Sản phẩm nổi bật</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach($hot as $value)
				<div class="product-item">
					<div class="pi-pic">
						<img src="backend/upload/product/{{ $value->image }}" alt="">
						<div class="pi-links">
							<a href="{{ url('chi-tiet/'.$value->id) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>{{ number_format($value->price) }} VNĐ</h6>
						<p><a href="{{ url('chi-tiet/'.$value->id) }}" style="color: #EF2B2B">{{ $value->product_name }}</a> </p>
					</div>
				</div>
				@endforeach
			
			</div>
		</div>
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2> Sản phẩm đang bán</h2>
			</div>

			<div class="row">
				@foreach($ProductStatus as $value)
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="backend/upload/product/{{ $value->image }}" alt="">
							<div class="pi-links">
								<a href="{{ url('chi-tiet/'.$value->id) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>{{ number_format($value->price) }} VNĐ</h6>
							<p>	<a href="{{ url('chi-tiet/'.$value->id) }}" style="color: #EF2B2B">{{ $value->product_name }}</a> </p>
						</div>
					</div>
				</div>
				@endforeach
			
			</div>
			
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="frontend/img/banner-bg.jpg">
				
			</div>
		</div>
	</section>
	<!-- Banner section end  -->
@endsection