<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;

class stripeController extends Controller
{


    public function index(Request $request){

        $request->validate([
                'firstname' => 'required:firstname|max:255',
                'lastname' => 'required:lastname|max:255',
                'email' => 'required:email|max:255',
                'phone' => 'required:phone|max:255',
                'address1' => 'required:address1|max:255',
                'address2' => 'required:address2|max:255',
                'city' => 'required:city|max:255',
                'state' => 'required:state|max:255',
                'country' => 'required:country|max:255',
                'pincode' => 'required:pincode|max:255',

            ]
            ,
            [
                'firstname.required'=>'Please Enter First Name',
                'lastname.required'=>'Please Enter Last Name',
                'phone.required'=>'Please Enter Phone no',
                'email.required'=>'Please Enter Email',
                'address1.required'=>'Please Enter Address 1',
                'address2.required'=>'Please Enter Address 2',
                'city.required'=>'Please Enter City Name',
                'state.required'=>'Please Enter State Name',
                'country.required'=>'Please Enter Country Name',
                'pincode.required'=>'Please Enter Pin code',

            ],

        );
        $order = new order();
        $order->user_id = Auth::id();
        $order->firstname = $request->input('firstname');
        $order->lastname = $request->input('lastname');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        //to calculate total price
        $total = 0;
        $cartitems_total = cart::where('user_id',Auth::id())->get();
        foreach ($cartitems_total as $prod)
        {
            $total += $prod->products->selling_price;
        }
        $order->total_price = $total;

        $order->tracking_no = 'e-store'.rand(1111,9999);
        $order->save();



        $cartitems= cart::where('user_id',Auth::id())->get();
        foreach ($cartitems as $item)
        {
            OrderItems::create([
                'order_id'=> $order->id,
                'prod_id'=> $item->product_id,
                'price'=> $item->products->selling_price,
            ]);
            $prod = Product::where('id',$item->product_id)->first();
            $prod->update();

        }

        \Stripe\Stripe::setApiKey('sk_test_51KDWRyJgMXX31ceY3muyddTLmHQ5tsVJATfYnbSrnpSP4Aa41smDAQb65dLc5vU0NLFz82L8HkIu5CLP01LCbNjx00Y1mBIjZJ');

        $YOUR_DOMAIN = 'http://127.0.0.1:8000/';

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->products->name,
                    ],
                    'unit_amount' => $item->products->selling_price,
                ],
                'quantity' => 1,

            ]],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . 'success',
            'cancel_url' => $YOUR_DOMAIN . 'cancel',
        ]);
        if(Auth::user()->address1 == Null)
        {
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();

        }
        $cartitems= cart::where('user_id',Auth::id())->get();
        cart::destroy($cartitems);
        return Redirect($checkout_session->url);

    }

    public function success(){
        return redirect('/')->with('status','Payment completed');

    }
    public function cancel(){

        return redirect('/')->with('status','Payment canceled');
    }



}
