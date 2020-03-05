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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', 'HomeController@index')->name('home');

// Route::get('/event',  'EventController@index')->name('event');


Route::group(['middleware' => 'role:superadministrator|administrator|editor|author|contributor'], function () {
	Route::group(['prefix' => 'manage', 'as' => 'manage.'], function () {
		Route::get('/', 'ManageController@index');
		Route::get('/dashboard', 'ManageController@dashboard')->name('dashboard');
		Route::resource('/users', 'UserController');
		Route::resource('/permissions', 'PermissionController');
		Route::resource('/posts', 'PostController');
		Route::resource('/categories', 'CategoryController');
	});
});

// Route::group(['prefix' => 'content', 'as' => 'content.'], function () {
// 	Route::get('/', 'ManageController@index');
// 	Route::get('/dashboard', 'ManageController@dashboard')->name('dashboard');
// 	Route::resource('/users', 'UserController');
// 	Route::resource('/permissions', 'PermissionController');
// 	Route::resource('/posts', 'PostController');
// });
