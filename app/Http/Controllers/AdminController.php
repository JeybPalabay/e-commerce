<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//models
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category(){
        $data = category::all();

        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request){
        $data = new category;

        $data-> category_name = $request->category;

        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function delete_category($id){
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
    public function view_product(){
        $category = category::all();
        return view ('admin.product', compact('category'));
    }
    public function add_product(Request $request){
        $product = new product;

        $product->product_name = $request->name;
        $product->price = $request->price;
        $product->discounted_price = $request->discount;
        $product->description = $request->description;
        $product->category = $request->category;

        $image=$request->image;
        $imagename=time(). '.' .$image->getClientOriginalExtension();

        $request->image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');
    }
    public function manage_product(){
        $product = product::all();
        return view ('admin.mngproduct', compact('product'));
    }
    public function delete_product($id){
        $product = product::find($id);

        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }
    public function update_product($id){
        $product = product::find($id);

        $category = category::all();
        $categoryName = "";
        if($product && $product->category){
            $categoryName = $product->categoryRelation->category_name;
        }
        return view('admin.update_product', compact('product', 'category', 'categoryName'));
    }
    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);
    
        $product->product_name = $request->name;
        $product->price = $request->price;
        $product->discounted_price = $request->discount;
        $product->description = $request->description;
        $product->category = $request->category;
    
        $image = $request->image;
        if ($image) {
       
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->$image->move('product', $imagename);
            $product->image = $imagename;
        }
    
        $product->save();
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }
    
}
