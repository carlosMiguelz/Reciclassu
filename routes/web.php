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

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
	Route::get('/home/edit/{id}', 'HomeController@edit')->name('edit');

	Route::get('/home/update/{id}', 'HomeController@update')->name('update');

	Route::get('/home/logout', 'HomeController@logout')->name('logout');

	Route::resource('recyclings','RecyclingController');

	//Route::resource('reciclassu', 'ReciclassuController');

	Route::post('reciclassu', 'ReciclassuController@store');

	Route::get('update', 'ReciclassuController@update');

	Route::get('reciclassu/create/{id}', 'ReciclassuController@create');

	Route::get('scheduling/{id}', 'ReciclassuController@scheduling');

	Route::get('close_scheduling/{id}', 'ReciclassuController@close');

	Route::get('aceitar/{id}', 'ReciclassuController@aceitar');

	Route::get('finalizar/{id}', 'ReciclassuController@finalizar');

	Route::get('cancelar/{id}', 'ReciclassuController@cancelar');

	Route::get('show', 'ReciclassuController@show');

	Route::get('destroy/{id}', 'ReciclassuController@destroy');

	Route::get('editar/{id}', 'ReciclassuController@edit');
	
});

Route::get('/residues', 'RecyclingController@residues_list');