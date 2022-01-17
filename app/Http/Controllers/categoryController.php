<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class categoryController extends Controller
{
    public function category(){
        $category = Category::latest()->paginate(5);
        return view('admin.category.index',compact('category'));
    }

    public function addCat(){
        return view('admin.category.add');
    }

    public function insertCat(Request $request){
        $category = new Category();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move(public_path('admin/img/category'),$filename);
            $category->image= $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status')== True ? '1' : '0';
        $category->popular = $request->input('popular')== True ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        return redirect('/categories')->with('status','Category added successfully');
    }
//    edit category
    public function editCat($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function updateCat(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move(public_path('admin/img/category'),$filename);
            $category->image= $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status')== True ? '1' : '0';
        $category->popular = $request->input('popular')== True ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();
        return redirect('/categories')->with('status','Category updated successfully');

    }

    ///delete
    public function deleteCat($id){
        $category = Category::find($id)->delete();
        return redirect('/categories')->with('status','Category deleted successfully');
    }

}
