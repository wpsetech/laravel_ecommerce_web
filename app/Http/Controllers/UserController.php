<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $orders = order::latest()->where('user_id',Auth::id())->get();
        return view('frontend.orders.index',compact('orders'));
    }

    public function view($id){
            $orders = order::where('id',$id)->where('user_id',Auth::id())->first();
            return view('frontend.orders.view',compact('orders'));
    }

    public function delete($id){
        $delete = order::find($id)->delete();
        return redirect('/my-orders')->with('status','Order deleted successfully');
    }

}
