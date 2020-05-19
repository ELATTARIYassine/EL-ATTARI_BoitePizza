<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index(){
        $orders = Auth::user()->orders;
        $cart = $orders->transform(function($cart, $key){
            return unserialize($cart->cart);
        });
        // dd($cart);  
        return view('order')->withCarts($cart);
    }
}
