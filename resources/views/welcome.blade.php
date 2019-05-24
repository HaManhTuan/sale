<!DOCTYPE html>
<html lang="zxx">
<head>
 <title>Bin Shop</title>
 <meta charset="UTF-8">
 <meta name="description" content=" Divisima | eCommerce Template">
 <meta name="keywords" content="divisima, eCommerce, creative, html">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Favicon -->
 <base href="{{ asset('') }}" >
 <link href="img/favicon.ico" rel="shortcut icon"/>

 <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
 

 <!-- Stylesheets -->
 <link rel="stylesheet" href="frontend/css/bootstrap.min.css"/>
 <link rel="stylesheet" href="frontend/css/font-awesome.min.css"/>
 <link rel="stylesheet" href="frontend/css/flaticon.css"/>
 <link rel="stylesheet" href="frontend/css/slicknav.min.css"/>
 <link rel="stylesheet" href="frontend/css/jquery-ui.min.css"/>
 <link rel="stylesheet" href="frontend/css/owl.carousel.min.css"/>
 <link rel="stylesheet" href="frontend/css/animate.css"/>
 <link rel="stylesheet" href="frontend/css/style.css"/>
</head>
<body>
 <!-- Page Preloder -->
 <div id="preloder">
  <div class="loader"></div>
 </div>

 <!-- Header section -->
 <header class="header-section">
  <div class="header-top">
   <div class="container">
    <div class="row">
     <div class="col-lg-2 text-center text-lg-left">
      <!-- logo -->
      <a href="{{ url('') }}" class="site-logo">
       <img src="frontend/img/logo.png" alt="">
      </a>
     </div>
     <div class="col-xl-6 col-lg-5">
      <form class="header-search-form" action="{{ url('search-product') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <input type="text" name="product" placeholder="Search on divisima ....">
       <button type="submit"><i class="flaticon-search"></i></button>
      </form>
     </div>
     <div class="col-xl-4 col-lg-5">
      <div class="user-panel">
       @if(Auth::guard('customers')->check())
        <div class="up-item">
        <i class="flaticon-profile"></i>
        <a href="#">{{ Auth::guard('customers')->user()->name}}</a>
       </div> 
        <div class="up-item" style="margin-left: -20px">
        <a href="{{ url('dang-xuat') }}">Đăng xuất</a>
       </div>
      <div class="up-item" style="margin-left: 15px">
        <a href="{{ url('history_customer') }}">History</a>
       </div>
       @else
       <div class="up-item" >
        <i class="flaticon-profile"></i>
        <a href="{{ url('dang-nhap') }}">Log</a>in
       </div>
        <div class="up-item">
        <i class="flaticon-profile"></i>
        <a href="{{ url('dang-ki') }}">Sign</a>In 
       </div>
       @endif
     
       <div class="up-item" style="margin-left: 25px;">
        <div class="shopping-card">
         <i class="flaticon-bag"></i>
         <span>{{ $cart }}</span>
        </div>
        <a href="{{ url('/cart') }}">Cart</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <nav class="main-navbar">
   <div class="container">
    <!-- menu -->
    <ul class="main-menu">
     <li><a href="{{ url('/') }}">Home</a></li>
    @foreach($categories as $value)
    <li><a href="#">{{ $value->name }}</a>
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
     

     <li><a href="#">Contact</a>
     
     </li>
     <li><a href="#">Blog</a></li>
    </ul>
   </div>
  </nav>
 </header>
 <!-- Header section end -->



@yield('content')


 <!-- Footer section -->
 <section class="footer-section">
  <div class="container">
 
   <div class="row">
    <div class="col-lg-3 col-sm-6">
     <div class="footer-widget about-widget">
      <h2>Thông tin</h2>
      <p>Địa chỉ văn phòng: Tân Triều, Triều Khúc, Thanh Xuân, Hà Nội</p>
<p> Bin Shop nhận đặt hàng trực tuyến và giao hàng tận nơi, hỗ trợ mua và nhận hàng trực tiếp tại văn phòng hoặc trung tâm xử lý đơn hàng.</p>
    
     </div>
    </div>
    <div class="col-lg-3 col-sm-6">
     <div class="footer-widget about-widget">
      <h2> Về Bin Shop</h2>
      <ul>
       <li><a href="">Giới thiệu</a></li>
       <li><a href="">Tuyển dụng</a></li>
       <li><a href="">Chính sách bảo mật và thanh toán</a></li>
       <li><a href="">Điều khoản sử dụng</a></li>
       <li><a href="">Tư vấn </a></li>
       <li><a href="">Chính sách hàng nhập khẩu</a></li>
      </ul>
  
     </div>
    </div>
    <div class="col-lg-3 col-sm-6">
     <div class="footer-widget about-widget">
      <h2>Blog</h2>
      <div class="fw-latest-post-widget">
       <div class="lp-item">
        <div class="lp-thumb set-bg" data-setbg="frontend/img/blog-thumbs/1.jpg"></div>
        <div class="lp-content">
         <h6>what shoes to wear</h6>
         <span>Oct 21, 2019</span>
         <a href="#" class="readmore">Read More</a>
        </div>
       </div>
       <div class="lp-item">
        <div class="lp-thumb set-bg" data-setbg="frontend/img/blog-thumbs/2.jpg"></div>
        <div class="lp-content">
         <h6>trends this year</h6>
         <span>Oct 21, 2019</span>
         <a href="#" class="readmore">Read More</a>
        </div>
       </div>
      </div>
     </div>
    </div>
    <div class="col-lg-3 col-sm-6">
     <div class="footer-widget contact-widget">
      <h2>Questions</h2>
      <div class="con-info">
      
       <p>Bin Shop </p>
      </div>
      <div class="con-info">
      
       <p>Tân Triều, Hà Nội </p>
      </div>
      <div class="con-info">
     
       <p>+53 345 7953 32453</p>
      </div>
      <div class="con-info">
     
       <p>office@youremail.com</p>
      </div>
     </div>
    </div>
   </div>
  </div>
<p class="text-white text-center ">Bản quyền &copy;<script>document.write(new Date().getFullYear());</script>Tập đoàn Bin đẹp trai <i class="fa fa-heart-o" aria-hidden="true"></i>  </p>
 </section>
 <!-- Footer section end -->



 <!--====== Javascripts & Jquery ======-->
 <script src="frontend/js/jquery-3.2.1.min.js"></script>
 <script src="frontend/js/bootstrap.min.js"></script>
 <script src="frontend/js/jquery.slicknav.min.js"></script>
 <script src="frontend/js/owl.carousel.min.js"></script>
 <script src="frontend/js/jquery.nicescroll.min.js"></script>
 <script src="frontend/js/jquery.zoom.min.js"></script>
 <script src="frontend/js/jquery-ui.min.js"></script>
 <script src="frontend/js/main.js"></script>
<script>
    $('#billtoship').click(function()
    {
      if (this.checked) {
        $('#shipping_name').val($('#bill_name').val());
        
        $('#shipping_address').val($('#bill_address').val());
        $('#shipping_phone').val($('#bill_phone').val());
      } 
      else
      {
        $('#shipping_name').val('');
      
        $('#shipping_address').val('');
        $('#shipping_phone').val('');
      }
    });
    function selectPaymentMethod()
    {
      if ($('#COD').is(':checked')||$('#Paypal').is(':checked')) {
        
      }
      else
      {
        alert("Hãy chọn hình thức thanh toán");
        return false;
      }
      

    }
  </script>

        


 </body>
</html>