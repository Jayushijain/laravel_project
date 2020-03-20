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

Route::post('/review',['as'=>'review','uses'=>'ListingsController@review']);

Route::post('/claim',['as'=>'claim','uses'=>'ListingsController@claim']);

Route::post('/report',['as'=>'report','uses'=>'ListingsController@report']);

Route::post('/search',['as'=>'search','uses'=>'ListingsController@search']);

Route::resource('/description','ListingsController',['names'=>['show'=>'listings.show']]);

Route::get('/listingsview/{id}','ListingsController@listingsview');

Route::get('/listings_view/{param1}','ListingsController@listings_view');	

Route::resource('/categories','CategoriesController');
    
Route::resource('/pricings','PricingsController');
    
Route::get('/packages', 'PricingsController@packages');

Route::post('/booking',['as'=>'booking','uses'=>'BookingController@store']);


Auth::routes();

//check admin
Route::group(['middleware' => 'logincheck'], function () {

	Route::get('/admin','Admin\AdminController@index');

	Route::resource('/admin/categories','Admin\CategoriesController');

	Route::resource('/admin/amenities','Admin\AmenitiesController');

	Route::resource('/admin/cities','Admin\CitiesController');

	Route::resource('/admin/packages','Admin\PackagesController');

	Route::resource('/admin/offline_payment','Admin\OfflinePayController');

	Route::resource('/admin/reports','Admin\ReportsController');

	Route::get('/reports/date/{range}',['as' => 'reports.daterange', 'uses' => 'Admin\ReportsController@filter_by_date_range']);

	Route::resource('/admin/rating_wise_quality','Admin\ReviewWiseQualitiesController');

	Route::resource('/admin/users','Admin\UsersController');

	Route::post('/admin/users/get_emails','Admin\UsersController@get_emails');

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
