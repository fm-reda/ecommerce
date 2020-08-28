<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)


    {
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->product_id;
        });
        if ($duplicata->isNotEmpty()) {
            if ($request->origin == 'home') {




                return redirect()->route('home')->with('danger', 'Product already added');
            }


            return redirect()->route('products.index')->with('danger', 'Product already added');
        }
        $product = Product::find($request->product_id);


        //associer

        // dd(Cart::content());

        Cart::add($product->id, $product->title, 1, $product->price)
            ->associate('App\Product');
        // dd($request->origin);
        if ($request->origin == 'home') {



            return redirect()->route('home')->with('success', 'Product added successfully');
        }

        // dd('$request->categorie');
        // dd($request->categorie);
        return redirect()->route('products.index', ['categorie' => $request->categorie])->with('success', 'Product added successfully');
    }

    public function storeCoupon(Request $request)
    {

        $code = $request->get('code');
        $coupon = Coupon::where('code', $code)->first();
        if (!$coupon) {
            return redirect()->back()->with('error', 'Coupon n\'est pas valide');
        }
        $request->session()->put('coupon', [
            'code' => $coupon->code,
            'remise' => $coupon->discount(Cart::subtotal()),
            'percent' => $coupon->percent_off,
        ]);
        return redirect()->back()->with('success', 'Le coupon est appliqué');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        // dd(request()->session()->get('coupon'));
        // return response()->json(['error' => 'cart Quantity has not been Updated']);
        // return response()->json(['test' => request()->session('coupon')], 200);
        $data = $request->json()->all();
        $validator = Validator::make($request->all(), [

            'qty' => 'required|numeric|between:1,6'

        ]);

        if ($validator->fails()) {
            Session::flash('danger', 'Quantity of product cant be more than 6.');
            return response()->json(['error' => 'cart Quantity has not been Updated']);
        }

        if ($data['qty'] > $data['stock']) {
            Session::flash('danger', 'quantité du produit n\'est pas disponible.');
            return response()->json(['error' => 'Product Quantity not ']);
        }

        Cart::update($rowId, $data['qty']);
        Session::flash('success', 'Quantity of product changed to ' . $data['qty']);
        return response()->json(['success' => 'cart Quantity has been Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)

    {


        Cart::remove($rowId);


        return back()->with('success', 'the product has been deleted.');
    }

    public function destroyCoupon()
    {
        request()->session()->forget('coupon');
        return redirect()->back()->with('success', 'Le coupon à éte retiré');
    }
}
