<?php

	session_start();
	
	if (!isset($_SESSION['login'])) {
		header("Location: index.php");
	} else if(isset($_SESSION['login'])!="") {
		header("Location: home.php");
	}
	
	if (isset($_GET['logout'])) {
		unset($_SESSION['login']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;
	}