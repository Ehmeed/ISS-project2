<?php
	
    if(!isset($_SESSION['login'])){
        header("Location: ../index.php");
        exit;
    }
    if(!isset($_SESSION['power'])){
        header("Location: ../index.php");
        exit;
    }
    if($_SESSION['power'] != "admin"){
    	header("Location: ../index.php");
        exit;
    }

 ?>
