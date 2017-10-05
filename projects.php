<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Projekty - FakultnĂ­ informaÄŤnĂ­ systĂ©m';
include("template/header.php");
?>

            <h2>Projekty</h2>
            	<a href="new_projects.php" class="link"><button class="tlacitko"><h4>NOVÉ PROJEKTY</h4></button></a><br><br>
                <a href="current.php" class="link"><button class="tlacitko"><h4>REGISTROVANÉ PROJEKTY</h4></button></a><br><br>
                <a href="past.php" class="link"><button class="tlacitko"><h4>PŘEDCHOZÍ PROJEKTY</h4></button></a>
                
                
<?php include("template/footer.php");?>