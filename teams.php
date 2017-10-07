<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Týmy - Fakultní informační systém';
include("template/header.php");
?>

     	<h2>Týmy</h2><br>	
                        <a href="my_teams.php" class="link"><button class="tlacitko"><h4>MOJE TÝMY</h4></button></a><br><br>
                        <a href="create_team.php" class="link"><button class="tlacitko"><h4>VYTVOŘIT TÝM</h4></button></a><br><br>


<?php include("template/footer.php");?>