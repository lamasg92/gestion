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
//Ctegories routes

Route::get('categories/index', [
    'uses' => 'Category\CategoryController@index',
    'as' => 'categories.index',
]);

Route::post('categories/edit', [
    'uses' => 'Category\CategoryController@edit',
    'as' => 'categories.edit',
]);

Route::get('categories/edit', [
    'uses' => 'Category\CategoryController@edit',
    'as' => 'categories.edit',
]);

Route::get('categories/create', [
    'uses' => 'Category\CreateCategoryController@create',
    'as' => 'categories.create',
]);

Route::post('categories/create', [
    'uses' => 'Category\CreateCategoryController@store',
    'as' => 'categories.store',
]);

//ROLES ROUTES

Route::resource('roles', 'Role\RoleController');
//
//Route::get('roles/edit', [
//    'uses' => 'Role\RoleController@edit',
//    'as' => 'roles.edit',
//]);

