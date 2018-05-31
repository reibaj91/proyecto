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


//Route::get('/', 'AlumnosController@alumno', function () {
//    return view('404');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');


Route::get('/login/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/login/{provider}/callback', 'SocialAuthController@handleProviderCallback');

\App\Http\Controllers\AlumnosController::routes();
\App\Http\Controllers\ProfesoresController::routes();
\App\Http\Controllers\ProfesoresPerfilesController::routes();
\App\Http\Controllers\SeccionesController::routes();
\App\Http\Controllers\CursosController::routes();
\App\Http\Controllers\EtapasController::routes();
\App\Http\Controllers\PerfilesController::routes();
\App\Http\Controllers\AplicacionesController::routes();
\App\Http\Controllers\AdministradorController::routes();
