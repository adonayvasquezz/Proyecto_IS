<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ventas', 'HomeController@ventas');
Route::get('/viajes', 'HomeController@viajes');
//Route::get('/viajes#listViajes', 'ViajesController@listViajes');
//Route::get('/viajes#formViajes', 'ViajesController@edit');
Route::get('/viajes#formViajes', 'ViajesController@create');
Route::get('/rutas', 'HomeController@rutas');
Route::get('/empleados', 'HomeController@empleados');
Route::post('/empleados', 'HomeController@empleados_buscar');
Route::post('/empleados-registro', 'HomeController@empleados_registro');
Route::post('/empleados-registrado', 'HomeController@empleados_registrado');


Route::view('/index', 'index')->name('index');
Route::post('index', 'MailController@store');

//Route::get('/perfil', 'HomeController@perfil')->name('perfil');

Route::resource('/perfil', 'PersonaController');
<<<<<<< HEAD
//Route::resource('/LugarRutas', 'LugarRutasController');
route::get('/create','LugarRutasController@show');
route::post('/create','LugarRutasController@create');
route::get('/rutas','lugarRutasController@read');
//Route::delete('/lugarRutas', 'lugarRutasController@destroy');
=======
//Route::resource('/viajes', 'ViajesController');

>>>>>>> bd0f541c6bff2d4bdf4df6723248ca647435ba38

//Route::delete('rutas', 'lugarRutasController@destroy');
Route::resource('/LugarRutas', 'LugarRutasController');

Route::delete('/LugarRutas/{LugarRuta}', 'LugarRutasController@destroy')
    ->name('LugarRutas.destroy');