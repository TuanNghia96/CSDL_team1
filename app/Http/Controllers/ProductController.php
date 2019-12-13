<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use App\Models\Cart;
use App\Models\Feedback;
use App\Models\Category;
class ProductController extends Controller
{
    protected $product;
    
    /**
     * CustomerController constructor.
     *
     * @param \App\Models\Product $product
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
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function list(){
        /* $products = $this->product->get(); */
        $New_Product=Product::New_Product(8);
/*          var_dump($New_Product); */
        return view("home.trangchu",compact("New_Product"));
    } 
    public function Cart(Request $request,$id){
        /* $input=$request->all(); */
        $product=Product::find($id);
        $oldCart=Session("cart")?session::get('cart'):NULL;
        $cart=new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back(); 
    }
    public function delete_Cart(Request $request,$id){
        $oldCart=Session::has('cart')?Session::get('cart'):NULL;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            $request->session()->put('cart',$cart);
        }
        else $request->session()->forget('cart');
        return redirect()->back();
    }
    public function Order(Request $request){
        $oldCart=Session::has('cart')?session::get('cart'):NULL;
        return view("home.cart",compact($oldCart));
    }
    public function ProductDetail(Request $request,$id){
        $product=Product::find($id);
        $new_product=Product::New_Product(4);
        $best_product=Product::Best_Product();
        $product_lq=Product::product_lq($product->id,$product->category_id);
        $review=Feedback::get_review($id);
        return view("home.product_detail",compact("product","new_product","best_product","product_lq","review"));
    }
    public function Category(Request $request,$id){
        $category=Category::get_name();
        if(!$id) $id=$category[0]->id; 
        $product_category=Product::category_product($id);
        $best_product=Product::Best_category_product($id);
        return view("home.product_type",compact("category","product_category","best_product"));
    }
    public function SaveOrder(Request $request){
        $oldCart=Session::has('cart')?session::get('cart'):NULL;
          
    }
}