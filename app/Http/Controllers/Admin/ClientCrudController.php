<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Str;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('client', 'clients');
    }

    protected function setupListOperation()
    {
        // $this->crud->setFromDb();
        $f1 = [
            'name' => 'lastName',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f2 = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'adresse',
        ];
        $f3 = [
            'name' => 'email',
            'type' => 'text',
            'label' => 'email',
        ];
        $f4 = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'login',
        ];
        $f4 = [
            'name' => 'image',
            'type' => 'image',
            'label' => 'image',
            'height' => '150px'
        ];
        $this->crud->addColumns([$f1, $f2, $f3, $f4]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);
        $f1 = [
            'name' => 'firstName',
            'type' => 'text',
            'label' => 'Prenom'
        ];
        $f2 = [
            'name' => 'lastName',
            'type' => 'text',
            'label' => 'Nom'
        ];
        $f3 = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'Adresse'
        ];
        $f4 = [
            'name' => 'password',
            'type' => 'text',
            'label' => 'Mot de passe',
            'default'    => Str::random(8),
            'attributes' => [
                'readonly'=>'readonly'
              ]
        ];
        $f5 = [
            'name' => 'email',
            'type' => 'text',
            'label' => 'Email'
        ];
        $f6 = [
            'name' => 'login',
            'type' => 'text',
            'label' => "Nom d'utilisateur"
        ];
        $this->crud->addField([
            'label' => "Image",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1
        ])->afterField('firstName');
        $this->crud->addFields([$f1, $f2,$f5, $f6, $f3, $f4]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'name' => 'firstName',
            'type' => 'text',
            'label' => 'Prenom',
        ];
        $f2 = [
            'name' => 'lastName',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f3 = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'Adresse',
        ];
        $f4 = [
            'name' => 'email',
            'type' => 'text',
            'label' => 'email',
        ];
        $f5 = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'login',
        ];
        $f6 = [
            'name' => 'image',
            'type' => 'image',
            'label' => 'image',
            'height' => '300px'
        ];
        $f7 = [
            'name' => 'created_at',
            'type' => 'date',
            'label' => 'Date de création',
        ];
        $f8 = [
            'name' => 'updated_at',
            'type' => 'date',
            'label' => 'Dernier mise à jour',
        ];

        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }
}
