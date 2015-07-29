<?php
	error_reporting(E_ALL | E_STRICT);
	define('DATABASE_USER', 'root');
	define('DATABASE_HOST', 'localhost');
	define('DATABASE_NAME', 'connect+');

	define('WEBSITE_URL', 'http://localhost:8800/Connect+');
	 
	// Make the connection:
	$dbc = @mysqli_connect(DATABASE_HOST, DATABASE_USER, '',DATABASE_NAME);
	 if (!$dbc) {
		trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
	}
	//echo("Made the connection\n");
?>