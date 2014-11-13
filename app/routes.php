<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/** RESTful Controllers **/
Route::controller( 'admin', 'AdminController' );
//Route::resource('admin', 'AdminController');
Route::get('/', function()
{
	return View::make('hello');
});
Route::group(array('prefix' => 'admin'), function()
{
	// main page for the admin section (app/views/admin/dash.blade.php)

	Route::get('/', 'AdminController@showDash');
});

Route::resource('users', 'UsersController');