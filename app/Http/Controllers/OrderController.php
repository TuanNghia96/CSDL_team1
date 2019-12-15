<?php

namespace App\Http\Controllers;

use App\Jobs\SendOrderEmail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    protected $order;
    
    /**
     * CustomerController constructor.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('admin')) {
            $orders = $this->order->getList($request);
            $status = Order::$status;
            return view('admin.orders.index', compact(['orders', 'status']));
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
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        if (Gate::allows('admin')) {
            $order = $this->order->find($id);
            $status = Order::$status;
            return view('admin.orders.show', compact(['order', 'status']));
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
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function updateStatus($id)
    {
        if (Gate::allows('admin')) {
            $order = $this->order->find($id);
            if (($order->status == 1) || ($order->status == 2)) {
                //sendmail
                $order->update(['status' => $order->status + 1]);
                dispatch(new SendOrderEmail($order));
            }
            return redirect(route('orders.index'));
        } else {
            return redirect(route('home'));
        }
    }
    
    /**
     * cancel order
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cancel(Request $request)
    {
        if (Gate::allows('admin')) {
            $input = $request->all();
            $order = $this->order->find($input['id']);
            $order->update(['status' => Order::CANCEL_STATUS]);
            dispatch(new SendOrderEmail($order, $input['reason']));
            return redirect(route('orders.index'));
        } else {
            return redirect(route('home'));
        }
    }
    

}
