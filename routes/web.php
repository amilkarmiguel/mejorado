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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['
        prefix' => 'Admin',
    'namespace' => 'Admin', 'middleware' => 'auth'],
//    'middleware' => 'auth']
    function (){


        Route::resource('/role', 'RoleController')->names('role');
        Route::resource('usuarios', 'UserController');
        Route::resource('divisiones', 'DivisionController');
        Route::resource('rotulos', 'RotuloController');
        Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    });
