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

Route::get('/','frontoffice\PaginasController@inicio')->name('inicio');
Route::get('detalles/{id}','frontoffice\PaginasController@detalle')->name('producto.detalle');

// Route::get('/', function () {
//     return view('backoffice.productos.index');
// });

Route::resource('/productos','backoffice\ProductosController');
Route::get('/productos/{id}/inactivar','backoffice\ProductosController@inactivar')->name('productos.inactivar');
Route::get('/productos/{id}/activar','backoffice\ProductosController@activar')->name('productos.activar');
Route::get('/productos-pdf','backoffice\ProductosController@exportarPdf')->name('productos.exportarPdf');
Route::get('/productos-excel','backoffice\ProductosController@exportarExcel')->name('productos.exportarExcel');


Route::resource('/autores', 'backoffice\AutoresController');


Route::resource('/categorias', 'backoffice\CategoriasController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
