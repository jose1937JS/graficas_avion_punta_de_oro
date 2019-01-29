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

Route::view('/', 'auth.login');

Route::group(['middleware' => ['auth']], function() {

	Route::resource('ventas', 'SaleController');
	Route::resource('productos', 'ProductController');
	Route::resource('proveedores', 'SupplierController');

});



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();