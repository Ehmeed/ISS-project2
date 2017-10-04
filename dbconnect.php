<?php

	/*
	* File dbconnect.php
	* Connects to local database
	*/
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'katarina');
	
	//error_reporting(0);

	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS, DBNAME);
	
	if ( !$conn ) {
		die("Error establishing database connection");
	}
	mysqli_query($conn, "set names 'utf8'");


	function dbquery($query, $conn) {
    	$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
        $data_array = mysqli_fetch_array($data, MYSQLI_ASSOC);
        return $data_array;
	}

	function dbqueryinsert($query, $conn) {
    	$data = mysqli_query($conn, $query);    
	}
	