<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('order', 'orders');
    }

    // protected function setupListOperation()
    // {
    //     $orders = [
    //         'name' => 'cart', // the db column name (attribute name)
    //         'label' => "Options", // the human-readable label for it
    //         'type' => 'model_function',
    //         'function_name' => 'getValue',
    //     ];
    //     $this->crud->addColumn($orders);
    // }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(OrderRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function index(){
        $data = Order::all();
        // dd($data);
        $orders = array();
        foreach($data as $key => $order){
            array_push($orders,
                 array("client" => $order->client->lastName, 
                       "cart" => unserialize($order['cart']),
                       "id" => $order['id'])
            );
        }

        // dd($orders);
        // $carts = $orders->transform(function($cart, $key){
        //     return unserialize($cart->cart);
        // });
        
        return view('backpack_view_custom/list_orders')->withOrders($orders);
    }

    public function destroy($id)    
    {
        DB::delete('delete from orders where id = ?', [$id]);

        return redirect('/admin/order')->with('delete', "la commande est supprimée avec succès");
    }

    public function show($id)
    {
        $order = Order::find($id);
        $order['cart'] = unserialize($order['cart']);
        // dd($order);
        return view('backpack_view_custom/show_order')->withOrder($order);
    }
}
