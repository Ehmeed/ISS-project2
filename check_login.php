<?php
	session_start();
    if(!isset($_SESSION['login'])){
        header("Location: home.php");
        exit;
    }

ob_end_flush(); ?>
