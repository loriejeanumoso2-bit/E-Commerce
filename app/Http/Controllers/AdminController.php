<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class AdminController extends Controller
{
    public function addCategory()
    {
        return view('admin.addcategory');
    }
    public function postAddCategory(Request $request){
    $category=new Category(); 
    $category->category=$request->category;
    $category->save();
    return redirect()->back()->with('category_message','Category added succesfully');
    }
    public function viewCategory(){
    $categories=Category::all(); 
    return view('admin.viewcategory',compact('categories'));
    }
    public function deleteCategory($id){
        $category=Category::findOrfail($id);
    
        $category->delete();

        return redirect()->back()->with('deletecategory_message','Deleted sucessfully!');

    }
    public function updateCategory($id){
        $category=Category::findOrfail($id);
        return view('admin.updatecategory',compact('category'));
    }
     public function postUpdateCategory(Request $request, $id){ 
     $category=Category::findOrfail($id);

     $category->category=$request->category;
     $category->save();
      return redirect()->back()->with('category_updated_message','Category updated succesfully');
     } 
     public function addproduct(){
        $categories=Category::all();
        return view('admin.addproduct',compact('categories'));
     }
     public function postaddproduct(Request $request){
    $product = new Product();

    $product->product_title = $request->product_title;
    $product->product_description = $request->product_description;
    $product->product_quantity = $request->product_quantity;
    $product->product_prices = $request->product_price;

    $image = $request->file('product_image');

    if ($image) {
        $imagename = time() . "." . $image->getClientOriginalExtension();
        $image->move(public_path('product'), $imagename);
        $product->product_image = $imagename;
    }

    $product->product_category = $request->product_category;

    $product->save();

    return redirect()->back()->with('product_message', 'Product added successfully!');
}
        public function viewproduct(){
            $product=Product::paginate(2);
            return view('admin.viewproduct', compact('product'));
        }

}
