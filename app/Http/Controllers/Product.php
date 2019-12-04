<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Slide;
class Product extends Controller
{
    public function list(){
        $slide=Slide::all();
        return view("home.trangchu",compact('slide')); 
    }
}
