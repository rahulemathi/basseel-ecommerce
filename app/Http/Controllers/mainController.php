<?php

namespace App\Http\Controllers;

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
            return view('categories',compact('categories','number'));
        }else{
            return redirect()->route('dashboard');
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
            $image = $request->file('product_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $resize = Image::make($image)->fit(370,230)->save('images/'.$imageName);
            $product->product_image = $imageName;
            $product->save();
            Alert::success('Product Added Successfully');
            return redirect()->back();
        }else{
            Alert::error('Oops','Only admin and seller can visit this page');
            return redirect()->back();
        }
    }

    public function show_product_form(){
        $categories = Category::all();
        return view('add_product',compact('categories'));
    }

    public function view_product(){
        $product = Product::all();
        return view('product',compact('product'));
    }
    
}
