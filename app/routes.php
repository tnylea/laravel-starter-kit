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

Route::get('/', function()
{
	if(Auth::guest()){
		return View::make('auth.login');
	} else {
		return View::make('dashboard');
	}	
});

Route::get('login', function(){
	return View::make('auth.login');
});

Route::get('signup', function(){
	return View::make('auth.signup');
});

Route::post('login', 'UserController@login');

Route::post('signup', 'UserController@signup');

Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/');
});