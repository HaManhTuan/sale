<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Customers;
use App\User;
use App\DeliveryAddress;
use Session;
use DB;
class CheckoutController extends Controller
{
    public function checkout(Request $req)
    {
    	if (empty($customer_id=Auth::guard('customers')->check())) {
        return redirect('dang-nhap');
      }
      else
      {
         $customer_id=Auth::guard('customers')->user()->id;
      $customer_email=Auth::guard('customers')->user()->email;
      $customerDetails=Customers::find($customer_id);

       $shippingCount= DeliveryAddress::where('customer_id',$customer_id)->count();

        if ( $shippingCount>0) {
          $shippingDetails=DeliveryAddress::where('customer_id',$customer_id)->first();
        }
        $session_id= Session::get('session_id');
        DB::table('cart')->where(['session_id'=>$session_id])->update(['customer_email'=>$customer_email]);
      if ($req->isMethod('POST')) {
          $data=$req->all();
          $this->validate($req,[
        'bill_name'=>'required',
        'shipping_name'=>'required',
       
        'bill_address'=>'required',
        'shipping_address'=>'required',
        'bill_phone'=>'required',
        'shipping_phone'=>'required'
         ],[
        'bill_name.required'=>'Bill không được để trống',
        'shipping_name.required'=>'Shipping không được để trống',
        
        'bill_address.required'=>'Địa chỉ không được để trống',
        'shipping_adress.required'=>'Địa chỉkhông được để trống',
        'bill_phone.required'=>'SĐT không được để trống',
        'shipping_phone.required'=>'SĐT không được để trống',
        ]
       );
         Customers::where('id',$customer_id)->update([
          'name'=>$data['bill_name'],
          'phone'=>$data['bill_phone'],
          'address'=>$data['bill_address'],
          
         ]);
         if ($shippingCount>0) {
           DeliveryAddress::where('customer_id',$customer_id)->update([
          'name'=>$data['bill_name'],
          'phone'=>$data['bill_phone'],
          'address'=>$data['bill_address'],
          
         ]);  
         }
         else
         {
          $shipping = new DeliveryAddress();
             $shipping->customer_id=$customer_id;
             $shipping->customer_email=$customer_email;
             $shipping->name=$data['shipping_name'];
             $shipping->address=$data['shipping_address'];
             $shipping->phone=$data['shipping_phone'];
             $shipping->save();
         }
         return redirect()->action('OrderReviewController@orderreview');
   }
      return view('home.checkout',compact('customerDetails'));
    }
      }
     
}
