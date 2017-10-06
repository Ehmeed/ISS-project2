<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Předměty - Fakultní informační systém';
include("template/header.php");
?>

     	<h2>Předměty</h2><br>	
                        <a href="registration.php" class="link"><button class="tlacitko"><h4>REGISTRACE PŘEDMĚTŮ</h4></button></a><br><br>
                        <a href="subjects.php" class="link"><button class="tlacitko"><h4>ZAPSANÉ PŘEDMĚTY</h4></button></a><br><br>
                        <a href="all_subjects.php" class="link"><button class="tlacitko"><h4>VŠECHNY PŘEDMĚTY</h4></button></a>


<?php include("template/footer.php");?>