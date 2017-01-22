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


//Ctegories routes
Route::get('categories/create', [
    'uses' => 'Category\CreateCategoryController@create',
    'as' => 'categories.create',
]);

Route::post('categories/create', [
    'uses' => 'Category\CreateCategoryController@store',
    'as' => 'categories.store',
]);


Route::get('roles/create', [
    'uses' => 'Role\RoleController@create',
    'as' => 'roles.create',
]);


Route::post('roles/create', [
    'uses' => 'Role\RoleController@store',
    'as' => 'roles.store',
]);

Route::get('roles/index', [
    'uses' => 'Role\RoleController@index',
    'as' => 'roles.index',
]);

