<?php

namespace App\Http\Controllers;

use App\Charts\HighChart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class GraphicController extends Controller
{
    /**
     * Display a graphic of the order.
     *
     * @return \Illuminate\Http\Response
     */
    public function order()
    {
        $chart1 = new HighChart();
        $chart2 = new HighChart();
        $order = new Order();
        $labels = [];
        $dataset = [];
        for ($i = 0; $i <= 30; $i++) {
            array_push($labels, $i);
            array_push($dataset, $order->whereDate('created_at', Carbon::now()->subDay($i))->count());
        }
        
        $chart1->labels($labels);
        $chart1->dataset('Số lượng đơn hàng', 'line', $dataset);
        
        $labels2 = [];
        foreach (Order::$status as $key => $value) {
            array_push($labels2, $value);
            $chart2->dataset($value, 'column', [$order->where('status', $key)->count()]);
        }
        return view('admin.graphics.users', compact(['chart1', 'chart2']));
        
    }
    
    /**
     * Display a graphic of the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        $product = new Product();
        
        $chart1 = new HighChart();
        $chart1->title("Bought graphic");
        $chart1->labels(['Số lượng bán ra']);
        $chart1->dataset($product->orderBy('bought', 'desc')->first()->name, 'bar', [$product->max('bought')]);
        $chart1->dataset($product->orderBy('bought')->first()->name, 'bar', [$product->min('bought')]);
        
        $chart2 = new HighChart();
        $chart2->title("Price graphic");
        $chart2->labels(['Giá tiền']);
        $chart2->dataset($product->orderBy('price', 'desc')->first()->name, 'bar', [$product->max('price')]);
        $chart2->dataset($product->orderBy('price')->first()->name, 'bar', [$product->min('price')]);
        
        $chart4 = new HighChart();
        $labels2 = [];
        $dataset2 = [];
        foreach (Category::pluck('name', 'id') as $key => $value) {
            array_push($labels2, $value);
            array_push($dataset2, $product->where('category_id', $key)->count());
        }
        $chart4->dataset('Số lượng sản phẩm', 'pie', $dataset2);
        $chart4->labels($labels2);
        return view('admin.graphics.product', compact(['chart1', 'chart2', 'chart4']));
    }
    
    /**
     * Display a graphic of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $user = new User();
        $order = new Order();
        $chart1 = new HighChart();
        $chart1->title("1 order max price graphic");
        $chart1->labels(['3 người mua 1 đơn nhiều nhất']);
        foreach ($order->orderBy('total', 'desc')->take(3)->get() as $value) {
            $chart1->dataset($value->user->name, 'bar', [$value->total]);
        }
    
        $max1 = 0; $name1 = '';
        $max2 = 0; $name2 = '';
        $max3 = 0; $name3 = '';
        foreach ($user->get() as $value) {
            if ($max1 < $value->orders()->count()) {
                $max3 = $max2;
                $name3 = $name2;
                $max2 = $max1;
                $name2 = $name1;
                $max1 = $value->orders()->count();
                $name1 = $value->name;
            }
        }
        $chart2 = new HighChart();
        $chart2->title("customer have max order graphic");
        $chart2->labels(['người có đơn hàng nhiều nhất']);
        $chart2->dataset($name1, 'bar', [$max1]);
        $chart2->dataset($name2, 'bar', [$max2]);
        $chart2->dataset($name3, 'bar', [$max3]);
    
        return view('admin.graphics.users', compact(['chart1', 'chart2']));
    }
}
