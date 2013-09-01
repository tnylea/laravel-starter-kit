<?php 

class UserController extends BaseController{

	public static $rules = array(
		'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    );

	public function signup(){

		$validation = Validator::make( Input::all(), static::$rules );

		if ($validation->fails()){
			echo $validation->messages();
		}

		$user_data = array('username' => Input::get('username'), 'email' => Input::get('email'), 'password' => Hash::make(Input::get('password')) ); 
	    $user = new User($user_data);
	    $user->save();

	    return Redirect::to('/')->with('success', 'Your Account has been Successfully Created! Please Login Below.');

	}

	public function login(){

	    // get login POST data
	    $userdata = array(
	        'email' => Input::get('email'),
	        'password' => Input::get('password')
	    );

	    if ( Auth::attempt($userdata) ){

	    	return Redirect::to('/');
	    	
	    } else {
	        // auth failure! redirect to login with errors
	        return Redirect::to('login')->with('error', 'Incorrect login or password');
	    }
	    

	}

}