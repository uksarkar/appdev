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

Route::get('/', function(){
    return redirect()->route("login");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/products', 'ProductController');
Route::resource('/users', 'UsersController')->middleWare('auth');
Route::resource('/shops', 'ShopController')->middleWare('auth');
Route::resource('/price', 'PriceController')->middleWare('auth');

Route::get('/test', function (){
    $number = mt_rand(1,10);
    return $number;
});
Route::get('/test2', function (){
    $product = \App\Product::find(2);

    var_dump(blank(auth()->user()->hasShops($product)));
});
