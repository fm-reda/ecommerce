<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\Product;
use Illuminate\Http\Request;
// use Illuminate\Validation\Validator;

class ProductController extends Controller
{
    public function index()
    {
        // dd(Cart::content());
        //requete pour recuperer les produit par categorie
        if (request()->categorie) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->categorie);
            })->orderBy('created_at', 'DESC')->paginate(6);
        } else {
            $products = Product::with('categories')->orderBy('created_at', 'DESC')->paginate(6);
        }
        // dd($product);

        return view('products.index', compact('products'));
    }

    public function show($slug)
    {

        $product = Product::where('slug', $slug)->firstOrFail();
        $stock = $product->stock === 0 ? 'Indisponible' : 'Disponible';
        return view('products.show', compact('product', 'stock'));
    }

    public function search()
    {

        request()->validate([
            'Search' => 'required|min:3'
        ]);

        $q = request()->input('Search');
        $products = Product::where('title', 'like', "%$q%")
            ->orwhere('description', 'like', "%$q%")
            ->paginate(6);
        return view('products.index', compact('products'));
    }
}
