<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::apiResource('massage', 'MassageController');
    Route::apiResource('package', 'PackageController');
});
