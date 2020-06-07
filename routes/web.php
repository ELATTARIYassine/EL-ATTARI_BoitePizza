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
Route::get('/logout', 'HomeController@logout')->name('user.logout');
Route::get('/menu', 'HomeController@menu')->name('menu');
Route::post('/comment', 'HomeController@comment')->name('comment');
Route::get('/product/{product}', 'HomeController@singleProduct')->name('sp');
Route::get('/formulas', 'HomeController@formulas')->name('formulas');
Route::get('/sectors', 'HomeController@sectors')->name('sectors');

//Methods for
//Cart
Route::get('/add-to-cart/{product}', 'CartController@getAddToCart')->name('cart');
Route::get('/view-cart', 'CartController@getCart')->name('cart-view');
Route::get('/delete-from-cart/{product}', 'CartController@deleteProductFromCart')->name('dpfc');
Route::post('/update-cart', 'CartController@updateCart')->name('update-cart');

///////////Checkout & charges
///////////
Route::post('/checkout', 'CheckoutController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/charge', 'CheckoutController@charge')->name('cart.charge');

///////////Orders
///////////
Route::get('/orders', 'OrdersController@index')->name('order.index');

///////////Orders
///////////
Route::get('/dashboard-bar-chart', 'DashboardController@barChart')->name('dashboard.barChart');
Route::get('/dashboard-pie-chart', 'DashboardController@pieChart')->name('dashboard.pieChart');
Route::get('/ok', 'DashboardController@ok');


