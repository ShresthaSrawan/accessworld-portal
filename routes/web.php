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

// domain routes
Route::post('service/domain', 'DomainController@index')->name('service.domain.index');

Route::get('about', 'AboutPageController@index')->name('about.index');

Route::get('cart', 'CartController@index')->name('cart.index');

Route::get('service', 'ServicePageController@index')->name('service.index');