<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
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
            $products=Product::paginate(4);
            return view('admin.viewproduct', compact('products'));
        }
    public function deleteProduct($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->back()->with('deleteproduct_message', 'Product deleted successfully!');
}
  
    public function updateProduct($id){
    $product = Product::findOrFail($id);
    $image_path=public_path('products/'.$product->product_image);
    if(file_exists($image_path)){
        unlink($image_path);
    }
    $category=Category::all();
    return view ('admin.updateproduct', compact('product','category'));
}
    public function postupdateproduct(Request $request,$id){
    $product=Product::findOrFail($id);
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
    public function searchproduct(Request $request){
        $products=Product::where('product_title','LIKE','%'.$request->search.'%')
                            ->orWhere('product_description','LIKE','%'.$request->search.'%')
                           ->orWhere('product_category','LIKE','%'.$request->search.'%')->paginate(2);
    
        return view('admin.viewproduct',compact('products'));
    }
    public function viewOrders(){
        $orders=Order::all();
        return view ('admin.vieworders',compact('orders'));
    }
    public function changeStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();
    return redirect()->back();
}
}