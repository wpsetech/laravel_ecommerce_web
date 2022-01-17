<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function product(){
        $products= Product::latest()->paginate(5);
        return view('admin.products.index',compact('products'));
    }
    public function addProduct(){
        $category=Category::all();
        return view('admin.products.add',compact('category'));
    }

    public function insertProduct(Request $request){
        $products = new Product();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move(public_path('admin/img/products'),$filename);
            $products->image= $filename;
        }
        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->tax = $request->input('tax');
        $products->status = $request->input('status')== True ? '1' : '0';
        $products->trending = $request->input('trending')== True ? '1' : '0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->meta_description = $request->input('meta_description');
        $products->save();
        return redirect('/products')->with('status','Product added successfully');
    }

    ///edit product
    public function editProduct($id){
        $products = Product::find($id);
        $category = Category::all();
        return view('admin.products.edit',compact('products'),compact('category'));

    }

    public function updateProduct(Request $request, $id){
        $products = Product::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move(public_path('admin/img/products'),$filename);
            $products->image= $filename;
        }
        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->tax = $request->input('tax');
        $products->status = $request->input('status')== True ? '1' : '0';
        $products->trending = $request->input('trending')== True ? '1' : '0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->meta_description = $request->input('meta_description');
        $products->update();
        return redirect('/products')->with('status','Product updated successfully');
    }
    public function deleteProduct($id){
        $product = Product::find($id)->delete();
        return redirect('/products')->with('status','Product deleted successfully');
    }
}
