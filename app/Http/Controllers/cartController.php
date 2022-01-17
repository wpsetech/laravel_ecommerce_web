<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class cartController extends Controller
{
    public function addtoCart(Request $request){
        $product_id = $request->input('product_id');
        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();
            if($prod_check)
            {
                if(cart::where('product_id',$product_id)->where('user_id',Auth::id())->first())
                {
                    return redirect('/cart')->with('status','Already added to cart');


                }
                else{
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->save();
                    return redirect('/cart')->with('status','Added to cart');
                }

            }
        }
        else
        {
            return redirect('/cart')->with('status','Login to Continue');
        }
    }
        public function viewcart(){
        $cartitems = cart::latest()->where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartitems'));
    }

    public function deletecart(Request $request){
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            if(cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists());
            {
                $cartItem = cart::where('product_id',$product_id)->where('user_id',Auth::id());
                $cartItem->delete();
                return redirect('/cart')->with('status','Product Removed Successfully');

            }
        }
        else
        {
            return redirect('/register')->with('status','Login to Continue');
        }

    }
    static public function cartcount(){
        $userId = Session::get('user_id',Auth::id());
        return cart::where('user_id',$userId)->count();
    }


}
