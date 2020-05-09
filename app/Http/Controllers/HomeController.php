<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function menu()
    {   
        $pizzaProducts = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->where('categories.name', 'Pizza')
            ->get();
        $saladesProducts = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->where('categories.name', 'Salades')
            ->get();
        $boissonsProducts = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->where('categories.name', 'boissons')
            ->get();
        return view('menu', ['pizzas' => $pizzaProducts, 'salades' => $saladesProducts, 'boissons' => $boissonsProducts]);
    }
    public function singleProduct(Product $product){

        return view('productSingle', compact('product'));
    }

    public function comment(Request $request){
        $comment = new Comment();
        $comment->text = $request->message;
        $comment->client_id = Auth::user()->id;
        $comment->product_id = $request->product_id;
        $comment->save();
        return redirect()->route('sp', ['product' => $request->product_id]);
    }
    public function getAddToCart(Request $request, Product $product){
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return back()->with('success','Item created successfully!');
    }
    public function getCart(Request $request){
        // $request->session()->put('cart', null);
        if(!$request->session()->has('cart')){
            return view('view-cart');
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        return view('view-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    
    public function deleteProductFromCart($id, Request $request){
        // $request->session()->forget('cart');
        // dd('re');
        // $request->session()->put('cart', null);
        $decision = sizeof($request->session()->get('cart')->items) == 1 ? true : false;
        // if( == 0) {
        //     $request->session()->put('cart', null);
        //     return redirect()->route('cart-view');
        // }
        $cart = $request->session()->get('cart');
        // array_splice($cart->items, $id, 1);
        // dd($cart->items);
        $qty = $cart->items[$id]['qty'];
        $price = $cart->items[$id]['price'];
        $cart->totalQty -= $qty;
        $cart->totalPrice -= $price;
        unset($cart->items[$id]);
        $newCart = new Cart($cart);
        if($decision){
           $request->session()->put('cart', null);
           return redirect()->route('cart-view');
        }
        $request->session()->put('cart', $newCart);
        // $cart['items'];
        return redirect()->route('cart-view');
    }
}
