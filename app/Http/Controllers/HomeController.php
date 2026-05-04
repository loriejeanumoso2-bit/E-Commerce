<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\Order;
class HomeController extends Controller

{
    public function index()
    {
        $user = Auth::user();

        if ($user->user_type === 'admin') {
            return view('admin.dashboard');
        }

        return view('dashboard');

    }
    public function home(){
        if(Auth::check()){
   $count = ProductCart::where('user_id', Auth::id())->count();
    }
        else{
        $count='';
    }
    $products = Product::latest()->take(4)->get();
    return view('index', compact('products','count'));
    }
    public function productDetails($id){
        if(Auth::check()){
   $count = ProductCart::where('user_id', Auth::id())->count();
    }
        else{
        $count='';
    }
        $product=Product::findOrFail($id);
        return view('product_details',compact('product','count'));
    }
    public function allproducts(){
        if(Auth::check()){
   $count = ProductCart::where('user_id', Auth::id())->count();
    }
        else{
        $count='';
    }
        $products=Product::all();
        return view('allproducts',compact('products','count'));
    }
    public function addToCart($id){
        $product= Product::findOrFail($id);
        $product_cart=new ProductCart();
        $product_cart->user_id=Auth::id();
        $product_cart->product_id=$product->id;

        $product_cart->save();
        return redirect()->back()->with('cart_message','added to the cart');
    } 
    public function cartProducts(){
        if(Auth::check()){
   $count = ProductCart::where('user_id', Auth::id())->count();
   $cart= ProductCart::where('user_id', Auth::id() )->get();
    }
        else{
        $count='';
    }
    return view('viewcartproducts',compact('count','cart'));
    }
    public function removeCartProducts($id){
        $cart_product=ProductCart::findOrFail($id);
        $cart_product->delete();
        return redirect()->back();
    }

   public function confirm_order(Request $request)
{
    $cart_products = ProductCart::where('user_id', Auth::id())->get();

    foreach ($cart_products as $cart_product) {

        $order = new Order();

        $order->Receiver_address = $request->Receiver_address;
        $order->Receiver_phone = $request->Receiver_phone;
        $order->user_id = Auth::id();
        $order->product_id = $cart_product->product_id;


        $order->save();

        // delete each cart item
        $cart_product->delete();
    }

    return back()->with('confirm_order', 'Order Confirmed Successfully');
}
    public function myOrders(){
        $orders=Order::where('user_id',Auth::id())->get();
        return view('viewmyorders',compact('orders'));
    }
}