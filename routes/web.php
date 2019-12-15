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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //Customers
    Route::resource('users', 'UserController');
    
    //Category
    Route::resource('categorys', 'CategoryController')->except(['edit', 'update']);
    //Feedback
    Route::resource('feedbacks', 'FeedbackController')->only('index');
    //Product
    Route::resource('products', 'ProductController');
    //Order
    Route::resource('orders', 'OrderController')->only(['index', 'show']);
    Route::get('orders/status/{id}', 'OrderController@updateStatus')->name('orders.status');
    Route::post('orders/cancel', 'OrderController@cancel')->name('orders.cancel');
    //Graphic

    Route::get('graphics/order', 'GraphicController@order')->name('graphics.order');
    Route::get('graphics/product', 'GraphicController@product')->name('graphics.product');
    Route::get('graphics/user', 'GraphicController@user')->name('graphics.user');
    
});

Route::get("home",["as"=>"home","uses"=>"ProductController@list"]); /*Route dieu chinh den trang chu*/

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get("cart/{t}",["as"=>"cart","uses"=>"ProductController@Cart"])->middleware('login');
Route::get("deletecart/{t}",["as"=>"delete_cart","uses"=>"ProductController@delete_Cart"])->middleware('login');
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
Route::post("changeinfo",["as"=>"changinfo","uses"=>"UserController@update"])->middleware('login');
Route::post("updatecart",["as"=>"updatecart","uses"=>"ProductController@updatecart"]);
