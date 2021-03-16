<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
     function () {

        //Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin'], function() {

            Config::set('auth.defines', 'admin');
            Route::get('login', 'AdminAuth@login');
            Route::post('login', 'AdminAuth@dologin');

            Route::post('logout','AdminAuth@logout')->name('logout');


            Route::group(['middleware' => 'admin:admin'], function () {
                Route::get('/', function () {
                    return view('admin.home');
                });

                Route::resource('admin', 'AdminController');
                Route::delete('admin/destroy/all', 'AdminController@multi_delete');

                Route::get('index', function () {
                    return view('admin.index');
                })->name('welcome');


            }); //end of middleware

        }); //end of prefix dashboard


    }); // end of mcomere

