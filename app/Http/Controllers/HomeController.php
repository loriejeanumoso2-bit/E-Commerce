<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\Order;
use App\Models\Review;

class HomeController extends Controller

{
    public function index()
    {
        $user = Auth::user();

        if ($user->user_type === 'admin') {
            return redirect()->route('admin.dashboard');
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

        $product = Product::with('reviews')->findOrFail($id);

        return view('product_details', compact('product','count'));
    }

    public function storeReview(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'review' => 'required|string|max:2000',
        ]);

        $review = new Review();
        $review->product_id = $product->id;
        $review->user_id = Auth::check() ? Auth::id() : null;
        $review->name = $request->name;
        $review->review = $request->review;
        $review->save();

        return redirect()->route('product_details', $product->id)
            ->with('review_message', 'Thank you! Your review has been submitted.');
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
    public function addToCart($id)
{
    $product = Product::findOrFail($id);

    $cart = ProductCart::where('user_id', Auth::id())
        ->where('product_id', $id)
        ->first();

    if ($cart) {

        $cart->quantity += 1;
        $cart->save();

    } else {

        $product_cart = new ProductCart();

        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $product->id;
        $product_cart->quantity = 1;

        $product_cart->save();
    }

    return redirect()->back()->with('cart_message', 'Added to cart');
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
    public function why_us(){
    
    return view('whyus');
}
public function increaseQuantity($id)
{
    $cart = ProductCart::findOrFail($id);

    $cart->quantity += 1;

    $cart->save();

    return redirect()->back();
}

public function decreaseQuantity($id)
{
    $cart = ProductCart::findOrFail($id);

    if ($cart->quantity > 1) {

        $cart->quantity -= 1;

        $cart->save();
    }

    return redirect()->back();
}
public function search(Request $request)
{
    if (Auth::check()) {
        $count = ProductCart::where('user_id', Auth::id())->count();
    } else {
        $count = '';
    }

    $query = trim($request->query('query', ''));

    $products = Product::where('product_title', 'LIKE', "%{$query}%")
        ->orWhere('product_description', 'LIKE', "%{$query}%")
        ->get();

    return view('search_results', compact('products', 'query', 'count'));
}
}