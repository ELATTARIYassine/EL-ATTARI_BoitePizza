<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormulaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormulaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormulaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formula');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formula');
        $this->crud->setEntityNameStrings('formula', 'formulas');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '80px'
        ]);
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FormulaRequest::class);
        $this->crud->addField([
            'name' => 'name',
            'label' => 'Nom',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea'
        ]);
        $this->crud->addField([
            'name' => 'price',
            'label' => 'Prix',
            'type' => 'number',
            'suffix' => '£',
        ]);
        $this->crud->addField([
            'label' => "Image du formule",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1
            ]);
    }

    protected function setupUpdateOperation()
    {
        $this->crud->addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '80px'
        ]);
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Nom',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea'
        ]);
        $this->crud->addColumn([
            'name' => 'price',
            'label' => 'Prix',
            'type' => 'number',
            'suffix' => '£',
        ]);
        $this->crud->addColumn([
            'label' => "Image du formule",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'prefix' => 'storage/',
            'height' => '150px',
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1
            ]);
        $this->setupCreateOperation();
    }

}
