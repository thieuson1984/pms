<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	/**
    * The layout that should be used for responses.
    */
    protected $layout = 'layouts.master';

	public function showDash()
	{
		return View::make('admin.dash')->with('title','Admin Dashboard')
										->with('pageheader','Admin Dashboard');
		
	}

}