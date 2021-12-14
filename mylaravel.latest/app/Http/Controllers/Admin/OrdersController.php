<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::orderBy('id', 'desc')->paginate(20);
        return view ('admin.orders.index', ['orders' => $orders]);
    }

    public function search(Request $request){
        $inputData = $request->all();
        $orders = Order::orderBy('id','desc');
        if(isset($inputData['code']) && $inputData['code'] != ''){
            $orders = $orders->where('code','like','%'.$inputData['code'].'%');
        }
        if(isset($inputData['status']) && $inputData['status'] != ''){
            $orders = $orders->where('status',$inputData['status']);
        }
        $orders = $orders->paginate(20);
        return view ('admin.orders.index', ['orders' => $orders]);
    }

    public function confirm($id){
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->route('admin.order');
    }

    public function detail($id){
        $orderDetail = Order::select(['customers.*','orders.*', 'pay_order.*', 'products.name as products_name', 'products.code as products_code', 'categorys.name as categorys_name'])
        ->join('pay_order', 'pay_order.order_id', '=','orders.id')
        ->join('products','products.id','=','pay_order.product_id')
        ->join('customers','customers.id','=','pay_order.customer_id')
        ->join('categorys','categorys.id','=','products.category_id')
        ->where('pay_order.order_id',$id)
        ->get();
        return view('admin.orders.detail',['orderDetail' => $orderDetail]);
    }
}
