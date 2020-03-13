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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/admin','Admin\AdminController@index');

Route::resource('/admin/categories','Admin\CategoriesController');

Route::resource('/admin/amenities','Admin\AmenitiesController');

Route::resource('/admin/cities','Admin\CitiesController');

Route::resource('/admin/users','Admin\UsersController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



