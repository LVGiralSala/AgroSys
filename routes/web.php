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

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
if ($options['register'] ?? true) {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
}


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index2', 'indexController@index')->name('index2');


//Persona Natural
Route::resource('persona_natural','PersonaNaturalController');
// Route::get('persona_natural','PersonaNaturalController@index')->name('pn_index');
// Route::get('persona_natural/create','PersonaNaturalController@create')->name('pn_create');
// Route::post('persona_natural','PersonaNaturalController@store')->name('pn_store');
// Route::get('persona_natural/{id}','PersonaNaturalController@edit')->name('pn_edit');
// Route::put('persona_natural','PersonaNaturalController@update')->name('pn_update');
// Route::delete('persona_natural','PersonaNaturalController@destroy')->name('pn_destroy');

//Persona Juridica
Route::resource('persona_juridica','PersonaJuridicaController');
// Route::get('persona_juridica','PersonaJuridicaController@index')->name('pj_index');
// Route::get('persona_juridica/create','PersonaJuridicaController@create')->name('pj_create');
// Route::post('persona_juridica','PersonaJuridicaController@store')->name('pj_store');
// Route::get('persona_juridica/{id}','PersonaJuridicaController@edit')->name('pj_edit');
// Route::put('persona_juridica','PersonaJuridicaController@update')->name('pj_update');
// Route::delete('persona_juridica','PersonaJuridicaController@destroy')->name('pj_destroy');

//Producto
Route::get('producto','ProductoController@index')->name('pdto_index');
Route::get('producto/create','ProductoController@create')->name('pdto_create');
Route::post('producto','ProductoController@store')->name('pdto_store');
Route::get('producto/{id}','ProductoController@edit')->name('pdto_edit');
Route::put('producto','ProductoController@update')->name('pdto_update');
Route::delete('producto','ProductoController@destroy')->name('pdto_destroy');


// Search Routes...
Route::post('sistema/buscar/ciiu','CiiuController@search')->name('ciiu');
Route::post('sistema/buscar/ocupacion','OcupacionController@searchOcupacion')->name('ocupacion');


// Excel Routes
Route::get('pn-list-excel','ExcelController@exportExcel')->name('pn.excel');
