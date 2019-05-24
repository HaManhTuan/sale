<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hóa Đơn</title>
  <base href="{{ asset('') }}" >
  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
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
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script src="backend/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>

  <script src="backend/assets/js/app.js"></script>
  <script src="backend/global_assets/js/demo_pages/invoice_template.js"></script>
</head>
<body>
 <form action="{{ url('admin/order/pdf') }}" method="get" accept-charset="utf-8">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <input type="hidden" name="order_id" value="{{ $customerDetails->id }}">
    <div class="content">
     <div class="card-body">
      <div class="row">
       <div class="col-sm-6">
        <div class="mb-4">
         <img src="backend/global_assets/images/logo_demo.png" class="mb-3 mt-2" alt="" style="width: 120px;">
          <ul class="list list-unstyled mb-0">
          <li>2269 Tân Triều</li>
          <li>Thanh Xuân, Hà Nội</li>
          <li>888-555-2311</li>
         </ul>
        </div>
       </div>
       <div class="col-sm-6">
        <div class="mb-4">
         <div class="text-sm-right">
          <h4 class="text-primary mb-2 mt-md-2">Mã hóa đơn #{{$orderDetails->id}}</h4>
          <ul class="list list-unstyled mb-0">
           <li>Ngày đặt hàng: <span class="font-weight-semibold">{{$orderDetails->created_at}}</span></li>
          </ul>
         </div>
        </div>
       </div>
      </div>
      <div class="d-md-flex flex-md-wrap">
       <div class="mb-4 mb-md-2">
        <span class="text-muted">Hóa Đơn:</span>
         <ul class="list list-unstyled mb-0">
         <li><h5 class="my-2">{{$orderDetails->name}}</h5></li>
         <li>{{$orderDetails->address}}</li>
         <li>{{$orderDetails->phone}}</li>
         <li>{{$orderDetails->customer_email}}</li>
        </ul>
       </div>
       <div class="mb-2 ml-auto">
        <span class="text-muted">Thanh toán:</span>
        <div class="d-flex flex-wrap wmin-md-400" style="margin-top: 15px;">
         <ul class="list list-unstyled mb-0">
          <li>Hình thức: {{$orderDetails->payment_method}}</li>
          <li>Address: {{$orderDetails->address}}</li>
          <li>Số điện thoại: {{$orderDetails->phone}}</li>
          <li>Email: {{$orderDetails->customer_email}}</li>
         </ul>
        </div>
       </div>
      </div>
     </div>

     <div class="table-responsive">
         <table class="table table-lg">
             <thead>
                 <tr>
                     <th>Mô tả</th>
                     <th>Giá</th>
                     <th>Số lượng</th>
                     <th>Tổng</th>
                 </tr>
             </thead>
             <tbody>
              <?php $subtotal=0;?>
                @foreach($orderDetails->orders as $value)
                 <tr>
                     <td>
                      <h6 class="mb-0">{{ $value->product_name }}</h6>
                      <span class="text-muted">Màu: {{ $value->product_color }}, Size: {{ $value->product_size }} .</span>
                     </td>
                     <td>{{ number_format($value->product_price) }} VNĐ</td>
                     <td>{{ $value->quantity }}</td>
                     <td><span class="font-weight-semibold">{{ number_format($value->product_price*$value->quantity) }} VNĐ</span></td>
                 </tr>
                 <?php $subtotal=$subtotal + ($value->product_price*$value->quantity);?>
                @endforeach
             </tbody>
         </table>
     </div>

     <div class="card-body">
      <div class="d-md-flex flex-md-wrap">
       <div class="pt-2 mb-3">
        <h6 class="mb-3">Người được ủy quyền</h6>
        <div class="mb-3">
         <img src="backend/global_assets/images/signature.png" alt="" width="150">
        </div>

        <ul class="list-unstyled text-muted">
         <li>Eugene Kopyov</li>
         <li>2269 Tân Triều</li>
         <li>Thanh Xuân, Hà Nội</li>
         <li>888-555-2311</li>
        </ul>
       </div>

       <div class="pt-2 mb-3 wmin-md-400 ml-auto">
        <h6 class="mb-3">Tổng số</h6>
        <div class="table-responsive">
         <table class="table">
          <tbody>
           <tr>
            <th>Tổng cộng:</th>
            <td class="text-right">{{ number_format($subtotal) }}</td>
           </tr>
           <tr>
            <th>Phí vận chuyển: <span class="font-weight-normal"></span></th>
            <td class="text-right">0 VNĐ</td>
           </tr>
           <tr>
            <th>Tổng:</th>
            <td class="text-right text-primary"><h5 class="font-weight-semibold">{{ number_format($subtotal) }} VNĐ</h5></td>
           </tr>
          </tbody>
         </table>
        </div>


       </div>
      </div>
     </div>

     <div class="card-footer">
      <span class="text-muted">Cảm ơn bạn đã mua hàng tại Bin Shop. Hạn thanh toán trong vòng 30 ngày kể từ khi giao hàng. Có thể thanh toán chậm, nhưng với mức phí 10% mỗi tháng. Công ty có chi nhánh tại Việt Nam và Lào. Văn phòng đã đăng kí: 2269 Tân Triều, Thanh Xuân, Hà Nội. Số điện thoại: 888-555-2311  </span>
     </div>
    <div class="text-right mt-3">
     <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left"><b><i class="icon-paperplane"></i></b> In Hóa Đơn</button>
    </div>
    
    </div>
 </form>
</body>
</html>