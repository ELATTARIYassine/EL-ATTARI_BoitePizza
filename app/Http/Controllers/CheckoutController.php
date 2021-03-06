<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Order;
use App\Models\Client;
use App\Models\Sector;
use App\Models\Formula;
use App\Models\Supplement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        
        $matchedFormula = null;
        $countPizza = 0;
        $countSalade = 0;
        $countBoisson = 0;
        $countOthers = 0;
        $supplementsPrice = null;
        $newTotalPrice = 0;
        $supplementsNames = array();
        $products = session()->get('cart')->items;

        foreach($products as $index => $value) {
            if ($value['item']->category->name == "Pizza") {
                $countPizza += $value['qty'];
            }
            elseif ($value['item']->category->name == "boissons") {
                $countBoisson += $value['qty'];
            }
            elseif ($value['item']->category->name == "Salades") {
                $countSalade += $value['qty'];
            }
            else{
                $countOthers += 1;
            }
        }
        if ($countPizza == 1 and $countSalade == 1 and $countBoisson == 1 and $countOthers) {
            $matchedFormula = 'Formule Solo';
        }
        elseif($countPizza == 3 and $countBoisson == 1){
            $matchedFormula = 'Formule Match';
        }
        elseif($countPizza == 2 and $countOthers == 2 and $countBoisson == 2){
            $matchedFormula = 'Formule Duo';
        }
        elseif($countPizza == 3 and $countOthers == 2 and $countBoisson == 1){
            $matchedFormula = 'Formule Familiale';
        }
        
        if($matchedFormula){
            $formula = Formula::where('name', $matchedFormula)->get();
            $newTotalPrice += $formula[0]->price;
        }
        if($newTotalPrice == 0){
            $newTotalPrice = session()->get('cart')->totalPrice;
        }
        // dd($request->supplements);
        if($request->supplements){
            foreach($request->supplements as $index => $supplement){
                $tmp = Supplement::find($supplement);
                $supplementsPrice += $tmp->price;
                array_push($supplementsNames, $tmp->name);
            }
            $newTotalPrice += $supplementsPrice;
            session()->get('cart')->supplementsNames = $supplementsNames;
            session()->get('cart')->supplementsPrice = $supplementsPrice;
        }
        // dd($newTotalPrice);
        // dd($supplementsNames);
        $request->session()->get('cart')->sector = Sector::find($request->sector);
        // $newTotalPrice += Sector::find($request->sector)->price;
        session()->put('newPrice', $newTotalPrice);


        return view('checkout', ['matchedFormula' => $matchedFormula, 'supplements' => $supplementsPrice, 'totalPrice' => $newTotalPrice, 'supplementsNames' => $supplementsNames, 'matchedFormula' => $matchedFormula, 'sector' => Sector::find($request->sector)]);
        
    }
    public function charge(Request $request){
        $charge = Stripe::charges()->create([
            'currency' => 'eur',
            'source' => $request->stripeToken,
            'amount' => session()->get('newPrice'),
            'description' => 'user id ' . Auth::id()
        ]);
        $chargeId = $charge['id'];
        if($chargeId){
            //save order in db
            //clear cart
            session()->get('cart')->purchaseDate = Carbon::now();
            Order::create([
                'cart' => serialize(session()->get('cart')),
                'client_id' => Auth::id(),
                'shipping_address' => $request->shipping_address
            ]);
            session()->forget('cart');
            return redirect()->route('menu')->with('paymentSuccess', 'Payment was done thanks');
        }else{
            return redirect()->back();
        }
    }
}
