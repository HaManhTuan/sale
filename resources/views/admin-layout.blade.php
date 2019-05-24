<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2019 14:34:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<base href="{{ asset('') }}" >
	<link href="backend/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="backend/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="backend/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="backend/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="backend/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="backend/assets/css/colors.min.css" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="backend/global_assets/js/main/jquery.min.js"></script>
	<script src="backend/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="backend/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="backend/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
	<script src="backend/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="backend/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="backend/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="backend/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="backend/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="backend/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="backend/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="backend/assets/js/app.js"></script>
	<script src="backend/global_assets/js/demo_pages/dashboard.js"></script>
	<script src="backend/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	<script src="backend/global_assets/js/plugins/notifications/bootbox.min.js"></script>
	<script src="backend/global_assets/js/demo_pages/components_modals.js"></script>
	<script src="backend/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<!-- 	<script src="backend/assets/js/app.js"></script> -->
	<script src="backend/global_assets/js/demo_pages/datatables_data_sources.js"></script>
	<!-- /theme JS files --><script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
 <script src="backend/global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>

	
	<script src="backend/global_assets/js/demo_pages/charts/echarts/columns_waterfalls.js"></script>
	<script src="backend/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
	<script src="backend/global_assets/js/demo_pages/invoice_template.js"></script>
	<!-- /theme JS files -->
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<img src="backend/global_assets/images/logo_light.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="backend/global_assets/images/demo/users/face1.jpg" class="rounded-circle mr-2" height="34" alt="">
						@if(Auth::check())
						<span>{{Auth::user()->name }}</span>
						@endif
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
						<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="{{ url('admin/logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->

             
			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="backend/global_assets/images/demo/users/face1.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">Victoria Baker</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a href="#" class="text-white"><i class="icon-cog3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="{{ url('admin/') }}" class="nav-link {{ request()->is('admin') ?'active':'' }} ">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-pencil"></i> <span>Quản lý</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="{{ url('admin/category/view-category') }}" class="nav-link active">Danh mục</a></li>
								<li class="nav-item"><a href="{{ url('admin/product/view-product') }}" class="nav-link active">Sản phẩm</a></li>
								@if(Auth::check())
								 @if(Auth::user()->admin == 1) 
								<li class="nav-item"><a href="{{ url('admin/user/view-user') }}" class="nav-link active">Người dùng</a></li>
							@endif
								@endif
								
							</ul>
						</li>
						<li class="nav-item ">
							<a href="{{ url('admin/customer') }}" class="nav-link"><i class="icon-user"></i> <span>Khách hàng</span></a>
						</li>
						<li class="nav-item ">
							<a href="{{ url('admin/order/view-order') }}" class="nav-link"><i class="icon-cart5"></i> <span>Đơn hàng</span></a>
						</li>
						<!-- /main -->
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

			</div>
			<!-- /page header -->

		<div class="content">
			

         @yield('content')

		</div>
		</div>
		<!-- /main content -->

	</div>

	<!-- /page content -->

</body>

	    <script>
            $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><input type="text" name="sku[]" style="width:150px;margin-top:3px"/>&nbsp;<input type="text" name="size[]" style="width:150px;margin-top:3px"/>&nbsp;<input type="text" name="price[]" style="width:150px;margin-top:4px"/>&nbsp;<input type="text" name="stock[]" style="width:150px;margin-top:3px"/><a href="javascript:void(0);" class=" btn btn-danger remove_button" title="Remove field" style="font-size:11px; margin-left:3px">Remove</a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        $(addButton).click(function(){ //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>
    
<!-- Mirrored from demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2019 14:50:18 GMT -->
</html>
