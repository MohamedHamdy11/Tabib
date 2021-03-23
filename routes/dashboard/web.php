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
                 // admin routes
                Route::resource('admins', 'AdminController')->except(['show']);
               
                 // country route
                Route::resource('countries', 'CountriesController')->except(['show']);


                
                Route::get('/', function () {
                    return view('admin.home');
                })->name('home');



                // Route::get('index', function () {
                //     return view('admin.index');
                // })->name('index');


            }); //end of middleware

        }); //end of prefix dashboard


    }); // end of mcomere

