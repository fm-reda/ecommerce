<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // dd(Cart::content());
        //requete pour recuperer les produit par categorie
        if (request()->categorie) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->categorie);
            })->paginate(6);

        } else {
            $products = Product::with('categories')->paginate(6);
        }
        // dd($product);

        return view('products.index', compact('products'));
    }

    public function show($slug)
    {

        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }
}
