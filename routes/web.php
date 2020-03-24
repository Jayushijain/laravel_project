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

	//Categories
	Route::resource('/admin/categories','Admin\CategoriesController');

	//Amenities
	Route::resource('/admin/amenities','Admin\AmenitiesController');

	//Cities
	Route::resource('/admin/cities','Admin\CitiesController');

	//Packages
	Route::resource('/admin/packages','Admin\PackagesController');

	//Offline Payment
	Route::resource('/admin/offline_payment','Admin\OfflinePayController');

	//reports
	Route::resource('/admin/reports','Admin\ReportsController');

	//Route::get('/reports/date/{range}',['as' => 'reports.daterange', 'uses' => 'Admin\ReportsController@filter_by_date_range']);
	
	//Ratings
	Route::resource('/admin/rating_wise_quality','Admin\ReviewWiseQualitiesController');

	//Users
	Route::resource('/admin/users','Admin\UsersController');

	Route::post('/admin/users/get_emails','Admin\UsersController@get_emails');

	//System Settings
	Route::resource('/admin/system_settings','Admin\SystemSettingsController');

	Route::post('/admin/update_system',['as' => 'system.update', 'uses' => 'Admin\SystemSettingsController@update_settings']);

	//Frontend Settings
	Route::resource('/admin/frontend_settings','Admin\FrontendSettingsController');

	Route::post('/admin/update_frontend',['as' => 'frontend.update', 'uses' => 'Admin\FrontendSettingsController@update_settings']);

	Route::post('/admin/update/image/{image_type}',['as' => 'image.update', 'uses' => 'Admin\FrontendSettingsController@update_image']);

	//Payment Settings
	Route::resource('/admin/payment_settings','Admin\PaymentSettingsController');

	Route::post('/admin/update_currency',['as' => 'currency.update', 'uses' => 'Admin\PaymentSettingsController@update_system_currency']);

	Route::post('/admin/update_paypal',['as' => 'paypal.update', 'uses' => 'Admin\PaymentSettingsController@update_paypal']);

	Route::post('/admin/update_stripe',['as' => 'stripe.update', 'uses' => 'Admin\PaymentSettingsController@update_stripe']);

	//Smtp settings
	Route::resource('/admin/smtp_settings','Admin\SmtpSettingsController');

	Route::post('/admin/update_smtp',['as' => 'smtp.update', 'uses' => 'Admin\SmtpSettingsController@update_settings']);

	//Booking Requests
	Route::get('/admin/booking_request/{type}',['as' => 'booking.request', 'uses' => 'Admin\BookingController@index']);

	Route::get('/admin/update/booking_request/{type}/{id}',['as' => 'status.update', 'uses' => 'Admin\BookingController@update_status']);

	Route::delete('/admin/bookings/{id}', 'Admin\BookingController@destroy');

	//Listings
	Route::resource('/admin/listings','Admin\ListingsController');

	Route::post('admin/listings/filter_table',['as' => 'listings.filter', 'uses' => 'Admin\ListingsController@filter_listing_table']);

	Route::patch('admin/listings/update_column/{id}','Admin\ListingsController@update_column');

	Route::post('admin/listings/get_cities',['as' => 'cities.list', 'uses' => 'Admin\ListingsController@get_cities']);

	//Claimed Listings
	Route::resource('/admin/claimed_listings','Admin\ClaimedListingsController');

	Route::get('/admin/claimed_listings/update/{id}',['as'=> 'listing_status.update','uses' => 'Admin\ClaimedListingsController@update_status']);

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

