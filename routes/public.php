<?php

/**
 * Define routes for public no authentication required
 *
 */

Route::get('/', function () {
    return view('app');
});

Auth::routes();


Route::get('home', [
    'uses' => 'HomeController@index',
    'as' => 'home',
]);
