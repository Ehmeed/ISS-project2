<?php
	
    if(!isset($_SESSION['login'])){
        header("Location: index.php");
        exit;
    }

    if(time() - $_SESSION['timestamp'] > 900) { 
    	header("Location: logout.php"); 
    	exit;
	} else {
	    $_SESSION['timestamp'] = time(); //set new timestamp
	}

 ?>
