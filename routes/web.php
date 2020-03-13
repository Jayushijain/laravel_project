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

Route::resource('/','WelcomeController');

Route::group(['middleware' => 'logincheck'], function () {

    Route::resource('/admin','AdminController');
});

Route::resource('/listings','ListingsController',['names'=>[
    'index'=>'listings.index',
    'create'=>'listings.create',
    'store'=>'listings.store',
    'edit'=>'listings.edit'
]]);

Route::resource('/categories','CategoriesController',['names'=>[
    'index'=>'categories.index',
    'create'=>'categories.create',
    'store'=>'categories.store',
    'edit'=>'categories.edit'
]]);

Route::resource('/pricings','PricingsController',['names'=>[
    'index'=>'pricings.index',
    'create'=>'pricings.create',
    'store'=>'pricings.store',
    'edit'=>'pricings.edit'
]]);

Route::get('/packages', 'PricingsController@packages');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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


Route::get('/logout', 'Auth\LoginController@logout');