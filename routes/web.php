<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');

// });
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/','WelcomeController');

Route::resource('/listings','ListingsController');

Route::resource('/restaurant/cafe-red','listingsController',['names'=>['show'=>'listings.show']]);
Route::resource('/restaurant/cafe-red','listingsController',['names'=>['show'=>'listings.show']]);

Route::resource('/categories','CategoriesController');
    
Route::resource('/pricings','PricingsController');
    
Route::get('/packages', 'PricingsController@packages');

//check admin
Route::group(['middleware' => 'logincheck'], function () {

    
    Route::get('/admin','Admin\AdminController@index');
    
    Route::resource('/admin/categories','Admin\CategoriesController');
    
    Route::resource('/admin/amenities','Admin\AmenitiesController');
    
    Route::resource('/admin/users','Admin\UsersController');
});

//other page
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/terms_and_conditions', function () {
    return view('frontend.terms_and_conditions');
});
Route::get('/privacy_policy', function () {
    return view('frontend.privacy_policy');
});
Route::get('/faq', function () {
    return view('frontend.faq');
});
//end

//logout
Route::get('/logout', 'Auth\LoginController@logout');

