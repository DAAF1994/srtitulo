<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

Route::get('/', function () {
    return view('welcome');
});
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
//Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/nuevopost', 'JuegosController@index')->name('nuevopost');
Route::post('/agregar','JuegosController@addGame');
//Route::post('/comentar','PostController@postComentar');
//Route::get('/post/{id}','PostController@getView');
Route::get('/usuario','UsuariosController@index');
Route::post('/buscarjuego', 'JuegosController@buscarjuego');
Route::post('verjuego', 'JuegosController@getgame');
Route::get('/game/{id}', 'JuegosController@getGame');
Route::post('/valorarjuego', 'JuegosController@valorar');
Route::get('/prueba/{id}', 'JuegosController@recomendar_juegos');
Route::get('/obtenerperfil', 'JuegosController@obtener_perfil');
Route::get('auth/logout', 'Auth\AuthController@logout');


//Route::post('/{$gamename}', 'JuegosController@postgame');


