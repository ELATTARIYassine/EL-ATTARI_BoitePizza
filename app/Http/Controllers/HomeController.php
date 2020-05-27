<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Sector;
use App\Models\Comment;
use App\Models\Formula;
use App\Models\Product;
use App\Models\Supplement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
    
    public function sectors(){
        return view('sectors')->withSectors(Sector::all());
    }

    public function formulas(){
        // dd(Formula::all());
        Session::flash('formulaToast', 'Rappelez-vous que la formule est détectée lorsque vous êtes sur le point de commander!'); 
        return view('formulas')->withFormulas(Formula::all());
    }
}
