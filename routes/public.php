<?php

/**
 * Define routes for public no authentication required
 *
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');



