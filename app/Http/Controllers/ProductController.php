<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductAttributes;
use App\ProductsImage;


class ProductController extends Controller

{
    public function addpro(Request $req)
 {
 	if($req->isMethod('post')){
 		 $data = $req->input();
	   $this->validate($req,[
   	'product_name'=>'required',
   	'product_code'=>'required',
   	'product_color'=>'required',
   	'category_id'=>'required',
    'description'=>'required',
    'price'=>'required',
    'care'=>'required',
 

     ],[
   	'product_name.required'=>'Tên không được để trống',
   	'product_code.required'=>'Mã không được để trống',
   	'product_color.required'=>'Màu không được để trống',
   	'description.required'=>'Mô tả không được để trống',
   	'category_id.required'=>'Danh mục không được để trống',
    'price.required'=>'Giá không được để trống',
    'care.required'=>'Chất liệu không được để trống',
    ]
   );
     if(empty($data['status'])){
      $status='1';
    }else{
     $status='0';
    }
     if(empty($data['hot'])){
      $hot='1';
    }else{
     $hot='0';
    }
	   $product = new Product();
	   $product->product_name = $data['product_name'];
	   $product->category_id = $data['category_id'];
		$product->description = $data['description'];
		$product->product_code = $data['product_code'];
		$product->product_color = $data['product_color'];
		$product->care = $data['care'];
		$product->price = $data['price'];
	   $product->status = $status;
	    $product->hot = $hot;
	   //Upload anh
    if ($req->hasFile('image')) {
         $file=$req->file('image');
        $name=$file->getClientOriginalName();
         $image=str_random(4)."_". $name;
       while(file_exists("backend/upload/product/".$image ))
       {
        $image=str_random(4)."_". $name;
       }

       $file->move("backend/upload/product",$image);
        $product->image=$image;    
	       }
	       else {
	         $product->image="";
	       }
	     //up anh
$product->save();

	 		return redirect()->back()->with('flash_message_success', 'Thêm thành công'); 

 }
  $categories = Category::where(['parent_id' => 0])->get();
  /*echo "<pre>"; print_r($categories); die;*/
 /* echo "<pre>"; print_r($sub_categories); die;*/
 	return view('admin.product.add_product')->with(compact('categories'));
 }
public function viewpro()
 {
      $products = Product::get();

 	return view('admin.product.product',compact('products'));
 }
public function updatepro(Request $req,$id=null){

		if($req->isMethod('post')){
			$data = $req->all();
	    $this->validate($req,[
   	'product_name'=>'required',
   	'product_code'=>'required',
   	'product_color'=>'required',
   	'category_id'=>'required',
    'description'=>'required',
    'price'=>'required',
    'care'=>'required',
    

     ],[
   	'product_name.required'=>'Tên không được để trống',
   	'description.required'=>'Mô tả không được để trống',
   	'category_id.required'=>'Danh mục không được để trống',
    'price.required'=>'Giá không được để trống',
    'care.required'=>'Chất liệu không được để trống',
    ]
   );

  if(empty($data['status'])){
      $status='1';
	 }else{
	     $status='0';
	 }
	 if(empty($data['hot'])){
      $hot='1';
	 }else{
	     $hot='0';
	 }

// Upload Image
    if($req->hasFile('image')){
		$file = Input::file('image');
	    if ($file->isValid()) {
	        // Upload Images after Resize
	        $name = $file->getClientOriginalExtension();
	        $image = rand(111,99999).'.'.$name;
	        $file->move("backend/upload/product",$image);
		}
		}else if(!empty($data['current_image'])){
		$image = $data['current_image'];
	}else{
		$image = '';
	}
  /* else {
     $product->image="";
   }*/
			Product::where(['id'=>$id])->update(['status'=>$status,'hot'=>$hot,'category_id'=>$data['category_id'],'product_name'=>$data['product_name'],
				'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'description'=>$data['description'],'care'=>$data['care'],'price'=>$data['price'],'image'=>$image]);
		
			return redirect()->back()->with('flash_message_success', 'Sản phẩm đã sửa thành công');
		
		}
		$productDetails = Product::where(['id'=>$id])->first();
		$categories = Category::where(['parent_id' => 0])->get();
			$categories_drop_down = "<option value='' disabled>Danh mục</option>";
		foreach($categories as $cat){
			if($cat->id==$productDetails->category_id){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$categories_drop_down .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				if($sub_cat->id==$productDetails->category_id){
					$selected = "selected";
				}else{
					$selected = "";
				}
				$categories_drop_down .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";	
			}	
		}
 	return view('admin.product.update_product',compact('productDetails','categories_drop_down'));
 }
public function deletepro($id = null)
  {
  	 $imgpro = Product::findOrFail($id);
      $destinationPath = "backend/upload/product/{{ $imgpro->image }}";    	
      File::delete($destinationPath);
      Product::where(['id'=>$id])->delete();
     return redirect()->back()->with('flash_message_success', 'Sản phẩm xóa thành công');
  }
  public function addattri(Request $request,$id)
	{
    $productDetails = Product::with('attributes')->where(['id' => $id])->first();
	  $categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
	  $category_name = $categoryDetails->name;
	  if($request->isMethod('post')){
      $data = $request->all();
    foreach($data['sku'] as $key => $val){
     if(!empty($val)){
         $attrCountSKU = ProductAttributes::where(['sku'=>$val])->count();
      
         $attrCountSizes = ProductAttributes::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
         if($attrCountSizes>0){
             return redirect('admin/product/add-attribute/'.$id)->with('flash_message_error', 'Attribute already exists. Please add another Attribute.');    
         }
         $attr = new ProductAttributes;
         $attr->product_id = $id;
         $attr->sku = $val;
         $attr->size = $data['size'][$key];
         $attr->price = $data['price'][$key];
         $attr->stock = $data['stock'][$key];
         $attr->save();
        }
	      }
	      return redirect('admin/product/add-attribute/'.$id)->with('flash_message_success', 'Product Attributes has been added successfully');

    }

    $title = "Add Attributes";
    return view('admin.product.add_attribute')->with(compact('productDetails','category_name'));

}
public function deleteAttribute($id = null){
        ProductAttributes::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product Attribute has been deleted successfully');
    }
public function editAttributes(Request $request, $id=null){
     if($request->isMethod('post')){
         $data = $request->all();
         /*echo "<pre>"; print_r($data); die;*/
         foreach($data['idAttr'] as $key=> $attr){
             if(!empty($attr)){
                 ProductAttributes::where(['id' => $data['idAttr'][$key]])->update(['price' => $data['price'][$key], 'stock' => $data['stock'][$key]]);
             }
         }
         return redirect('admin/product/add-attribute/'.$id)->with('flash_message_success', 'Product Attributes has been updated successfully');
     }
    }
public function addImages(Request $request, $id=null){
        $productDetails = Product::where(['id' => $id])->first();

        $categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        $category_name = $categoryDetails->name;

          $productImgDetails = ProductsImage::where(['product_id' => $id])->first();

         $productDetails = Product::where(['id'=>$productDetails->id])->first();
         
        $product_name = $productDetails->product_name;
           /* echo "<pre>"; print_r($product_name); die;*/

      if($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $files = $request->file('image');
                foreach($files as $file){
                    // Upload Images after Resize
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                   $file->move("backend/upload/product",$fileName);
                    $image->image = $fileName;  
                    $image->product_id = $data['product_id'];
                    $image->save();
                }   
            }

            return redirect('admin/product/add-images/'.$id)->with('flash_message_success', 'Product Images has been added successfully');

        }


        $productImages = ProductsImage::where(['product_id' => $id])->orderBy('id','DESC')->get();

        $title = "Add Images";
        return view('admin.product.add_image')->with(compact('title','productDetails','category_name','productImages'));
 }
public function deleteProductAltImage($id=null){

        // Get Product Image
        $productImage = ProductsImage::where('id',$id)->first();

        // Delete Image from Products Images table
        ProductsImage::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Hình ảnh kèm theo đã được xóa');
    }
}
