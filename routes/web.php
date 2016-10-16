<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('cart', 'CartController@index')->name('cart.index');

Route::get('page/{page}', 'PageController@show')->name('page.show');

Route::group(['as' => 'service.', 'prefix' => 'service'], function ()
{
    Route::group(['prefix' => '{service}'], function ()
    {
        Route::get('', 'ServiceController@show')->name('show');

        Route::group(['as' => 'package.', 'prefix' => 'package/{package}'], function ()
        {
            Route::get('', 'ServiceController@package')->name('show');
            Route::get('order', 'ServiceController@orderPackage')->name('order');
            Route::post('order', 'ServiceController@orderPackage')->name('store');
            Route::get('price', 'ServiceController@packagePrice')->name('price');
        });

        // vps custom
        Route::group(['as' => 'custom.', 'prefix' => 'custom'], function ()
        {
            Route::get('', 'ServiceController@custom')->name('create');
            Route::post('', 'ServiceController@customStore')->name('store');

            Route::get('price', 'ServiceController@price')->name('price');
        });
    });
});