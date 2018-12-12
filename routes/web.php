<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::apiResource('massages', 'MassageController');
    Route::apiResource('packages', 'PackageController');
});
