<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Customer extends Controller
{
    public function view_login(){
        return view("home.login");
    }
    public function SignIn(Request $request){
        $credentials=$request->only("email","password");
        if($login=Auth::attempt($credentials)){
             return redirect()->route("home",compact(Auth::user()));
        }
        else return view("home.login",["error"=>1]);
    }
    public function view_signup(){
        return view("home.signup");
    }
    public function SignUp(Request $request){
        $imformation=$request->all("email","name","password","phone");
        $imformation["password"]=bcrypt($imformation["password"]);
        if(DB::table("users")->insert($imformation)){
            return view("home.login");
        }
        else{
            return view("home.signup");
        } 
    }
}
