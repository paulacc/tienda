<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin/products', 'Admin\ProductController@index');
Route::get('admin/products/{product}', 'Admin\ProductController@show');
Route::get('admin/products/{product}/edit', 'Admin\ProductController@edit');
Route::put('admin/products/{product}', 'Admin\ProductController@update');
Route::delete('admin/products/{product}', 'Admin\ProductController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
