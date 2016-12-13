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


Route::get('actu','Controller@actu');
Route::get('actu/cree','Controller@new_actu');
Route::post('actu/cree','Controller@add_actu');
/////////////////////////////////////////////////////////
Route::get('calendrier','Controller@calendrier');
/////////////////////////////////////////////////////////
Route::get('equipe','Controller@equipe');
Route::get('equipe/Ajoutcategorie','Controller@new_categorie');
Route::post('equipe/Ajoutcategorie','Controller@add_categorie');

Route::get('equipe/Ajoutequipe','Controller@new_equipe');
Route::post('equipe/Ajoutequipe','Controller@add_equipe');

Route::get('equipe/Ajoutjoueur','Controller@new_joueur');
Route::post('equipe/Ajoutjoueur','Controller@add_joueur');
Route::get('equipe/joueur/{id}', 'Controller@show_joueur');
/////////////////////////////////////////////////////////
Route::get('resultats','Controller@resultats');
/////////////////////////////////////////////////////////
Route::get('information','Controller@information');
/////////////////////////////////////////////////////////
Auth::routes();
/////////////////////////////////////////////////////////
Route::get('/home', 'HomeController@index');
