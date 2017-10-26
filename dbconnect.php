<?php

	/*
	* File dbconnect.php
	* Connects to local database
	*/
	
	define('DBHOST', 'localhost:/var/run/mysql/mysql.sock');
	define('DBUSER', 'xhelda00');
	define('DBPASS', 'asu7undu');
	define('DBNAME', 'xhelda00');

	$path = "localhost:/var/run/mysql/mysql.sock";
	$login = "/var/run/mysql/mysql.sock";
	$user = "xhelda00";
	$pass = "asu7undu";
	$db = "xhelda00";
	$conn = new MySQLi('localhost', $user, $pass, $db, 0,$login);
	
	//error_reporting(0);
	
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
	