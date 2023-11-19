<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class mainController extends Controller
{
    public function show_categories(){
        $user = Auth::user()->role;
        $categories = Category::all();
        $number = 1;
        if($user === 'admin'){
            return view('categories',compact('categories','number','user'));
        }else{
            Alert::warning('You cannot visit this page', 'to visit this page become a seller'); 
            return redirect()->back();
        }
    }

    public function add_category(Request $request){
         $category = new Category();
         $category->category = $request->category;
         $category->save();
         Alert::success('Category added successfully');
         return redirect()->back();
    }

    public function remove_category($id){
        $category = Category::find($id);
        $category->delete();
        Alert::success('category remove successfully');
        return redirect()->back();
    }

    public function add_product(Request $request){
        $user = Auth::user()->role;
        $product = new Product();
        $categories = Category::all();
        if($user === 'admin' || $user === 'seller'){
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_price = $request->product_price;
            $product->product_category = $request->product_category;
            $product->stock_quantity = $request->stock_quantity;
            $product->user_id = Auth::user()->id;
            $image = $request->file('product_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $resize = Image::make($image)->fit(370,230)->save('images/'.$imageName);
            $product->product_image = $imageName;
            $product->save();
            Alert::success('Product Added Successfully');
            return redirect()->back();
        }elseif($user === 'customer'){
            Alert::error('Oops','Only admin and seller can visit this page');
            return redirect()->back();
        }
    }

    public function edit_product($id){
        $user = Auth::user()->role;
        $categories = Category::all();
        if($user === 'admin' || $user === 'seller'){
        $product = Product::find($id);
        return view('product_edit',compact('product','categories'));
        }else{
            Alert::warning('Oops','Only admin and seller can visit this page');
            return redirect()->back();
        }
    }

    public function update_product(Request $request,$id){
        $user = Auth::user()->role;
        $product = Product::find($id);
        if($user === 'admin' || $user === 'seller'){
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_price = $request->product_price;
            $product->product_category = $request->product_category;
            $product->stock_quantity = $request->stock_quantity;
            if($image = $request->file('product_image')){
            $image = $request->file('product_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $resize = Image::make($image)->fit(370,230)->save('images/'.$imageName);
            $product->product_image = $imageName;
            }
            $product->save();
            Alert::success('Product updated Successfully');
            return redirect('add_product');
        }elseif($user === 'customer'){
            Alert::error('Oops','Only admin and seller can visit this page');
            return redirect()->back();
        }
        
    }

    public function delete_product($id){
        $user = Auth::user()->role;
        if($user === 'admin' || $user === 'seller'){
            $product = Product::find($id);
           $product->delete();
           Alert::success('Product deleted Successfully');
           return redirect()->back();
            }else{
                Alert::warning('Oops','Only admin and seller can visit this page');
                return redirect()->back();
            }
    }

    public function show_product_form(){
        $user = Auth::user()->role;
        $categories = Category::all();
        if($user === 'admin'){
        $product = Product::all();
        return view('add_product',compact('categories','product'));
        }elseif($user === 'seller'){
            $product = Product::all()->where('user_id','=',Auth::user()->id);
            return view('add_product',compact('product','categories'));
        }
        else{
            Alert::warning('only sellers and admin can visit this page','to vist this page register as a seller');
            return redirect()->back();
        }
    }

    public function view_product(){
        $product = Product::all();
        return view('product',compact('product'));
    }

    public function single_product($id){
        $product = Product::find($id);
        return view('single_product',compact('product'));
    }

    public function show_cart(){
        if(Auth::id()){
            $id =Auth::user()->id;
            $cart = Cart::where('user_id','=',$id)->get();
            $cart_items = $cart->count();
            $total_price = Cart::where('user_id','=',$id)->sum('price');
            return view('cart',compact('cart','cart_items','total_price'));
        }else{
            return redirect('login');
        }
    }

    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user = Auth::user();
            $userId = $user->id;
            $product = Product::find($id);
            $existing_product = Cart::where('product_id','=',$id)->where('user_id','=',$userId)->get('id')->first();
           
            if($existing_product){
                $cart = Cart::find($existing_product)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;
                $cart->price = $product->product_price * $request->quantity;
                $cart->save();
                Alert::success('Added to cart successfully');
                return redirect()->back();
            }else{
                $cart = new Cart();
                $cart->customer = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->user_id = $user->id;
                $cart->image = $product->product_image;
                $cart->product_id = $product->id;
                $cart->product_name = $product->product_name;
                $cart->price = $product->product_price * $request->quantity;
                $cart->quantity = $request->quantity;
                $cart->save();
                Alert::success('Added to cart successfully');
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }
    
    
    public function remove_cart($id){
        $cart = Cart::find($id);
        $cart->delete();
        Alert::success("Deleted from cart successfully");
        return redirect()->back();
    }

    public function orders(){
        $user = Auth::user()->role;
        if($user === 'admin'){
            $orders = Order::all();
            $ordersUnits = $orders->count();
            return view('orders',compact('orders','ordersUnits'));
        }else{
        $orders = Order::all()->where('user_id','=',Auth::user()->id);
        $ordersUnits = $orders->count();
        return view('orders',compact('orders','ordersUnits'));
        }
    }

    public function search(Request $request){
        $search = $request->search;
        $product = Product::where('product_name','LIKE',"%$search%")->orWhere('product_category','LIKE',"%$search%")->paginate(9);
        return view('search_product',compact('product'));
    }

    

    public function checkout(Request $request)
{
    $user = Auth::user();
    $userId = $user->id;
    
    $cartItems = Cart::where('user_id', $userId)->get();

    foreach ($cartItems as $cartItem) {
        $order = new Order();
        $order->user_id = $userId;
        $order->name = $cartItem->customer;
        $order->email = $cartItem->email;
        $order->product_title = $cartItem->product_name;
        $order->quantity = $cartItem->quantity;
        $order->product_id = $cartItem->product_id;
        $order->price = $cartItem->price;
        $order->image = $cartItem->image;
        $order->payment_status = 'Successful';
        $order->deliver_status = 'pending';

        $product = Product::find($cartItem->product_id);
        $product->stock_quantity = $product->stock_quantity - $cartItem->quantity;

      
        $order->save();
        $product->save();
    }

 
    Cart::where('user_id', $userId)->delete();

    Alert::success('Payment successful', 'Orders placed successfully');
    return redirect('product');
}
}
