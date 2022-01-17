<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\contactEmail;
use App\Models\emailContact;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FrontendController extends Controller
{

    public function index(){
        $category =Category::where('popular','1')->take(4)->get();
        $featured_products=Product::where('trending','1')->take(8)->get();
        return view('frontend.index',compact('category','featured_products'));
    }
    public function viewfecategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category= Category::where('slug',$slug)->first();
            $cate_products = Product::where('cate_id',$category->id)->where('status','0')->get();
            return  view('frontend.products.index',compact('category','cate_products'));
        }
        else{
            return redirect('/')->with('status','slug not found');
        }
    }



    public function category(){
        $category =Category::all();
        return view('frontend.category',compact('category'));
    }
    public function viewcategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category= Category::where('slug',$slug)->first();
            $cate_products = Product::where('cate_id',$category->id)->where('status','0')->get();
            return  view('frontend.products.index',compact('category','cate_products'));
        }
        else{
            return redirect('/')->with('status','slug not found');
        }
    }
    public function allproducts(){
        $allproducts = Product::all();
        $mobile_pro=Product::where('meta_keywords','mobile')->take(10)->get();
        $laptop_pro=Product::where('meta_keywords','laptop')->take(10)->get();
        $headphones_pro=Product::where('meta_keywords','headphone')->take(10)->get();
        $tablet_pro=Product::where('meta_keywords','tablet')->take(10)->get();
        $clothes_pro=Product::where('meta_keywords','clothes')->take(10)->get();
        $bags_pro=Product::where('meta_keywords','bags')->take(10)->get();
        return view('frontend.products',compact('allproducts','mobile_pro','laptop_pro','headphones_pro','tablet_pro','clothes_pro','bags_pro'));
    }



    ///contact
    public function contact_email(Request $request){

        emailContact::insert([
            'email' => $request->email,
            'created_at'=> Carbon::now()

        ]);
        return Redirect::back()->with('status','Thank You For Subscribing Our Newsletters');
    }

    public function productview($cate_slug, $prod_slug){
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products = Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view',compact('products'));
            }
            else{
                return redirect('/')->with('status','Link broken');
            }
        }
        else{
            return redirect('/')->with('status','category not found');
        }
    }

    public function tpview($pro_slug)
    {

        if (Product::where('slug', $pro_slug)->exists()) {
            $products = Product::where('slug', $pro_slug)->first();
            return view('frontend.products.view', compact('products'));
        } else {
            return redirect('/')->with('status', 'Link broken');
        }
    }


    public function allproductsview($pro_slug)
    {

        if (Product::where('slug', $pro_slug)->exists()) {
            $products = Product::where('slug', $pro_slug)->first();
            return view('frontend.products.view', compact('products'));
        } else {
            return redirect('/')->with('status', 'Link broken');
        }
    }



}
