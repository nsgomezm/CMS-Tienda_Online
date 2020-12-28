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

Route::get('/logout', 'ConnectController@logout')->name('logout');

Route::group(['middleware' => 'guest'], function () {

    Route::view('/login', 'connect.login')->name('login');
    Route::post('/login', 'ConnectController@login')->name('login');
    
    Route::view('/register', 'connect.register')->name('register');
    Route::post('/register', 'ConnectController@register')->name('register');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});