<?php

class InstallController extends BaseController {

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

	public function index()
	{
		try{

			DB::connection();
			return Redirect::to('/');

		}catch(Exception $e){

				return View::make('install.index');
		}
	}

	public function install_db(){
		if(Request::ajax()){

			try{

				DB::connection();
				return Redirect::to('/');
				
			}catch(Exception $e){

				$db_host = $_POST['database_host'];
				$db_name = $_POST['database_name'];
				$db_user = $_POST['database_user'];
				$db_password = $_POST['database_password'];

				$file = '../app/config/config.php';
				$config_string = "<?php return array('db_host' => '$db_host', 'db_name' => '$db_name', 'db_user' => '$db_user', 'db_password' => '$db_password');";
				$new_file = file_put_contents($file, $config_string);

				if($new_file !== FALSE){
					echo true;
				} else {
					echo false;
				}
			}

		} else {
			echo false;
		}
	}

	public function install_data(){
		if(Request::ajax()){
			try{

				DB::connection();
				return Redirect::to('/');

			}catch(Exception $e){

				try{

					$db_host = $_POST['database_host'];
					$db_name = $_POST['database_name'];
					$db_user = $_POST['database_user'];
					$db_password = $_POST['database_password'];

					Config::set('database.connections.mysql.host', $db_host);
					Config::set('database.connections.mysql.database', $db_name);
					Config::set('database.connections.mysql.username', $db_user);
					Config::set('database.connections.mysql.password', $db_password);

					Artisan::call('migrate');
					// Artisan::call('db:seed', array('--class'=> "SomethingTableSeeder"));

					echo true;

				} catch(Exception $e){
					echo false;
				}

			}

		} else {
			echo false;
		}
	}

}