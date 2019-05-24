@extends('welcome')
@section('content')
 	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Danh Sách Sản Phẩm</h4>@if(!empty($search_product))
			{{ $search_product }}
			@else
			{{ $categoryDetails->name }}
			@endif

		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Danh Mục</h2>
						<ul class="category-menu">
							 @foreach($categories as $value)
							<li><a href="">{{ $value->name }}</a>
								<ul class="sub-menu">
									@if($value->categories)
		        @foreach($value->categories as $value2)
		            @if($value2->status==1)
		            <li><a href="{{ asset('danh-sach/'.$value2->url) }}">{{ $value2->name }}</a></li>
		            @endif
		         @endforeach
		       @endif
								</ul>
							</li>
					    @endforeach()
						</ul>
					</div>
					<div class="filter-widget">
						<h2 class="fw-title">Thương Hiệu</h2>
						<ul class="category-menu">
							<li><a href="#">Việt Nam </a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						@foreach($productsAll as $value)
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
						<!-- 			<div class="tag-sale">ON SALE</div> -->
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
						</div>
						@endforeach
					
						<div class="text-center w-100 pt-3">
							<button class="site-btn sb-line sb-dark">LOAD MORE</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->
@endsection