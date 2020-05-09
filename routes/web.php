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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/menu', 'HomeController@menu')->name('menu');
Route::post('/comment', 'HomeController@comment')->name('comment');
Route::get('/product/{product}', 'HomeController@singleProduct')->name('sp');
Route::post('/admin/comment/{comment}/approve', 'Admin\CommentCrudController@approveComment');
Route::get('/add-to-cart/{product}', 'HomeController@getAddToCart')->name('cart');
Route::get('/view-cart', 'HomeController@getCart')->name('cart-view');
Route::get('/delete-from-cart/{product}', 'HomeController@deleteProductFromCart')->name('dpfc');
