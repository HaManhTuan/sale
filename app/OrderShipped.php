<?php

namespace App;
use App\Product;
use Auth;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class OrderShipped extends Mailable
{
	use Queueable, SerializesModels;
   
     public function build(){
      $customer_name=Auth::guard('customers')->user()->name;
     	$session_id=Session::get('session_id');
        $customerCart=DB::table('cart')->where(['session_id'=>$session_id])->get();
        foreach ($customerCart as $value=> $product) {
          $productDetails=Product::where('id',$product->product_id)->first();
          $customerCart[$value]->image=$productDetails->image;
         }
        
    	return $this->view('mails.shipped')->with([
          'name'=>Auth::guard('customers')->user()->name,
          'customerCart'=>$customerCart,
    	]);
    }
}
