<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        // dd(Cart::content());
        
        $products=Product::inRandomOrder()->take(6)->get();
        // dd($product);
        
        return view('products.index',compact('products'));
    }

    public function show($slug){

        $product=Product::where('slug',$slug)->firstOrFail();
        return view('products.show',compact('product'));
    }
}