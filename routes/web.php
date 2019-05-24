<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Trang- Chu
Route::get('/','HomeController@trangchu');
//Tạo tài khoản
Route::match(['get', 'post'], 'dang-ki','HomeController@dangki');
//Dang nhap
Route::match(['get', 'post'], 'dang-nhap','HomeController@dangnhap');
//Dang xuat
Route::get('/dang-xuat','HomeController@logout');
  //Xem danh sach san pham
  Route::get('danh-sach/{url}','HomeController@danhsachsp');
  //Xem chi tiet san pham
  Route::get('chi-tiet/{id}','HomeController@chitietsanpham');  
Route::match(['get', 'post'],'cart','CartController@cart');
//Them vao gio hang
Route::match(['get', 'post'], '/add-cart', 'CartController@addtocart');
Route::get('cart/delete-cart/{id}','CartController@deletecart');
Route::get('cart/update-cart/{id}/{quantity}','CartController@updatecart');
//Checkout
Route::match(['get', 'post'],'check-out','CheckoutController@checkout');
 Route::match(['get', 'post'],'order-review','OrderReviewController@orderreview');
   Route::match(['get', 'post'],'place-order','OrderReviewController@placeorder');
   //Thank
  Route::get('thanks','OrderReviewController@thanks');
  Route::get('history_customer','OrderReviewController@myaccount');
  Route::get('history_customer/{id}','OrderReviewController@myaccountdetails');
  //Hoa Don
  
//search-product
  Route::post('search-product','HomeController@searchproduct');
//Admin
Route::match(['get', 'post'], 'admin/login','AdminController@login');
Route::match(['get', 'post'], 'admin/add-user','AdminController@adduser');
Route::get('admin/logout','AdminController@logout');
Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function() {
	   //Dashboard
	   Route::get('/','AdminController@dashboard');
     Route::get('thongke-tien','AdminController@thongke');
     //Customer
     Route::get('/customer','AdminController@viewCustomer');
     //Delete Customer
      Route::get('/delete-customer/{id}','AdminController@delCustomer');
      //User
      Route::group(['prefix' => 'user','middleware'=>'adminLogin'], function()
       {
          Route::get('view-user','AdminController@viewuser');
          Route::match(['get', 'post'], 'add-user','AdminController@adduser');
          Route::match(['get', 'post'], 'update-user/{id}','AdminController@updateuser');
          Route::get('delete-user/{id}','AdminController@deletecate');
       });
	   //Category 
Route::group(['prefix' => 'category','middleware'=>'adminLogin'], function()
 {
    Route::get('view-category','CategoryController@viewcate');
    Route::match(['get', 'post'], 'add-category','CategoryController@addcate');
    Route::match(['get', 'post'], 'update-category/{id}','CategoryController@updatecate');
    Route::get('delete-category/{id}','CategoryController@deletecate');
 });
    //Product
Route::group(['prefix' => 'product','middleware'=>'adminLogin'], function() {
     Route::get('view-product','ProductController@viewpro');
    	Route::match(['get', 'post'], 'add-product','ProductController@addpro');
    	Route::match(['get', 'post'], 'update-product/{id}','ProductController@updatepro');
    	Route::get('delete-product/{id}','ProductController@deletepro');
    	Route::get('delete-product-image/{id}','ProductController@deleteProductImage');
    	Route::match(['get', 'post'], 'add-attribute/{id}','ProductController@addattri');
    	Route::get('delete-attribute/{id}','ProductController@deleteAttribute');
    	Route::match(['get', 'post'], '/edit-attributes/{id}','ProductController@editAttributes');
    	Route::match(['get', 'post'], '/add-images/{id}','ProductController@addImages');
	    Route::get('/delete-alt-image/{id}','ProductController@deleteProductAltImage');
      Route::get('/tim-kiem','ProductController@searchProduct');
});
Route::group(['prefix' => 'order','middleware'=>'adminLogin'], function() {
   Route::get('view-order','AdminController@vieworder');
   Route::get('view-orderdetails/{id}','AdminController@vieworderdetails');
    Route::post('update-order-status','AdminController@updatestatusorder');
    Route::get('invoice/{id}','AdminController@hoadon');
     Route::get('pdf','AdminController@pdf');
  });
});
