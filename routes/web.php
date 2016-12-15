<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index');

Route::get('/home/createCategories', 'CatalogoController@index');

Route::post('/home', 'CatalogoController@createCategory');

Route::get('home/showProducts', 'CatalogoController@showProducts');
Route::get('home/createProducts', 'CatalogoController@createProducts');
Route::post('home/createProducts', 'CatalogoController@createProductss');
