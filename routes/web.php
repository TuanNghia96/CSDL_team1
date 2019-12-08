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

Route::prefix('admin')->group(function () {

    //Customers
    Route::resource('users', 'UserController');
    
    //Category
    Route::resource('categorys', 'CategoryController');
    //Feedback
    Route::resource('feedbacks', 'FeedbackController');
    
});

Route::get("home",["as"=>"home","uses"=>"ProductController@list"]); /*Route dieu chinh den trang chu*/


/* Cac route lien quan den user */

Route::get("login", ["as" => "login", "uses" => "Customer@view_login"]);
Route::post("signin", ["as" => "signin", "uses" => "Customer@SignIn"]);

Route::get("signup", ["as" => "signup", "uses" => "Customer@view_signup"]);
Route::post("sign_up", ["as" => "sign_up", "uses" => "Customer@SignUp"]);

Route::get("cart/{t}",["as"=>"cart","uses"=>"ProductController@Cart"]);
Route::get("deleteCart/{t}",["as"=>"delete_cart","uses"=>"ProductController@delete_Cart"]);

Route::get("cc",function(){return view("home.cart");})->name('ss');