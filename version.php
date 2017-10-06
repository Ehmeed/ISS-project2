<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Zapsané předměty - Fakultní informační systém';
include("template/header.php");
?>

            <h2>"varianta"</h2><br>
            <h4><b>• Projekt:</b></h4>
			<h4><b>• Maximum řešitelů:</b></h4>
			<h4><b>• Popis:</b></h4>		 
                
<?php include("template/footer.php");?>