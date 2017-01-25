<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 05/01/2017
 * Time: 11:44 PM
 */

/**
 * Define routes that requires authentication and admin privileges
 *
 */

//Pattern definition for id
Route::pattern('id' , '\d+');

//Ctegories routes

Route::resource('categories', 'Category\CategoryController');


//ROLES ROUTES
// delete NOT ALLOWED ADMIN

Route::resource('roles', 'Role\RoleController');
//
//Route::get('roles/edit', [
//    'uses' => 'Role\RoleController@edit',
//    'as' => 'roles.edit',
//]);

