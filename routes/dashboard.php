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

        Route::group(['prefix' => 'Categories'], function () {
            Route::get('/List', 'Dashboard\CategoriesController@main')->name('dashboard.categories');
            Route::get('/delete/{category?}', 'Dashboard\CategoriesController@delete')->name('dashboard.categories.delete');
            Route::post('/create/{category?}', 'Dashboard\CategoriesController@create')->name('dashboard.categories.create');
        });
        // Route::get('/products', 'Dashboard\UserController@products')->name('dashboard.products');
    });
});
