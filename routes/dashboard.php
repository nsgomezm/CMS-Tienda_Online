<?php

use App\Models\Produt;
use Illuminate\Support\Facades\Auth;

Route::get('/test', function(){
    return Produt::with('category')->find(35);
});

Route::group(['middleware' => ['auth', 'isAdmin'] ], function () {

    Route::group(['prefix' => 'Dashboard'], function () {
        Route::view('/', 'dashboard.main')->name('dashboard');

        Route::group(['prefix' => 'Users'], function () {
            Route::get('/List', 'Dashboard\UserController@users')->name('dashboard.users');
        });

        Route::group(['prefix' => 'Products'], function () {
            Route::get('/List', 'Dashboard\ProdutController@index')->name('dashboard.products');
            Route::post('/create', 'Dashboard\ProdutController@create')->name('dashboard.products.create');
            Route::post('/update/{product}', 'Dashboard\ProdutController@update')->name('dashboard.products.update');
            Route::get('/delete/{product}', 'Dashboard\ProdutController@delete')->name('dashboard.products.delete');
            Route::get('/form/{product?}', 'Dashboard\ProdutController@form')->name('dashboard.products.form');
        });

        Route::group(['prefix' => 'Categories'], function () {
            Route::get('/List', 'Dashboard\CategoriesController@main')->name('dashboard.categories');
            Route::get('/delete/{category?}', 'Dashboard\CategoriesController@delete')->name('dashboard.categories.delete');
            Route::post('/store/{category?}', 'Dashboard\CategoriesController@store')->name('dashboard.categories.store');
        });
    });
});
