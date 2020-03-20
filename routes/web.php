<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*product route*/

Route::get('/boutique','ProductController@index')->name('products.index');   
Route::get('/boutique/{slug}','ProductController@show')->name('products.show');  

/*cart Route */
Route::get('/panier','CartController@index')->name('cart.index');
Route::post('/panier/ajouter','CartController@store')->name('cart.store');  
Route::delete('/panier/{rowId}','CartController@destroy')->name('cart.destroy');
Route::get('/clean', function(){
    Cart::destroy();
    return redirect()->route('products.index');
    
});
/* Checkout route */

Route::get('/paiement','CheckoutController@index')->name('checkout.index');
Route::post('/paiement','CheckoutController@store')->name('checkout.store');
Route::get('/merci','CheckoutController@thankyou')->name('checkout.thankyou');
