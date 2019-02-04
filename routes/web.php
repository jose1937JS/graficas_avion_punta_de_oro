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

Route::view('/', 'user.dashboard');

Route::group(['middleware' => 'auth'], function() {

	Route::get('ventas/reporte', 'SaleController@reportePdf')->name('ventas.pdf');
	Route::resource('ventas', 'SaleController');


	Route::get('productos/reporte', 'ProductController@reportePdf')->name('productos.pdf');
	Route::resource('productos', 'ProductController');

	Route::get('proveedores/reporte', 'SupplierController@reportePdf')->name('proveedores.pdf');
	Route::resource('proveedores', 'SupplierController');


	Route::resource('categorias', 'CategoryController');

});



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();