<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 05/01/2017
 * Time: 11:31 PM
 */


/**
 * Define routes taht requires authentication
 *
 */

//clients routes

Route::resource('clients', 'Client\ClientController');

//Invoice routes
Route::get('invoice/index', [
    'uses' => 'Invoice\InvoiceController@index',
    'as' => 'invoice.index',
]);

Route::get('invoice/create', [
    'uses' => 'Invoice\InvoiceController@create',
    'as' => 'invoice.create',
]);
