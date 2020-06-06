<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index(){
        $orders = Auth::user()->orders;
        // dd($orders);
        $i = 0;
        $carts = $orders->transform(function($cart, $key){
            $arr = array();
            $unserializeCart = unserialize($cart->cart);
            array_push($arr, ['cart' => $unserializeCart, 'shipping_address' => $cart->shipping_address]);
            return $arr;
        });
        // $cartsop = $orders->transform(function($cart, $key){
        //     return unserialize($cart->cart);
        // });
        // dd($carts);
        // foreach($carts as $cart){

        // }
        return view('order')->withCarts($carts);
    }
}
