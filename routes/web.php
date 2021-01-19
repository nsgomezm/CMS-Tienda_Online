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

use Illuminate\Support\Facades\Hash;

Route::get('test', function () {
    $user = \App\Models\User::find(1);
    $user->password = '123456789';
    $user->save();
    return $user;    

});
Route::group(['middleware' => 'guest'], function () {
    
    Route::view('/login', 'connect.login')->name('login');
    Route::post('/login', 'ConnectController@login')->name('login');
    
    Route::view('/register', 'connect.register')->name('register');
    Route::post('/register', 'ConnectController@register')->name('register');
    
    Route::view('/recover', 'connect\recover')->name('recover');
    Route::post('/recover', 'ConnectController@recover')->name('recover');
    Route::view('/reset', 'connect.reset')->name('reset');
    Route::get('/restore/{user}', 'ConnectController@restore')->name('restore');

    
    
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'ConnectController@logout')->name('logout');
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});