<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use Auth;
use File;
use Hash;
use App\OrderDetails;
use App\Orders;
use App\Customers;
use PDF;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
 public function login(Request $req)
				{  
				 	if($req->isMethod('post')){
			    		 $data = $req->input();
							   $this->validate($req,[
						   	'email'=>'required',
						   	'password'=>'required'],[
						   		'email.required'=>'Bạn chưa nhập Email',
						   		'password.required'=>'Bạn chưa nhập Password']
						   );
							if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
			      return redirect('/admin/');
								}
							else {
							 return redirect('admin/login')->with('flash_message_error','Invalid Username or Password');
							}
				  }
						return view('admin.login');
				}
	public function logout()
		{
				Auth::logout();
		  return redirect('admin/login');
		}

	public function dashboard()
 {
/* 	Carbon::now(); // thời gian hiện tại 2018-10-18 14:15:43
Carbon::yesterday(); //thời gian hôm qua 2018-10-17 00:00:00
Carbon::tomorrow(); // thời gian ngày mai 2018-10-19 00:00:00
$newYear = new Carbon('first day of January 2018'); // 2018-01-01 00:00:00*/
/*$dt = Carbon::now('Asia/Ho_Chi_Minh');

echo $dt->toDayDateTimeString();  Thu, Oct 18, 2018 9:16 PM

echo $dt->toFormattedDateString(); // Oct 18, 2018

echo $dt->format('l jS \\of F Y h:i:s A'); // Thursday 18th of October 2018 09:18:57 PM

echo $dt->toDateString();               // 2018-10-18
echo $dt->toTimeString();               // 21:16:20
echo $dt->toDateTimeString();           // 2018-10-18 21:16:16*/
//Don hang hom nay
  $range=	Carbon::now()->toDateString();
  $ngay = DB::table('orders')->where('created_at',$range)->orderBy('created_at', 'ASC')->get();
  $tien_ngay = DB::table('orders')->where('created_at',$range)->sum('total_price');
//Don hang 1 tuan truoc 
  $range=	Carbon::now()->subWeeks(1);
  $tuan = DB::table('orders')->select(DB::raw('created_at'))->where('created_at','>',$range)->orderBy('created_at', 'ASC')->get();
   $tien_tuan = DB::table('orders')->where('created_at','>',$range)->sum('total_price');
   //Don hang thang nay
    $range=	Carbon::now()->subMonths(1);
  $thang = DB::table('orders')->select(DB::raw('created_at'))->where('created_at','>',$range)->orderBy('created_at', 'ASC')->get();
   $tien_thang = DB::table('orders')->where('created_at','>',$range)->sum('total_price');
  $range=	Carbon::now()->subMonths(3);
   $nam = DB::table('orders')->select(DB::raw('created_at'))->where('created_at','>',$range)->orderBy('created_at', 'ASC')->get();
   //Don hang chua xu ly
			$orders=Orders::with('orders')->where('status','New')->orderBy('id','DESC')->get();
 		$orders=json_decode(json_encode($orders));
    //Don hang dang xu ly
      $orders_pending=Orders::with('orders')->where('status','Pending')->orderBy('id','DESC')->get();
    $orders=json_decode(json_encode($orders));
   //Thong ke so don hang trong 1 thang truoc den bh
    $range1= Carbon::now()->subMonths(1);
    $tk_1thang=Orders::select(DB::raw('Date(created_at) as getYear'), DB::raw('COUNT(*) as value'))->where('created_at','>=',$range1)->groupBy('getYear')->orderBy('created_at', 'ASC')->get();   
  return view('admin.home',compact('ngay','tien_ngay','tuan','tien_tuan','thang','tien_thang','nam','orders','tk_1thang','orders_pending'));
 }
 public function  vieworder()
 {
 	$orders=Orders::with('orders')->orderBy('id','DESC')->get();
 		$orders=json_decode(json_encode($orders));
/* 	echo "<pre>";
 	print_r ($orders);
 	echo "</pre>";
 	die;*/
 	 return view('admin.order.view_order',compact('orders'));
 }
 public function  vieworderdetails($order_id)
 {
  
   	$ordersdetails=Orders::with('orders')->where('id',$order_id)->first();
   	$ordersdetails=json_decode(json_encode($ordersdetails));
   	$customer_id=$ordersdetails->customer_id;
   	$customer_details=Customers::where('id',$customer_id)->first();
		return view('admin.order.view_order_details',compact('ordersdetails','customer_details'));
 }
 public function updatestatusorder(Request $req)
 {
 	if ($req->isMethod('post')) {
 		$data=$req->all();
 	/*	echo "<pre>";
 		print_r ($data);
 		echo "</pre>";
 		die;*/
 		Orders::where('id',$data['order_id'])->update(['status'=>$data['status']]);
 		return redirect()->back()->with('thanhcong','Cập nhật thành công');
 	 }

 }
 public function hoadon($order_id)
     {
         
         $orderDetails=Orders::with('orders')->where('id',$order_id)->first();
         $orderDetails=json_decode(json_encode($orderDetails));
         $customer_id=$orderDetails->customer_id;
         $customerDetails=Customers::where('id',$customer_id)->first();
         return view('admin.order.invoice',compact('orderDetails','customerDetails'));
   }
  public function pdf(Request $req)
   {
   	if ($req->isMethod('get')) {
   	   $data=$req->all();
   	   $order_id=$data['order_id'];
       $orderDetails=Orders::with('orders')->where('id',$order_id)->first();
       $orderDetails=json_decode(json_encode($orderDetails));
       $customer_id=$orderDetails->customer_id;
       $customerDetails=Customers::where('id',$customer_id)->first();
       $pdf = PDF::loadView('admin.order.pdf_invoice',compact('orderDetails','customerDetails'))->setPaper('a4','portrait');
       $file_name=$customerDetails->name;
       return $pdf->stream($file_name . '.pdf');
   }

  
   }
   public function viewCustomer()
   {
    $customer=Customers::orderBy('created_at','DESC')->get();
    return view('admin.customer',compact('customer'));
   }
   public function delCustomer($id)
   {
   /* DB::table('customer')->where('id',$id)->delete();*/
   return redirect()->back()->with('thanhcong','Xóa thành công');
   }
   //User
   public function viewuser()
   {
    $customer=User::orderBy('created_at','DESC')->get();
    return view('admin.user.view_user',compact('customer'));
   }
     public function adduser(Request $req)
  {
   if($req->isMethod('post')){
    $data = $req->all();
    $this->validate($req,[
     'admin'=>'required',
       'name'=>'required',
       'phone'=>'required',
       'address'=>'required',
       'email'=>'required|email|unique:users,email',
       'password'=>'required',
       're_password'=>'required|same:password',
        ],[
         'admin.required'=>'Level không được để trống',
       'name.required'=>'Tên không được để trống',
       
       'phone.required'=>'Số điện thoại không được để trống',
       'address.required'=>'Địa chỉ không được để trống',
       'email.required'=>'Vui lòng nhập email',
       'email.unique'=>'Email đã có người sử dụng',
       're_password.same'=>'Mật khẩu không khớp. Hãy nhập lại',
        're_password.required'=>'Vui lòng nhập mật khẩu',
       'password.required'=>'Vui lòng nhập mật khẩu',
       ]
     );
     $data = new User();
     $data->admin=$req->admin;
     $data->name=$req->name;
     $data->email=$req->email;
     $data->address=$req->address;
     $data->phone=$req->phone;
     $data->password=Hash::make($req->password);
     $data->save();
     return redirect()->back()->with('thanhcong',
           'Tạo tài khoản thành công');
       }
   return view('admin.user.add_user');
  }
  public function updateuser (Request $req,$id)
  {
    $user_name=User::where('id',$id)->first();
   if($req->isMethod('post')){
    $data = $req->all();
   $this->validate($req,['admin'=>'required'],['admin.required'=>'Level không được để trống']);
   User::where('id',$id)->update(['admin'=>$data['admin']]);
   return redirect('admin/user/view-user')->with('thanhcong',' Cập nhật thành công');
   } 
   return view('admin.user.update_user',compact('user_name'));
  }
  public function thongke()
  {
       //thong ke tien thang nay
     $range1= Carbon::now()->subMonths(1);
 /*    echo "<pre>";
     print_r ($range1);
     echo "</pre>";
     die;*/
     $tk_tien_1thang=Orders::select(DB::raw('Date(created_at) as getYear'), DB::raw('SUM(total_price) as value'))->where('created_at','>=',$range1)->groupBy('getYear')->orderBy('created_at', 'ASC')->get();
    return view('admin.thongke',compact('tk_tien_1thang'));
  }
}
