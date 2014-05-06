@extends('layouts.master')


@section('content')

	<form method="POST" action="/install" id="install" class="form-signin">

		<label for="database">Database Info</label>
		<input type="text" class="form-control" name="database_host" id="database_host" placeholder="Database Host" />
		<input type="text" class="form-control" name="database_name" id="database_name" placeholder="Database Name" />
		<input type="text" class="form-control" name="database_user" id="database_user" placeholder="Database User" />
		<input type="password" class="form-control" name="database_password" id="database_password" placeholder="Database Password" />

		<label for="admin">Admin Info</label>
		<input type="text" class="form-control" name="admin_username" id="admin_username" placeholder="Username" />
		<input type="text" class="form-control" name="admin_email" id="admin_email" placeholder="Email" />
		<input type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Password" />
		
		<input type="submit" class="form-control btn btn-color btn-info" value="Install" />
		<div class="install_message"><i class="fa fa-spin fa-refresh"></i> Cranking The Wheels...</div>
	</form>

	<div class="install_success_message"><strong>Successfully Installed!</strong> <br /><a href="/login">click here to login</a></div>

@stop

@section('javascript')

	<script type="text/javascript">

		$(document).ready(function(){
			$('#install').submit(function(e){
				$('.install_message').show();
				e.preventDefault();
				$.post("{{ URL::to('install_db') }}", { database_host: $('#database_host').val(), database_name: $('#database_name').val(), database_user: $('#database_user').val(), database_password: $('#database_password').val(), }, function(data){

					if(data == 1){
						$.post("{{ URL::to('install_data') }}", { database_host: $('#database_host').val(), database_name: $('#database_name').val(), database_user: $('#database_user').val(), database_password: $('#database_password').val(), admin_username: $('#admin_username').val(), admin_email: $('#admin_email').val(), admin_password: $('#admin_password').val(),  }, function(data){

							if(data == 1){
								$('.install_message').hide();
								$('form').fadeOut('fast', function(){
									$('.install_success_message').fadeIn();
								});
								
								
							}
						});
					}
				});
			});
		});

	</script>

@stop