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
//route of admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index')->name('admin');
    //Customers
    Route::resource('users', 'UserController');
    
    //Category
    Route::resource('categorys', 'CategoryController')->except(['edit', 'update']);
    //Feedback
    Route::resource('feedbacks', 'FeedbackController')->only('index');
    Route::post('feedbacks/answer', 'FeedbackController@answer')->name('feedbacks.answer');
    //Product
    Route::resource('products', 'ProductController');
    Route::get('product/audit/', 'ProductController@audit')->name('products.audit');
    
    //Order
    Route::resource('orders', 'OrderController')->only(['index', 'show']);
    Route::get('orders/status/{id}', 'OrderController@updateStatus')->name('orders.status');
    Route::post('orders/cancel', 'OrderController@cancel')->name('orders.cancel');
    //Graphic
    Route::get('graphics/order', 'GraphicController@order')->name('graphics.order');
    Route::get('graphics/product', 'GraphicController@product')->name('graphics.product');
    Route::get('graphics/user', 'GraphicController@user')->name('graphics.user');
    Route::get('graphics/revenue', 'GraphicController@revenue')->name('graphics.revenue');
    //test
    Route::get('test/order', 'TestController@check')->name('test.order');
    
});

Route::get("home",["as"=>"home","uses"=>"ProductController@list"]); /*Route dieu chinh den trang chu*/

Auth::routes();



Route::get("cart/{t}",["as"=>"cart","uses"=>"ProductController@Cart"])->middleware('login');
Route::get("deletecart/{cart_id}/{id}",["as"=>"delete_cart","uses"=>"ProductController@delete_Cart"])->middleware('login');
Route::get("productdetail/{t}",["as"=>"productdetail","uses"=>"ProductController@ProductDetail"]);
Route::get("category/{t}",["as"=>"category","uses"=>"ProductController@category"]);
Route::get("about",function(){
    return view("home.about");
})->name("about");
Route::get("lienhe",function(){
    return view("home.contact");
})->name("lienhe");
Route::get("dathang/{t}",["as"=>"dathang","uses"=>"ProductController@showorder"])->middleware('login');
Route::post("feedback",["as"=>"feedback","uses"=>"FeedbackController@Savefeedback"])->middleware('login');
Route::get("sreach",["as"=>"sreach","uses"=>"ProductController@Sreach"]);
Route::get("user/{t}",["as"=>"user","uses"=>"Customer@user"])->middleware('login');
Route::get("order/{t}",["as"=>"order","uses"=>"ProductController@order"])->middleware('login');
Route::get("rediect",["as"=>"rediect","uses"=>"ProductController@rediect"]);
Route::post("changeinfo",["as"=>"changeinfo","uses"=>"UserController@changeinfo"])->middleware('login');
Route::post("updatecart",["as"=>"updatecart","uses"=>"ProductController@updatecart"]);
Route::post("confirmorder",["as"=>"confirmorder","uses"=>"ProductController@confirmorder"]);