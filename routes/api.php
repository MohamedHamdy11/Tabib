<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/



Route::group(["prefix" => "v1", "namespace" => "API"], function($router) {
    //below mention routes are public , user can access those without any restriction
    Route::group(["prefix" => "auth"], function() {
        // create new user
        Route::post("register", "AuthUserController@register");

        // login user
        Route::post("login", "AuthUserController@login");

        // refresh JWT token
        Route::get("refresh", "AuthUserController@refresh");

        Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify'); // Make sure to keep this as your route name

        Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');

        // forgot password user
        Route::post('password/email', 'ForgotPasswordController@forgot');
        Route::post('password/reset', 'ForgotPasswordController@reset');

        // join us
        Route::post('join_us', 'VendorController@join_us');
        Route::post("Contact_Us", "AuthUserController@Contact_Us");   // plas. add api Contact_Us in post man

    }); // end prefix auth

    //below mention route are available only for the authenticated users
    Route::group(["middleware" => "auth:api", "prefix" => "auth"], function() {
        // logout user from application
        Route::post("logout", "AuthUserController@logout");

        //get user info and update User Profile && change Password
        Route::get("userProfile", "AuthUserController@userProfile");
        Route::post("userProfile/adit", "AuthUserController@updateUserProfile");
        Route::post("change_password", "AuthUserController@changePassword");

        // Favorite list
        Route::post("Favorite/add", "FavoriteController@addWishlist");
        Route::post("Favorite/delete", "FavoriteController@deleteWishlist");
        Route::get("Favorite/list", "FavoriteController@getWishlist");

        // vendors
        Route::get("VendorsList", "VendorController@getVendorsSpecialty");
        Route::get("VendorsMap", "VendorController@getVendorByMap");
        Route::get("Vendor", "VendorController@getVendor");
        Route::get("VendorsByName", "VendorController@getVendoByName");

        // Notifications Medical InformationController user
        Route::get('notifications/get', 'MedicalInformationController@getNotifications');
        Route::get('notifications/read', 'MedicalInformationController@markAsRead');
       

    }); // end middleware api

    // get all categories
    Route::get('categories','CategoryController@categories');

    // get all specialty by category_id
    Route::get('Specialty','CategoryController@Specialty');

    // get all cities (Governorate)
    Route::get('allGovernorate', 'CityController@allCity');

    // Medical Information
    Route::get('MedicalInformations','MedicalInformationController@getAllMedicalInformation');
    Route::get('oneInformation','MedicalInformationController@oneInformationById');

    /*
    // get Specialty Doctor
    Route::get('Specialty/Doctor','CategoryController@SpecialtyDoctor');
    // get Specialty Clinic
    Route::get('Specialty/Clinic','CategoryController@SpecialtyClinic');
    // get Specialty Hospital Medical Centers
    Route::get('Specialty/HospitalMedicalCenters','CategoryController@SpecialtyHospitalMedicalCenters');
    // get Specialty Medical Services
    Route::get('Specialty/MedicalServices','CategoryController@SpecialtyMedicalServices');
    // get Specialty Pharmacies Medical Labs
    Route::get('Specialty/PharmaciesMedicalLabs','CategoryController@SpecialtyPharmaciesMedicalLabs');
    */


}); // end prefix v1


