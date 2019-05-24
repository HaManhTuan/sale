@extends('admin-layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">User</span>
					</div>

					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>
				<a class="btn btn-primary" href="{{ url('/them-nguoi-dung') }}" role="button">Thêm</a>

		      </div>
		</div>
		
	</div>
</div>
<div class="container">
	
	<div class="row">

		@foreach($user as $value)
	<div class="col-md-3">
		<div class="card">
			<div class="card-header bg-light d-flex justify-content-between">
				<span><i class="icon-user-check mr-2"></i> </span>
				<span class="text-muted">{{ $value->created_at }}</span>
			</div>

			<div class="card-body">
				
					@if( $value->level ==1)
					    <h6 class="card-title font-weight-semibold">
					    	Admin
					    </h6>
					@endif
				<p class="card-text"><a href="#">{{ $value->name }}</a>	</p>
			    <p class="card-text" > SĐT: <code>{{ $value->phone_number }}</code>.</p>
				<p class="card-text" >Address: <code>{{ $value->address }}</code>.</p>
			</div>

			<div class="card-footer bg-transparent d-flex justify-content-between border-top-0 pt-0">
				<ul class="list-inline mb-0 mr-2">
					<li class="list-inline-item">
						<a href="#" class="text-pink-400"><i class="icon-heart5"></i></a>
					</li>
					<li class="list-inline-item">
						<a href="#" class="text-default"><i class="icon-bubble2"></i></a>
					</li>
				</ul>
				<ul class="list-inline mb-0">
					<div class="list-icons">
                    	<div class="list-icons-item dropdown">
	                    	<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
	                    	<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-164px, 16px, 0px);">
								<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Edit</a>
								<a href="#" class="dropdown-item"><i class="icon-phone2"></i> Delete</a>
							</div>
                    	</div>
                	</div>
				</ul>
			</div>
		</div>
	</div>
	@endforeach
</div>
	</div>

	



@endsection