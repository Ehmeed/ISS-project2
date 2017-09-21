<?php

	/*
	* File dbconnect.php
	* Connects to local database
	*/
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'katarina');
	
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS, DBNAME);
	
	if ( !$conn ) {
		die("Error establishing database connection");
	}
	