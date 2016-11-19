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

Route::get('/', function()
{
	return view('welcome');
});


Route::get('actu','controller@actu');
Route::get('actu/cree','controller@new_actu');
Route::post('actu/cree','controller@add_actu');
Route::get('calendrier','controller@calendrier');
Route::get('equipe','controller@equipe');
Route::get('resultats','controller@resultats');
Route::get('information','controller@information');
Auth::routes();

Route::get('/home', 'HomeController@index');
