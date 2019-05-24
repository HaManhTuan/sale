@extends('welcome')
@section('content')
	<div class="content-page woocommerce">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="title-shop-page" align="center" style="margin-top: 20px;">CHECKOUT</h2>
						<div class="row" style="margin-top: 50px;">
							<div class="col-md-6 col-sm-6 col-ms-12">
								<div class="check-billing">
									<form class="form-group" method="post" action="{{ url('check-out') }}">{{ csrf_field() }}
										<h2 style="margin-bottom: 10px">Billing Details</h2>
								    <div class="form-group">
								    	 <input name="bill_name" value="{{ $customerDetails->name }}" type="text" class="form-control" id="bill_name"   placeholder="Bill Name">
								    </div>
							
								    <div class="form-group">
								    	 <input name="bill_address" value="{{ $customerDetails->address }}"type="text" class="form-control"  id="bill_address" placeholder="Bill Address">
								    </div>
								    <div class="form-group">
								    	 <input name="bill_phone" value="{{ $customerDetails->phone }}"type="text" class="form-control" id="bill_phone"   placeholder="Bill Phone">
								    </div>
										<p>
											<input type="checkbox" id="billtoship"> <label for="remember">Shipping address same as Billing Address </label>
										</p>
									
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-ms-12">
										 <h2 style="margin-bottom: 10px">Shipping to</h2>
										<div class="form-group">
								    	 <input name="shipping_name" value="" id="shipping_name" type="text" class="form-control"  placeholder="Shipping Name">
								    </div>
								    <div class="form-group">
								    	 <input name="shipping_address" value="" id="shipping_address" type="text" class="form-control"  placeholder="Shipping Address">
								    </div>
								    <div class="form-group">
								    	 <input name="shipping_phone" value="" id="shipping_phone" type="text" class="form-control"  placeholder="Shipping Phone">
								    </div>
								    <button type="submit" class="btn btn-success">Checkout</button>
									</form>
								</div>		
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</div>	
@endsection