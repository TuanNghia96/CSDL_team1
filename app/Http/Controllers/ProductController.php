<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

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
        $this->authorize('admin');
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->product->listData($request->all());
        $categorys = Category::pluck('name', 'id');
        return view('admin.products.index', compact(['products', 'categorys']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sex = Product::$sex;
        $categorys = Category::pluck('name', 'id');
        return view('admin.products.create', compact(['sex', 'categorys']));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $this->product->storeData($request);
        return redirect($request->url_back ?? route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        $sex = Product::$sex;
        $categorys = Category::pluck('name', 'id');
        return view('admin.products.edit', compact(['product', 'sex', 'categorys']));
    
    
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
        $this->product->updateData($request);
        return redirect($request->url_back ?? route('products.index'));
    
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
        $this->product->delete($id);
        return redirect(route('products.index'));
    }
    
    public function list(){
        $products = $this->product->get();
        
        return view("home.trangchu",compact('products'));
    }
}
