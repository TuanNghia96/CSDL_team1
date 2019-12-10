<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    protected $category;
    
    /**
     * CustomerController constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        if (Gate::allows('admin')) {
            $categorys = $this->category->paginate();
            return view('admin.categorys.index', compact('categorys'));
        } else {
            return redirect(route('home'));
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::allows('admin')) {
            $category = $this->category->find($id);
            return view('admin.categorys.show', compact('category'));
        } else {
            return redirect(route('home'));
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('admin')) {
            return view('admin.categorys.create');
        } else{
            return redirect(route('home'));
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('admin')) {
            $input = $request->all();
            $input['created_at'] = Carbon::now();
            $this->category->create($input);
            return redirect(route('categorys.index'));
        } else{
            return redirect(route('home'));
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('admin')) {
            $category = $this->category->find($id);
            if ($category->status = 0) {
                $this->category->find($id)->update(['status' => 1]);
            } else {
                $this->category->find($id)->update(['status' => 0]);
            }
            return back();
        } else{
            return redirect(route('home'));
        }
    }
}
