<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TestController extends Controller
{
    public function check()
    {
        if (Gate::allows('admin')) {
            foreach (Order::get() as $value) {
                $total = 0;
                if ($value->ordersDetail->count()) {
                    foreach ($value->ordersDetail as $item) {
                        $total += $item->quantity * $item->product->price;
                    }
                    $value->update(['total' => $total]);
                } else {
                    $value->delete();
                }
            }
            return redirect(route('orders.index'));
        } else {
            return redirect(route('home'));
        }
    }
}
