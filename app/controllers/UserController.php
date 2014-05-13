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
			//echo $validation->messages();
			return Redirect::to('/signup')->with(array('note' => 'Sorry, there were some errors when creating your account. Please be sure your information is correct.', 'note_type' => 'error'));
		}

		$user_data = array('username' => Input::get('username'), 'email' => Input::get('email'), 'password' => Hash::make(Input::get('password')) ); 
	    $user = new User($user_data);
	    $user->save();

	    return Redirect::to('/login')->with(array('note' => 'Your Account has been Successfully Created! Please Login Below.', 'note_type' => 'success'));

	}

	public function login(){

	    // get login POST data
	    $email_login = array(
	        'email' => Input::get('email'),
	        'password' => Input::get('password')
	    );

	    $username_login = array(
	        'username' => Input::get('email'),
	        'password' => Input::get('password')
	    );

	    if ( Auth::attempt($email_login) || Auth::attempt($username_login) ){

	    	return Redirect::to('/')->with(array('note' => 'You have been successfully logged in.', 'note_type' => 'success'));
	    	
	    } else {
	        // auth failure! redirect to login with errors
	        return Redirect::to('login')->with(array('note' => 'invalid login, please try again.', 'note_type' => 'error'));
	    }
	    
	}

	

}