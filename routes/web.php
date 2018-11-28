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
Route::resource('users','UserController');

Route::resource('accessibles','AccessibleController');

Route::resource('locals','LocalController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');

Route::get('/accessibles', 'AccessibleController@index');
Route::get('/accessibles/create', 'AccessibleController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mapa', 'HomeController@rotas')->name('mapa');

Route::get('/mapa', 'LocalController@rotas');

// Route::get('/images/')->('foto');
