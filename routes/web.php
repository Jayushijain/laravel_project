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

<<<<<<< HEAD

Route::resource('/admin','Admin\AdminController');

Route::resource('/admin/categories','Admin\categoriesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

=======
Route::resource('/admin','AdminController');
>>>>>>> parent of 048461a... dashboard
