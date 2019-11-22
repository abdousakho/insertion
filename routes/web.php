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
Route::get('/administrateurs/list', 'AdministrateursController@list')->name('administrateurs.list');
Route::get('/gestionnaires/list', 'GestionnairesController@list')->name('gestionnaires.list');
Route::resource('/administrateurs', 'AdministrateursController');
Route::resource('/gestionnaires', 'GestionnairesController');

/* Route pour la creation d'un administrateur */
Route::get('/administrateurs/create', function () {
    return view('administrateurs.create');
}); 