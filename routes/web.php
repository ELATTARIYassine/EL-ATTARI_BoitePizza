<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Auth::routes();

// Admin method to approve a comment
Route::post('/admin/comment/{comment}/approve', 'Admin\CommentCrudController@approveComment');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/menu', 'HomeController@menu')->name('menu');
Route::post('/comment', 'HomeController@comment')->name('comment');
Route::get('/product/{product}', 'HomeController@singleProduct')->name('sp');

//Methods for
//Cart
Route::get('/add-to-cart/{product}', 'CartController@getAddToCart')->name('cart');
Route::get('/view-cart', 'CartController@getCart')->name('cart-view');
Route::get('/delete-from-cart/{product}', 'CartController@deleteProductFromCart')->name('dpfc');
Route::post('/update-cart', 'CartController@updateCart')->name('update-cart');
///////////
Route::post('/checkout', 'CheckoutController@checkout')->name('cart.checkout');
Route::post('/charge', 'CheckoutController@charge')->name('cart.charge');
