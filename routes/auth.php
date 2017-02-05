<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 05/01/2017
 * Time: 11:31 PM
 */
use App\Entities\Article;
use App\Entities\Client;
use App\Entities\User;



/**
 * Define routes taht requires authentication
 *
 */

//clients routes

Route::resource('clients', 'Client\ClientController');

//Invoice routes
Route::get('invoices/index', [
    'uses' => 'Invoice\InvoiceController@index',
    'as' => 'invoices.index',
]);

Route::get('invoices/create', [
    'uses' => 'Invoice\InvoiceController@create',
    'as' => 'invoices.create',
]);

Route::post('invoices/store', [
    'uses' => 'Invoice\InvoiceController@store',
    'as' => 'invoices.store',
]);


Route::get('invoices/users', function (){

    $term = Request::get('term');

    return User::findByNameorUserName($term);
});

Route::get('invoices/articles', function (){

    $term = Request::get('term');

    return Article::findByNameorDescription($term);
});

Route::get('invoices/clients', function (){

    $term = Request::get('term');

    return Client::findByNombreoEmail($term);
});
