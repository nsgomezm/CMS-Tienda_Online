<?php 

use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => ['auth', 'isAdmin'] ], function () {

    Route::view('/dashboard', 'dashboard.main')->name('dashboard');
});
