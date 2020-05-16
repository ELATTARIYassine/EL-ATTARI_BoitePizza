<?php

namespace App\Http\Controllers;
use App\Models\Supplement;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function getAddToCart(Request $request, Product $product){
        
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        $cart = new Cart($oldCart);
        
        $cart->add($product, $product->id);
        
        $request->session()->put('cart', $cart);
        
        return back()->with('success','Item created successfully!');
    }

    public function getCart(Request $request){
        
        if(!$request->session()->has('cart')){
            return view('view-cart');
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        return view('view-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'supplements' => Supplement::all()]);
    }
    
    public function deleteProductFromCart($id, Request $request){

        $decision = sizeof($request->session()->get('cart')->items) == 1 ? true : false;

        $newCart = Cart::deleteItem($request, $id);
        if($decision){
           $request->session()->put('cart', null);
           return redirect()->route('cart-view');
        }
        $request->session()->put('cart', $newCart);

        return redirect()->route('cart-view');
    }

    public function updateCart(Request $request){
        $newTotalQty = 0;
        $newTotalPrice = 0;
        $oldCart = $request->session()->get('cart');
        $items = $oldCart->items;
        $items[$request->product_id]['qty'] = $request->qtyUpdate;
        $items[$request->product_id]['price'] = $request->qtyUpdate * $items[$request->product_id]['price'];

        foreach($items as $id => $produit) {
            $newTotalQty += $produit['qty'];
            $newTotalPrice += $produit['price'];
          }
        $oldCart->totalQty = $newTotalQty;
        $oldCart->totalPrice = $newTotalPrice;
        $oldCart->items = $items;
        $newCart = new Cart($oldCart);
        $request->getSession()->put('cart', $newCart);
        return redirect()->route('cart-view');
    }
}
