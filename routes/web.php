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
Route::get('/search','SearchController@show');
Route::get('/products/json','SearchController@data');
Route::get('/','TestController\TestController@index');
Auth::routes();
Route::get('/products/{id}','ProductController@show');
Route::get('/categories/{category}','CategoryController@show');


Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');
Route::post('/order','CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){

    Route::get('/products','ProductController@index'); //listado
    Route::get('/products/create','ProductController@create'); //formulario
    Route::post('/products','ProductController@store');// registrar
    Route::get('/product/{id}/edit','ProductController@edit'); // formulario para editar
    Route::post('/product/{id}/update','ProductController@update'); // formulario para actualizar
    Route::post('/product/{id}/delete','ProductController@destroy'); // formulario para eliminar

    Route::get('/products/{id}/images','ImageController@index');  //mostrar imagenes
    Route::get('/products/{id}/images/select/{image}','ImageController@select');  //Destacar imagen
    Route::post('/products/{id}/images','ImageController@store'); // guardar imagen
    Route::delete('/products/{id}/images','ImageController@destroy'); // eliminar imagenes

    Route::get('/categories','CategoryController@index'); //listado
    Route::get('/categories/create','CategoryController@create'); //formulario
    Route::post('/categories','CategoryController@store');// registrar
    Route::get('/categories/{category}/edit','CategoryController@edit'); // formulario para editar
    Route::post('/categories/{category}/update','CategoryController@update'); // formulario para actualizar
    Route::post('/categories/{Category}/delete','CategoryController@destroy'); // formulario para eliminar

});
Route::get('/home', 'HomeController@index')->name('home');

