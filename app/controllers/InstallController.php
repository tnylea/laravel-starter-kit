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

			if (Schema::hasTable('users')){
				return Redirect::to('/');
			} else {
				return View::make('install.index');
			}

		}catch(Exception $e){

				return View::make('install.index');
		}
	}

	public function install_db(){
		if(Request::ajax()){

			if (Schema::hasTable('users')){

				return Redirect::to('/');
				
			} else {

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
			
			if (Schema::hasTable('users')){

				return Redirect::to('/');
				
			} else {

				$db_host = $_POST['database_host'];
				$db_name = $_POST['database_name'];
				$db_user = $_POST['database_user'];
				$db_password = $_POST['database_password'];

				Config::set('database.connections.mysql.host', $db_host);
				Config::set('database.connections.mysql.database', $db_name);
				Config::set('database.connections.mysql.username', $db_user);
				Config::set('database.connections.mysql.password', $db_password);

				$this->create_users_table();
				$this->create_password_reminder_table();

				$admin_username = $_POST['admin_username'];
				$admin_email = $_POST['admin_email'];
				$admin_password = $_POST['admin_password'];

				$this->create_admin_user($admin_username, $admin_email, $admin_password);

				echo true;

			}

		} else {
			echo false;
		}
	}

	public function create_users_table(){
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('username');
			$table->string('email');
			$table->string('password');
			$table->boolean('admin')->default(0);
			$table->timestamps();
		});
	}

	public function create_password_reminder_table(){
		Schema::create('password_reminders', function($table){
	      $table->string('email');
	      $table->string('token');
	      $table->timestamp('created_at');
	    });
	}

	public function create_admin_user($username, $email, $password){

		$user = new User;
		$user->username = $username;
		$user->email = $email;
		$user->password = Hash::make($password);
		$user->save();

	}

}