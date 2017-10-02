<?php
	
    if(!isset($_SESSION['login'])){
        header("Location: index.php");
        exit;
    }

    if(time() - $_SESSION['timestamp'] > 900) { 
    	echo"<script>alert('Byl jste odhlasen kvuli 15 minutove neaktivite');</script>";
    	header("Location: logout.php"); 
    	exit;
	} else {
	    $_SESSION['timestamp'] = time(); //set new timestamp
	}

 ?>
