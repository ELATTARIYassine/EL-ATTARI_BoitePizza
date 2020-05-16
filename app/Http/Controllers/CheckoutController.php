<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {

        dd(session()->get('cart'));

        // if(sizeof($request->supplements) == 0)
        // {
        //     return view('checkout');
        // }
        // dd($request->supplements);
    }
}
