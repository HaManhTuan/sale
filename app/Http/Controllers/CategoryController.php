<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
 public function addcate(Request $req)
 {
 	if($req->isMethod('post')){
 		 $data = $req->input();
	   $this->validate($req,[
   	'name'=>'required',
   	'description'=>'required',
   	'parent_id'=>'required',
    'url'=>'required'
     ],[
   	'name.required'=>'Tên không được để trống',
   	'description.required'=>'Mô tả không được để trống',
   	'parent_id.required'=>'Danh mục không được để trống',
    'url.required'=>'URL không được để trống']
   );
     if(empty($data['status'])){
      $status='1';
	    }else{
	     $status='0';
	    }
	 		$category = new Category();
	 		$category->name = $data['name'];
	   $category->parent_id = $data['parent_id'];
	 		$category->description = $data['description'];
	 		$category->url = $data['url'];
	   $category->status = $status;
	 		$category->save();
	 		return redirect()->back()->with('flash_message_success', 'Thêm thành công');  
 }
  $levels = Category::where(['parent_id'=>0])->get();
 	return view('admin.category.add_category',compact('levels'));
 }

public function viewcate()
 {
 	$categories = Category::get();
 /*	echo "<pre>"; print_r($categories); die;*/
 	return view('admin.category.category')->with(compact('categories'));
 } 
public function updatecate(Request $req,$id=null)
 {
	 if($req->isMethod('post')){
 		 $data = $req->input();
	   $this->validate($req,[
   	'name'=>'required',
   	'description'=>'required',
   	'parent_id'=>'required',
    'url'=>'required'
     ],[
   	'name.required'=>'Tên không được để trống',
   	'description.required'=>'Mô tả không được để trống',
   	'parent_id.required'=>'Danh mục không được để trống',
    'url.required'=>'URL không được để trống']
   );
     if(empty($data['status'])){
      $status='1';
	    }else{
	     $status='0';
	    }
	 		
	 	Category::where(['id'=>$id])->update(['status'=>$status,'name'=>$data['name'],'parent_id'=>$data['parent_id'],'description'=>$data['description'],'url'=>$data['url']]);
	 		return redirect()->back()->with('flash_message_success', 'Sửa thành công');  
 }
	 $categoryDetails = Category::where(['id'=>$id])->first();
	 $levels = Category::where(['parent_id'=>0])->get();
 	return view('admin.category.update_category',compact('levels','categoryDetails'));
 }
public function deletecate($id = null)
 {
  Category::where(['id'=>$id])->delete();
  return redirect()->back()->with('flash_message_success', 'Xóa Thành Công');
 }
}
