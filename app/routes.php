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

Route::group(array('before' => 'connected'), function()
{

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

	// RESET PASSWORD Routes
	Route::get('password/reset', array(
	  'uses' => 'PasswordController@remind',
	  'as' => 'password.remind'
	));

	Route::post('password/reset', array(
	  'uses' => 'PasswordController@request',
	  'as' => 'password.request'
	));

	Route::get('password/reset/{token}', array(
	  'uses' => 'PasswordController@reset',
	  'as' => 'password.reset'
	));

	Route::post('password/reset/{token}', array(
	  'uses' => 'PasswordController@update',
	  'as' => 'password.update'
	));

	Route::get('testmail', function(){
		$user = array(
		  'email'=>'tnylea@gmail.com',
		  'name'=>'Bleh'
		);
		 
		// the data that will be passed into the mail view blade template
		$data = array(
		  'token'=>'adsfasdf',
		);
		 
		// use Mail::send function to send email passing the data and using the $user variable in the closure
		Mail::send('emails.auth.reminder', $data, function($message) use ($user)
		{
		  $message->from('tony@devdojo.com', 'Site Admin');
		  $message->to($user['email'], $user['name'])->subject('Welcome to My Laravel app!');
		});
	});

});

Route::get('install', 'InstallController@index');
Route::post('install_db', 'InstallController@install_db');
Route::post('install_data', 'InstallController@install_data');

/********** IMPORTANT REMEMBER TO COMMENT THIS OUT **********/

Route::get('reset', function(){
	Schema::dropIfExists('users');
	Schema::dropIfExists('password_reminders');
	return Redirect::to('/');
});

/********** ^^ IMPORTANT REMEMBER TO COMMENT THIS OUT ^^ **********/
