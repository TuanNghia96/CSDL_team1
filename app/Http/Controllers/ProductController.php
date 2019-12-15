<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    protected $product;
    
    /**
     * CustomerController constructor.
     *
     * @param \App\Models\Product $product
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('admin')) {
            $products = $this->product->listData($request->all());
            $categorys = Category::pluck('name', 'id');
            return view('admin.products.index', compact(['products', 'categorys']));
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
            $sex = Product::$sex;
            $categorys = Category::pluck('name', 'id');
            return view('admin.products.create', compact(['sex', 'categorys']));
        } else {
            return redirect(route('home'));
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        if (Gate::allows('admin')) {
            $this->product->storeData($request);
            return redirect($request->url_back ?? route('products.index'));
        } else {
            return redirect(route('home'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::allows('admin')) {
            $product = $this->product->find($id);
            return view('admin.products.show', compact('product'));
        } else {
            return redirect(route('home'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('admin')) {
            $product = $this->product->find($id);
            $sex = Product::$sex;
            $categorys = Category::pluck('name', 'id');
            return view('admin.products.edit', compact(['product', 'sex', 'categorys']));
        } else {
            return redirect(route('home'));
        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param ProductStoreRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request, $id)
    {
        if (Gate::allows('admin')) {
            $this->product->updateData($request);
            return redirect($request->url_back ?? route('products.index'));
        } else {
            return redirect(route('home'));
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (Gate::allows('admin')) {
            $this->product->find($id)->delete();
            return redirect(route('products.index'));
        } else {
            return redirect(route('home'));
        }
    }
    
    public function list(){
        $products = $this->product->get();
        
        return view("home.trangchu",compact('products'));
    }
}
