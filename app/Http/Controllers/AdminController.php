<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();  // Corrected to Category (capital C)

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){
        $data = new Category;  // Corrected to Category (capital C)

        $data->category_name = $request->category;

        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id){
        $data = Category::find($id);  // Corrected to Category (capital C)
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product(){
        $category = Category::all();  // Corrected to Category (capital C)
        $product = Product::all();    // Fetch all products to display
        
        // Pass products and categories to the view
        return view('admin.product', compact('category', 'product'));
    }

    public function add_product(Request $request){
        $product = new Product;  // Corrected to Product (capital P)

        $product->product_name = $request->name;
        $product->price = $request->price;
        $product->discounted_price = $request->discount;
        $product->description = $request->description;
        $product->category = $request->category;

        // Image handling
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();

        // Save image to 'product' directory
        $request->image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function manage_product(){
        $product = Product::all();  // Corrected to Product (capital P)
        return view('admin.mngproduct', compact('product'));
    }

    public function delete_product($id){
        $product = Product::find($id);  // Corrected to Product (capital P)

        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function update_product($id)
    {
        $product = Product::find($id);  // Corrected to Product (capital P)
    
        $category = Category::all();  // Corrected to Category (capital C)
        $categoryName = "";  // Initialize the categoryName
    
        if ($product && $product->categoryRelation) {
            $categoryName = $product->categoryRelation->category_name; // Correctly accessing category name
        }
    
        return view('admin.update_product', compact('product', 'category', 'categoryName'));
    }
    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);  // Corrected to Product (capital P)

        $product->product_name = $request->name;
        $product->price = $request->price;
        $product->discounted_price = $request->discount;
        $product->description = $request->description;
        $product->category = $request->category;

        // Handling image update
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imagename);  // Fixed this line to use the correct variable
            $product->image = $imagename;
        }

        $product->save();
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }
}
