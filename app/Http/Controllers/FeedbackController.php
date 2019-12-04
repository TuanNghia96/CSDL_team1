<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

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
    public function index()
    {
        $feedbacks = $this->feedback->paginate();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }
}
