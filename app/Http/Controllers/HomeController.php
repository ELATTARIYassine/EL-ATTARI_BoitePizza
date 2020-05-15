<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Formula;
use App\Models\Product;
use App\Models\Supplement;
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
        // dd($request->session()->get('cart'));
        // dd($request->all());
        // $request->getSession()->put('cart', null);
        $newTotalQty = 0;
        $newTotalPrice = 0;
        $oldCart = $request->session()->get('cart');
        $items = $oldCart->items;
        // dd($items[$request->product_id]['qty']);
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
    
    public function checkout(Request $request)
    {
        dd($request->all());
    }
}
