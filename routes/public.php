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

//rotes for search autocomplete

Route::get('invoice/articles', [
    'uses' => 'Invoice\InvoiceController@articles',
    'as' => 'invoice.articles',
]);

Route::get('invoice/users', [
    'uses' => 'Invoice\InvoiceController@users',
    'as' => 'invoice.users',
]);


