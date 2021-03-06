<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\PriceAudit;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Feedback;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Redirector;
use Session;
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
     * @param int $id
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
     * @param int $id
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
            $product = $this->product->find($id);
            if(File::exists(public_path($product->image_font))){
                unlink(public_path($product->image_font));
            }
            if(File::exists(public_path($product->image_back))){
                unlink(public_path($product->image_back));
            }
            if(File::exists(public_path($product->image_up))){
                unlink(public_path($product->image_up));
            }
            $product->delete();
            return redirect(route('products.index'));
        } else {
            return redirect(route('home'));
        }
    }
    
    /**
     * get audit of price
     *
     * @param int $product_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|Redirector|\Illuminate\View\View
     */
    public function audit(Request $request)
    {
        if (Gate::allows('admin')) {
            if ($request->product_id) {
                $audits = PriceAudit::orderBy('created_at', 'DESC')->where('product_id', $request->product_id)->paginate();
            } else {
                $audits = PriceAudit::orderBy('created_at', 'DESC')->paginate();
            }
            return view('admin.products.audit', compact('audits'));
        } else {
            return redirect(route('home'));
        }
    }
    
    public function list()
    {
        //$products = $this->product->get();
        $New_Product = Product::New_Product(8);
        $Best_Product = Product::Product_Best(8);
        return view("home.trangchu", compact("New_Product", "Best_Product"));
    }
    
    public function Cart(Request $request,$id)
    {
        if (Gate::allows('customer')) {
            /* $input=$request->all(); */
            /*  $id=$request->product_id; */
            $product = Product::find($id);
            $id_Cart = Session("id_cart") ? session::get('id_cart') : null;
            $user_id = Auth::id();
            if ($id_Cart == null) {
                $id_cart = Cart::add_NewCart($user_id, $product);
                $request->session()->put("id_cart", $id_cart);
            } else {
                $cart = Cart::add_Cart($id_Cart, $product);
            }
            return redirect()->back();
        } else {
            return redirect()->route('home');
        }
    }
    
    public function delete_Cart(Request $request, $id_cart, $id)
    {
        Cart::removeItem($id_cart, $id);
        return redirect()->back();
    }
    public function ProductDetail(Request $request,$id){
        $product=Product::find($id);
        $new_product=Product::New_Product(4);
        $best_product=Product::Best_Product();
        $product_lq=Product::Product_lq($product->id,$product->category_id);
        $review=Feedback::get_review($id);
        $producttype=Category::find($id);
        $check = 0;
        if(Auth::check()){
            foreach (Auth::user()->orders()->get() as $value){
                if ($value->ordersDetail->where('product_id', $id)->first()){
                    $check = 1;
                    }
                }
            }
        return view("home.product_detail",compact("product","new_product","best_product","product_lq","review","producttype", 'check'));
        }
        public function Category(Request $request,$id){
        $category=Category::get_name();
        if(!$id) $id=$category[0]->id;
        $product_category=Product::category_product($id);
        $best_product=Product::Best_category_product($id);
        return view("home.product_type",compact("category","product_category","best_product"));
    }
    public function Sreach(Request $request){
        $txt=$request->s;
        $New_Product=Product::sreach_category($txt);
        return view("home.sreach",compact("New_Product"));
    }
    public function order($cart_id){
        if (Gate::allows('customer')) {
                $cart=Cart::get_cart($cart_id);
                $cartdetail=Cart::get_orderdetail($cart_id);
                $productcart=[];
                $totalQty=0;
                $totalPrice=$cart[0]->total;
                foreach($cartdetail as $cart){
                    $p=Product::find($cart->product_id);
                    $totalQty+=$cart->quantity;
                    $p->quantity=$cart->quantity;
                    array_push($productcart,$p);
                }
		        return view("home.cart",compact("totalPrice","cartdetail","productcart","totalQty","cart_id"));
            } else {
                return redirect(route('home'));
            }
        }
    public function showorder($id_Cart)
    {
        
        $cart = Cart::get_cart($id_Cart);
        $memo=$cart[0]->memo;
        $cartdetail = Cart::get_orderdetail($id_Cart);
        $productcart = [];
        $totalQty = 0;
        $totalPrice = $cart[0]->total;
        foreach ($cartdetail as $cart) {
            $p = Product::find($cart->product_id);
            $totalQty += $cart->quantity;
            $p->quantity = $cart->quantity;
            array_push($productcart, $p);
        }
        return view("home.showorder", compact("totalPrice", "cartdetail", "productcart", "totalQty","memo"));
        
    }
    
    public function rediect(Request $request)
    {
        $request->session()->put('id_cart', null);
        return redirect()->route('home');
    }
    
    public function updatecart(Request $request)
    {
        $cart_id = $request->cart_id;
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $result = Cart::upcart($cart_id, $product_id, $quantity);
        return number_format($result,0 ,'.' ,'.');
    }
    public function confirmorder(Request $request){
        $id_Cart=$request->id;
        $text=$request->txt;
        $result=Cart::confirmorder($id_Cart,$text);
        $request->session()->put('id_cart', null);
        return "OK";
    }
}