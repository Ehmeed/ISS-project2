<?php

	session_start();
	
	if (!isset($_SESSION['login'])) {
		header("Location: index.php");
	}

	unset($_SESSION['login']);
	unset($_SESSION['power']);
	unset($_SESSION['timestamp']);
	session_unset();
	session_destroy();
	header("Location: index.php");
	exit;
	