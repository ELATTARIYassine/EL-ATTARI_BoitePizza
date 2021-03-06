<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('category', 'CategoryCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('client', 'ClientCrudController');
    Route::crud('formula', 'FormulaCrudController');
    Route::crud('comment', 'CommentCrudController');
    Route::crud('elementsbase', 'ElementsbaseCrudController');
    Route::crud('supplement', 'SupplementCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('sector', 'SectorCrudController');
    Route::crud('area', 'AreaCrudController');
}); // this should be the absolute last line of this file