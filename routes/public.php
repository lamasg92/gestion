<?php

/**
 * Define routes for public no authentication required
 *
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('home', [
    'uses' => 'HomeController@index',
    'as' => 'home',
]);


//clients routes

Route::resource('clients', 'Client\ClientController');

//Invoice routes
Route::get('invoice/index', [
    'uses' => 'Invoice\InvoiceController@index',
    'as' => 'invoice.index',
]);


