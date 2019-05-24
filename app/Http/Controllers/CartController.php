<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\ProductAttributes;
use App\Product;
use Auth;



class CartController extends Controller
{
  public function addtocart(Request $req){
   if (empty(Auth::guard('customers')->check())) {
     return redirect('dang-nhap')->with('thatbai','Hãy đăng nhập để mua hàng');
   }
   else {
       $data=$req->all(); 
       $product_size=explode("-",$data['size']);
       $getProductStock=ProductAttributes::where(['product_id'=>$data['product_id'],'size'=>$product_size[1]])->first();
       if (  $getProductStock->stock<$data['quantity']) {
        return redirect()->back()->with('thatbai','Sản phẩm không đủ trong kho. Vui lòng giảm số lượng');
       }
    if (empty(Auth::guard('customers')->user()->email)) {
          $data['customer_email']='';
      }
      else
      {
         $data['customer_email']=Auth::guard('customers')->user()->email;
      }
      $session_id=Session::get('session_id');
       if (empty($session_id)) {
        $session_id=str_random(40);
      Session::put('session_id',$session_id);
       }
    $sizeArr = explode("-",$data['size']);
     $countProducts= DB::table('cart')->where([
     'product_id'=>$data['product_id'],
     'product_code'=>$data['product_code'],
     'product_color'=>$data['product_color'],
     'size'=>$sizeArr[1],
     'session_id'=>$session_id
    ])->count();
    if ($countProducts>0) {
     return redirect()->back()->with('thatbai',
     'Sản phẩm đã có trong giỏ hàng giỏ hàng');
    }
    else
    {
     $getSKU=ProductAttributes::select('sku')->where([
      'product_id'=>$data['product_id'],
      'size'=>$sizeArr[1]
     ])->first();

      DB::table('cart')->insert([
     'product_id'=>$data['product_id'],
     'product_name'=>$data['product_name'],
       'product_color'=>$data['product_color'],
     'product_code'=>$getSKU->sku,
     'size'=>$sizeArr[1],
     'price'=>$data['price'],
     'quantity'=>$data['quantity'],
     'customer_email'=>$data['customer_email'],
     'session_id'=>$session_id
    ]);
    }
 

    return redirect('cart')->with('thanhcong',
     'Sản phẩm đã được thêm vào giỏ hàng');
   }
 
  }
   public function cart(){       
    
        $session_id=Session::get('session_id');
        $customerCart=DB::table('cart')->where(['session_id'=>$session_id])->get();
     /*   echo "<pre>";
        print_r ($customerCart);
        echo "</pre>";
        die;*/
        foreach ($customerCart as $value=> $product) {
          $productDetails=Product::where('id',$product->product_id)->first();
          $customerCart[$value]->image=$productDetails->image;
         }
      
 
     return view('home.cart',compact('customerCart'));
    }
 public function deletecart($id)
  {
   DB::table('cart')->where('id',$id)->delete();
   return redirect('cart')->with('thanhcong',
         'Sản phẩm đã được xóa khỏi giỏ hàng');
  }
 public function updatecart($id=null,$quantity=null)
 {
   $getCartDetails=DB::table('cart')->where('id',$id)->first();
   $getAyytributeStock=ProductAttributes::where('sku',$getCartDetails->product_code)->first();
   $update_quantity=$getCartDetails->quantity+$quantity;
   if ($getAyytributeStock->stock >=$update_quantity) {
     DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
  return redirect('cart')->with('thanhcong',
        'Sản phẩm đã được cập nhật');
   }
   else {
     return redirect()->back()->with('thatbai','Sản phẩm trong kho không đủ. Vui lòng giảm số lượng sản phẩm!!!!');
   }
  
 }
}
