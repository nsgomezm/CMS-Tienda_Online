<?php 

use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => ['auth', 'isAdmin'] ], function () {

    Route::group(['prefix' => 'Dashboard'], function () {
        Route::view('/', 'dashboard.main')->name('dashboard');

        Route::group(['prefix' => 'Users'], function () {
            Route::get('/List', 'Dashboard\UserController@users')->name('dashboard.users');
        });

        Route::group(['prefix' => 'Products'], function () {
            Route::view('/List', 'dashboard.products.list')->name('dashboard.products');
            Route::view('/form', 'dashboard.products.form')->name('dashboard.products.form');
            // Route::post('/form', 'dashboard.products.form')->name('dashboard.products.update');
        });
        // Route::get('/products', 'Dashboard\UserController@products')->name('dashboard.products');
    });
});
