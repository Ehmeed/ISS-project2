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



	function dbquery($query, $conn) {
    	$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
        $data_array = mysqli_fetch_array($data, MYSQLI_ASSOC);
        return $data_array;
	}
	