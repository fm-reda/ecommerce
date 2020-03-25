<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use DateTime;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        if (Cart::count() <= 0) {
            return redirect()->route('products.index');
        }
        Stripe::setApiKey('sk_test_bRprZEBGjkkk9Hya0gXjCXpS00ubnJa3da');

        if (request()->session()->has('coupon')) {
            $total = (Cart::subtotal() - request()->session()->get('coupon')['remise']) * (config('cart.tax') / 100)
                +  (Cart::subtotal() - request()->session()->get('coupon')['remise']);
        } else {
            $total = Cart::total();
        }
        $intent = PaymentIntent::create([
            'amount' => round($total),
            'currency' => 'MAD',



            // Verify your integration in this guide by including this parameter
            'metadata' => [
                'integration_check' => 'accept_a_payment'


            ],
        ]);
        // dd($intent['customer']);




        $clientSecret = Arr::get($intent, 'client_secret');

        // dd($clientSecret);
        return view('checkout.index', compact('clientSecret', 'total'));
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
        if ($this->checkIfNotAvailable()) {
            Session::flash('danger', 'un produit dans votre panier n\'est plus disponible');
            return response()->json(['success' => false], 400);
        }
        $data = $request->json()->all();
        $order = new Order();

        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];
        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $products = [];
        $i = 0;
        foreach (Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->title;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->qty;

            $i++;
            # code...
        }
        $order->products = serialize($products);


        $order->user_id = Auth()->user()->id;
        $order->save();

        if ($data['paymentIntent']['status'] === 'succeeded') {
            $this->updateStock();
            Cart::destroy();

            Session::flash('success', 'Your order has been succeeded.');

            return response()->json(['success' => 'payment Intent succeeded']);
        } else {
            return response()->json(['error' => 'payment Intent not  succeeded']);
        }
        //    return $data['paymentIntent'];

    }

    public function thankyou()
    {
        return Session::has('success') ? view('checkout.thankyou') : redirect()->route('products.index');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function checkIfNotAvailable()
    {

        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->stock < $item->qty) {
                return true;
            }
        }
        return false;
    }

    private function updateStock()
    {

        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['stock' => $product->stock - $item->qty]);
        }
    }
}
