<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('/products', 'Products\ProductsController');
Route::get('/api/listProducts', function() {
//    return Datatables::eloquent(\App\Models\Products::query())->make(true);
    return Datatables::queryBuilder(
            DB::table('products')
            ->select("products.id","products.name","products.price","suppliers.name as suppliers_id")
            ->join("suppliers","suppliers.id","=","products.suppliers_id")
            )->make(true);
});
Route::get('/getSuppliers', 'Products\ProductsController@getSupplier');



Route::resource('/suppliers', 'Products\SuppliersController');
Route::get('/api/listSupplier', function() {
    return Datatables::eloquent(\App\Models\Suppliers::query())->make(true);
});
