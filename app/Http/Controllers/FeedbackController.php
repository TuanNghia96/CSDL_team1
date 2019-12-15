<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
/* use Illuminate\Http\Request; */
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FeedbackController extends Controller
{
    protected $feedback;
    
    /**
     * CustomerController constructor.
     *
     * @param Feedback $feedback
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('admin')) {
            $feedbacks = $this->feedback->getData($request->all());
            return view('admin.feedbacks.index', compact('feedbacks'));
        } else{
            return redirect(route('home'));
        }
    }
    public function Savefeedback(Request $request){
        $id_product=$request->product_id;
        $txt=$request->feedback;
        $user_id=$request->user_id;
        $result=Feedback::set_review($user_id,$id_product,$txt);
        echo auth()->user()->email;
    }
}
