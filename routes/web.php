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

Route::resource('/restaurant/cafe-red','ListingsController',['names'=>['show'=>'listings.show']]);


Route::get('/listings_view/{param1}','ListingsController@listings_view');	

Route::resource('/categories','CategoriesController');
    
Route::resource('/pricings','PricingsController');
    
Route::get('/packages', 'PricingsController@packages');

Route::post('/booking',['as'=>'booking','uses'=>'BookingController@store']);


Auth::routes();

Route::middleware(['logincheck'])->group(function () {

	Route::middleware(['role:Admin'])->group(function () {
		
		Route::get('/admin','Admin\AdminController@index');

		//Categories
		Route::resource('/admin/categories','Admin\CategoriesController');

		//Amenities
		Route::resource('/admin/amenities','Admin\AmenitiesController');

		//Cities
		Route::resource('/admin/cities','Admin\CitiesController');

		//Packages
		Route::resource('/admin/packages','Admin\PackagesController');

		Route::get('admin/package_invoice/{package_id}','Admin\PackagesController@package_invoice');

		//Offline Payment
		Route::resource('/admin/offline_payment','Admin\OfflinePayController');

		//reports
		Route::resource('/admin/reports','Admin\ReportsController');

		Route::post('/reports/date',['as' => 'reports.daterange', 'uses' => 'Admin\ReportsController@filter_by_date_range']);
		
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

		Route::post('/get_cities','Admin\ListingsController@get_cities');

		Route::get('/get_listing_wise','Admin\ListingsController@store_listing_wise');

		//Claimed Listings
		Route::resource('/admin/claimed_listings','Admin\ClaimedListingsController');

		Route::get('/admin/claimed_listings/update/{id}',['as'=> 'claimed_listing.status.update','uses' => 'Admin\ClaimedListingsController@update_status']);

		//Reported Listings.
		Route::resource('/admin/reported_listings','Admin\ReportedListingsController');

		Route::patch('/admin/reported_listing/{id}','Admin\ReportedListingsController@update_status');

		Route::get('/admin/{edit_type}/{id}','Admin\AdminController@edit');

		Route::patch('/admin/update/{edit_type}/{id}','Admin\AdminController@update');

		});

		Route::middleware(['role:User'])->group(function () {

			Route::resource('/user/user_listings', 'User\ListingsController');

			Route::patch('user/user_listings/update_column/{id}','User\ListingsController@update_column');

				//Booking Requests
			Route::get('/user/user_booking_request/{type}',['as' => 'user.booking.request', 'uses' => 'User\BookingController@index']);

			Route::get('/user/update/user_booking_request/{type}/{id}',['as' => 'user_booking.status.update', 'uses' => 'User\BookingController@update_status']);

			Route::delete('/user/user_bookings/{id}', 'User\BookingController@destroy');

			Route::resource('/user/user_packages', 'User\PackagesController');

			Route::get('user/stripe_checkout/{package_id}','User\PackagesController@stripe_checkout');

			Route::get('user/paypal_checkout/{package_id}','User\PackagesController@paypal_checkout');

			Route::get('/user/purchase_history', ['as' => 'user.purchase_history','uses' => 'User\PackagesController@history']);

			Route::get('/user/wishlist', 'User\WishListsController@index');

			Route::resource('/user','User\UserController');
		});

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
