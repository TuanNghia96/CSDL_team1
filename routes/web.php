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
    Route::resource('categorys', 'CategoryController');
    //Feedback
    Route::resource('feedbacks', 'FeedbackController');
    //Product
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');
    Route::get('orders/status/{id}', 'OrderController@updateStatus')->name('orders.status');
    Route::post('orders/cancel', 'OrderController@cancel')->name('orders.cancel');
});

Route::get("home",["as"=>"home","uses"=>"Product@list"]); /*Route dieu chinh den trang chu*/


/* Cac route lien quan den user */

Route::get("login", ["as" => "login", "uses" => "Customer@view_login"]);
Route::post("signin", ["as" => "signin", "uses" => "Customer@SignIn"]);

Route::get("signup", ["as" => "signup", "uses" => "Customer@view_signup"]);
Route::post("sign_up", ["as" => "sign_up", "uses" => "Customer@SignUp"]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
