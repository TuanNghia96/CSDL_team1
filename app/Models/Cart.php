<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;

class Cart extends Model
{
    public function add($item, $id){
		$giohang=["item"=>$item,"price"=>0,"qty"=>0];
		if($this->items){
            if(array_key_exists($id,$this->items)){
				$giohang=$this->items[$id];
            }
        }
        $giohang['qty']++;
		$giohang['price']+=$item->price;
		$this->totalQty++;
		$this->totalPrice+=$item->price;
		$this->items[$id]=$giohang;
		}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	static public function get_orderdetail($id_Cart){
		$result=DB::table('order_details')->where("order_id","=",$id_Cart)->get();
		return $result;
	}
	static public function removeItem($order_id,$id){
		$product=DB::table('order_details')->where([["order_id","=",$order_id],["product_id","=",$id]])->get();
		$order=DB::table('orders')->where("id","=",$order_id)->get();
		$id=$product[0]->product_id;
		$p=DB::table('products')->where("id","=",$id)->get();
		$total=($order[0]->total)-($p[0]->price * $product[0]->quantity);
		$result=DB::table('orders')->where("id","=",$order_id)->update(["total"=>$total]);
		$result=DB::table('order_details')->where([["order_id","=",$order_id],["product_id","=",$id]])->delete();
		return $result;
	}
	static public function add_NewCart($user_id,$product){
		$result=DB::table("orders")->insert(["user_id"=>"$user_id","total"=>$product->price,"status"=>0,"created_at"=> date('Y-m-d H:i:s')]);
		$order_id = DB::getPdo()->lastInsertId();
		$result=DB::table("order_details")->insert(["order_id"=>$order_id,"product_id"=>$product->id,"quantity"=>1]);
		return $order_id;
	}
	static public function add_Cart($order_id,$product){
		$result=DB::table("order_details")->where([["product_id","=",$product->id],["order_id","=",$order_id]])->get();
		if($result->count()>0){
			$result=DB::table("order_details")->where("id","=",$result[0]->id)->update(["quantity"=>$result[0]->quantity+1]);
			$order=DB::table('orders')->where("id","=",$order_id)->get();
			$result=DB::table('orders')->where("id","=",$order_id)->update(["total"=>$order[0]->total+$product->price]);
			return $result;
		}
		else{ 
			$result=DB::table("order_details")->insert(["order_id"=>$order_id,"product_id"=>$product->id,"quantity"=>1]);
			$order=DB::table('orders')->where("id","=",$order_id)->get();
			$result=DB::table('orders')->where("id","=",$order_id)->update(["total"=>$order[0]->total+$product->price]);
			return  $result;
		} 
	}
	static public function get_cart($id_cart){
		$result=DB::table('orders')->where("id","=",$id_cart)->get();
		return $result;
	}
	static public function get_cart_userid($user_id){
		$result=DB::table('orders')->where([["user_id","=",$user_id],["status",">",0]])->orderByRaw('created_at DESC')->paginate(7);
		return $result;
	}
	static public function upcart($cart_id,$product_id,$quantity){
		$result=DB::table("order_details")->where([["order_id","=",$cart_id],["product_id","=",$product_id]])->get();
		$sl=$result[0]->quantity;
		$result=DB::table("order_details")->where([["order_id","=",$cart_id],["product_id","=",$product_id]])->update(["quantity"=>$quantity]);
		$result=DB::table("products")->where("id","=",$product_id)->get();
		$price=$result[0]->price;
		
		$order=DB::table("orders")->where("id","=",$cart_id)->get();
		$total=$order[0]->total;
		$price=$total+($quantity-$sl)*$price;
		$result=DB::table("orders")->where("id","=",$cart_id)->update(["total"=>$price]);
		
		return $price;
	}
	static public function deletecart($id_Cart){
		$result=DB::table('orders')->where("id","=",$id_Cart)->delete();
		return $result;
	}
	static public function confirmorder($id_cart,$text){
		$result=DB::table('order_details')->where("order_id","=",$id_cart)->get();
		foreach($result as $product){
			$product_id=$product->product_id;
			$order=DB::table("products")->where("id","=",$product_id)->get();
			$bought=$order[0]->bought+$product->quantity;
			$order=DB::table("products")->where("id","=",$product_id)->update(["bought"=>$bought]);
		}
		$result=DB::table("orders")->where("id","=",$id_cart)->update(["status"=>1,"memo"=>"$text"]);
		return $result;
	} 
	static public function updatestatus($id_Cart){
		$result=DB::table('orders')->where("id","=",$id_Cart)->update(["status"=>1]);
		return $result;
	}
}