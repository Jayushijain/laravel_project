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

Route::get('/home', 'HomeController@index');

Route::resource('/','WelcomeController');

Route::resource('/listings','ListingsController');

Route::get('/claimstore', 'ListingsController@claim');

Route::get('/review', 'ReviewsController@store');


Route::get('/search/{searchstring?}/{id?}','ListingsController@search');

// Route::resource('/{category}/{listing_name}/{id?}','ListingsController',['names'=>['show'=>'listings.show']]);
Route::resource('/{category}/{listingname}/','ListingsController',['names'=>['show'=>'listings.show']]);


Route::resource('/restaurant/cafe-red','ListingsController',['names'=>['show'=>'listings.show']]);

Route::resource('/beauty/jawed-habib','ListingsController',['names'=>['show'=>'listings.show']]);

Route::resource('/hotel/hotel-taj','ListingsController',['names'=>['show'=>'listings.show']]);

Route::resource('/categories','CategoriesController');
    
Route::resource('/pricings','PricingsController');
    
Route::get('/packages', 'PricingsController@packages');

Auth::routes();

//check admin
Route::group(['middleware' => 'logincheck'], function () {

Route::get('/admin','Admin\AdminController@index');

Route::resource('/admin/categories','Admin\CategoriesController');

Route::resource('/admin/amenities','Admin\AmenitiesController');

Route::resource('/admin/cities','Admin\CitiesController');

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

