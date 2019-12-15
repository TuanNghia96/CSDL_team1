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

//Route::get("home",["as"=>"home","uses"=>"Product@list"]); /*Route dieu chinh den trang chu*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


