<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Customers;
use App\Product;
use App\ProductAttributes;
use App\OrderDetails;
use App\DeliveryAddress;
use App\OrderShipped;
use Hash;
use DB;
use Auth;
use App\Orders;
use Session;
use App\Mail\Email;
use Mail;

class OrderReviewController extends Controller
{
 public function orderreview()
    {
    
        $customer_id=Auth::guard('customers')->user()->id;
        $customer_email=Auth::guard('customers')->user()->email;
        $customerDetails=Customers::where('id',$customer_id)->first();
        $shippingDetails=DeliveryAddress::where('id',$customer_id)->first();
        $shippingDetails= json_decode(json_encode($shippingDetails));

	     $customerCart=DB::table('cart')->where(['customer_email'=>$customer_email])->get();
	     foreach ($customerCart as $value=> $product) {
	      $productDetails=Product::where('id',$product->product_id)->first();
	      $customerCart[$value]->image=$productDetails->image;
	  }
      
    	return view('home.oderreview',compact('customerDetails','shippingDetails','customerCart'));
    }
    public function placeorder(Request $req)
    {
       if ($req->isMethod('post')) {
       	$data=$req->all();
        $customer_id=Auth::guard('customers')->user()->id;
        $customer_email=Auth::guard('customers')->user()->email;
        $shipping=DeliveryAddress::where(['customer_email'=>$customer_email])->first();
        $order= new Orders();
        $order->customer_id=$customer_id;
        $order->customer_email=$customer_email;
        $order->name=$shipping->name;
        $order->address=$shipping->address;
        $order->phone=$shipping->phone;
        $order->status="New";
        $order->payment_method=$data['payment_method'];
        $order->total_price=$data['total_price']; 
        $order->save();

        $order_id=DB::getPdo()->lastInsertId();
        
        $cartProducts=DB::table('cart')->where(['customer_email'=>$customer_email])->get();

        foreach ($cartProducts as $value) {
          $cartPro= new OrderDetails;
          $cartPro->order_id=$order_id;
           $cartPro->customer_id=$customer_id;
            $cartPro->product_id=$value->product_id;
            $cartPro->product_code=$value->product_code;
            $cartPro->product_color=$value->product_color;
            $cartPro->product_name=$value->product_name;
            $cartPro->product_size=$value->size;
            $cartPro->product_price=$value->price;
            $cartPro->quantity=$value->quantity;
            $cartPro->save();
        }
        Session::put('order_id',$order_id);
        Session::put('total_price',$data['total_price']);
       	return redirect('thanks');
       }
    }
     public function thanks(Request $req)
     {
        $customer_email=Auth::guard('customers')->user()->email;
        Mail::to(Auth::guard('customers')->user()->email)->send(new Email);
        DB::table('cart')->where('customer_email',$customer_email)->delete();
        return view('home.thanks');
     }
     public function myaccount()
     {
        $customer_id=Auth::guard('customers')->user()->id;

        $order=Orders::with('orders')->where('customer_id',$customer_id)->orderBy('id','DESC')->get();
       /*   echo "<pre>";
        print_r ($order);
        echo "</pre>";
        die;*/
        return view('home.history_customer',compact('order'));
     } 
     public function myaccountdetails($order_id)
     {
           $customer_id=Auth::guard('customers')->user()->id;
           $orderDetails=Orders::with('orders')->where('id',$order_id)->first();
           $orderDetails=json_decode(json_encode($orderDetails));
           return view('home.history_customer_details',compact('orderDetails'));

     }

}
