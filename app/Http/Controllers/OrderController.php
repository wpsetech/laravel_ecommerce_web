<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = order::latest()->where('status','0')->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function view($id){
        $orders = order::latest()->where('id',$id)->first();
        return view('admin.orders.view',compact('orders'));
    }
    public function updateorder(Request $request, $id){
        $orders = order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status','Order updated successfully');
    }

    public function orderhistory(){
        $orders = order::latest()->where('status','1')->get();
        return view('admin.orders.history',compact('orders'));
    }
}
