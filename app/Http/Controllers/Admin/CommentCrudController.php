<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Comment');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/comment');
        $this->crud->setEntityNameStrings('comment', 'comments');
    }

    protected function setupListOperation()
    {
        $this->crud->addButtonFromModelFunction('line', 'open_google', 'openGoogle', 'beginning');
        $f1 = ['name' => 'text', 'label' => 'Commentaire', 'type' => 'Text'];
        $f2 = ['name' => 'product.name', 'label' => "Produit", 'type' => 'Text'];
        $f3 = ['name' => 'client.lastName', 'label' => "Client", 'type' => 'Text'];
        $f4 = ['name' => 'created_at', 'label' => "Date du commentaire", 'type' => 'date'];
        $f5 = ['name' => 'is_approved', 'label' => "Approuvée", 'type' => 'boolean'];
        $this->crud->removeButton("create");
        $this->crud->removeButton("update");
        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5]);

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CommentRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $f1 = ['name' => 'text', 'label' => 'Commentaire', 'type' => 'Text'];
        $f2 = ['name' => 'product.name', 'label' => "Porduit", 'type' => 'Text'];
        $f3 = ['name' => 'client.lastName', 'label' => "Client", 'type' => 'Text'];
        $f4 = ['name' => 'created_at', 'label' => "Date du commentaire", 'type' => 'date'];
        $this->crud->addColumns([$f1, $f2, $f3, $f4]);

    }
    public function approveComment(Comment $comment){
        $comment->is_approved = true;
        $comment->save();
        return redirect('/admin/comment/');
    }
}
