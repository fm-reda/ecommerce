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
Route::get('/', 'HomeController@index')->name('home');

Route::get('/master', function () {
    return view('products.show2');
});

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('welcome2');
// });
// Route::get('/dev', function () {
//     return view('layouts.home1');
// });
/*product route*/

Route::get('/boutique/{slug}', 'ProductController@show')->name('products.show2');
Route::get('/boutique', 'ProductController@index')->name('products.index');
Route::get('/search', 'ProductController@search')->name('products.search');


/*cart Route */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/panier', 'CartController@index')->name('cart.index');
    Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');

    Route::patch('panier/{rowId}', 'CartController@update')->name('cart.update');

    Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');

    Route::post('/coupon', 'CartController@storeCoupon')->name('cart.store.coupon');
    Route::delete('/coupon', 'CartController@destroyCoupon')->name('cart.destroy.coupon');


    Route::get('/clean', function () {
        Cart::destroy();
        return redirect()->route('products.index');
    });
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/paiement', 'CheckoutController@index')->name('checkout.index');
    Route::post('/paiement', 'CheckoutController@store')->name('checkout.store');
    Route::get('/merci', 'CheckoutController@thankyou')->name('checkout.thankyou');
});


/* Checkout route */


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
