@extends('layouts.master')


@section('content')

	<form method="POST" action="/install" id="install" class="form-signin">

		<label for="database">Database Info</label>
		<input type="text" class="form-control" name="database_host" id="database_host" placeholder="Database Host" />
		<input type="text" class="form-control" name="database_name" id="database_name" placeholder="Database Name" />
		<input type="text" class="form-control" name="database_user" id="database_user" placeholder="Database User" />
		<input type="password" class="form-control" name="database_password" id="database_password" placeholder="Database Password" />
		
		<input type="submit" class="form-control btn btn-color btn-info" value="Install" />

	</form>

@stop

@section('javascript')

	<script type="text/javascript">

		$(document).ready(function(){
			$('#install').submit(function(e){
				e.preventDefault();
				$.post("{{ URL::to('install_db') }}", { database_host: $('#database_host').val(), database_name: $('#database_name').val(), database_user: $('#database_user').val(), database_password: $('#database_password').val(), }, function(data){
					if(data == 1){
						$.post("{{ URL::to('install_data') }}", { database_host: $('#database_host').val(), database_name: $('#database_name').val(), database_user: $('#database_user').val(), database_password: $('#database_password').val(), }, function(){});
					}
				});
			});
		});

	</script>

@stop