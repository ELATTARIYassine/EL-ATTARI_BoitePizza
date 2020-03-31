<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Product;
/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->removeColumns(['start_date', 'end_date']);
        // $this->crud->removeColumn('start_date');
        // $this->crud->setFromDb();
        $f1 = [
            'name' => 'name',
            'type' => 'text',
            'label' => 'Name',
        ];
        $f2 = [
            'name' => 'price',
            'type' => 'text',
            'label' => 'Price',
        ];
        $f3 = [
            'name' => 'in_promo',
            'type' => 'boolean',
            'label' => 'In promo',
        ];
        $f4 = [
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
        ];
        $this->crud->addColumns([$f1, $f2, $f3, $f4]);
    }

    protected function setupCreateOperation()
    {
        $defArray = [  // Select
            'label' => "Category",
            'type' => 'select',
            'name' => 'category_id', // the db column for the foreign key
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
         
            // optional
            'model' => "App\Models\Category",
            'options'   => (function ($query) {
                 return $query->orderBy('name', 'ASC')->get();
             }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
         ];
         $this->crud->addField([
            'label' => "Profile Image",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->setValidation(ProductRequest::class);
        $this->crud->addField($defArray)->afterField('remise');
        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
