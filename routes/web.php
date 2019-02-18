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
Route::middleware(['auth'])->group(function () {
Route::resource('/equipamentos', 'EquipamentosController');
Route::resource('/reservas', 'ReservasController');
Route::get('/home', 'HomeController@index');
Route::get('user/password', 'UserController@password');
Route::post('user/updatepassword', 'UserController@updatePassword');

});
