<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use App\Category;
use Auth;
use Hash;
use App\Product;

use App\ProductAttributes;
use App\ProductsImage;

class HomeController extends Controller
{
 public function trangchu()
  {
  	 $new=Product::where('status',1)->orderBy('created_at','DESC')->paginate(3);
    $hot=Product::where('hot',0)->get();
    $ProductStatus=Product::where('status',1)->get();
  	return view('home.trangchu',compact('hot','ProductStatus','new'));
  }
  public function dangki(Request $req)
  {
  		if($req->isMethod('post')){
 		 $data = $req->all();
	   $this->validate($req,[
			   	'name'=>'required',
			   	'phone'=>'required',
			   	'address'=>'required',
			    'email'=>'required|email|unique:customers,email',
			    'password'=>'required',
			    're_password'=>'required|same:password',
			     ],[
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
	    $data = new Customers();
     $data->name=$req->name;
     $data->email=$req->email;
     $data->address=$req->address;
     $data->phone=$req->phone;
     $data->password=Hash::make($req->password);
     $data->save();
     return redirect('dang-nhap')->with('thanhcong',
          	'Tạo tài khoản thành công, Hãy đăng nhập để mua hàng');
       }
   return view('home.dangki');
  }
  public function dangnhap(Request $req)
  {
   if($req->isMethod('post')){
 		 $data = $req->all();
	     $this->validate($req,[
			    'email'=>'required',
			    'password'=>'required',
			     ],[
			    'email.required'=>'Vui lòng nhập email',
			    'password.required'=>'Vui lòng nhập mật khẩu',
			    ]
     );
	      $login= array('email'=>$req->email,'password'=>$req->password);
	    if(Auth::guard('customers')->attempt($login))
     {
     	return redirect('/');
     }
     else
     {
     	return redirect()->back()->with('thatbai','Invalid Username or Password');
     }
		  }
		  return view('home.dangnhap');
		 }
		 public function logout()
		 {
		 	Auth::guard('customers')->logout();
		 	return redirect('/');
		 }
		 public function danhsachsp($url)
		 {
		 	$categories = Category::where(['parent_id' => 0])->get();
		 	$categoryDetails = Category::where(['url'=>$url])->first();
    	if($categoryDetails->parent_id==0){
    		$subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
    		$subCategories = json_decode(json_encode($subCategories));
    		foreach($subCategories as $subcat){
    			$cat_ids[] = $subcat->id;
    		}
    		$productsAll = Product::whereIn('category_id', $cat_ids)->where('status','1')->get();
    	}else{
    		$productsAll = Product::where(['category_id'=>$categoryDetails->id])->where('status','1')->get();	
    	}
		 	return view('home.danhsachsp',compact('categories','productsAll','categoryDetails'));
		 } 
		 public function chitietsanpham($id)
		 {
 	   $productDetails = Product::with('attributes')->where('id',$id)->first();
 	   /*Ảnh kèm theo*/
 	      $productAltImages = ProductsImage::where('product_id',$id)->get();
 	   /*Số lượng*/
 	     $total_stock = ProductAttributes::where('product_id',$id)->sum('stock');
 	   /*Sanr phẩm khác*/
     $relatedProducts = Product::where('id','!=',$id)->where(['category_id' => $productDetails->category_id])->get();

		 	return view('home.chitietsp',compact('productDetails','productAltImages','total_stock','relatedProducts'));
		 }
		 public function searchproduct(Request $req)
		 {
		 	if ($req->isMethod('post')) {
		 		$data=$req->all();
		 		/*echo "<pre>";
		 		print_r ($data);
		 		echo "</pre>";*/
		 		$categories = Category::with('categories')->where(['parent_id' => 0])->get();
		 		$search_product=$data['product'];
		 		$productsAll=Product::where('product_name','like','%'.$search_product.'%')->orwhere('product_code',$search_product)->where('status',1)->get();
		 		return view('home.danhsachsp',compact('categories','productsAll','search_product'));
		 	}
		 }
}
