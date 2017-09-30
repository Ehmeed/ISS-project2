<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Ostatn� - Fakultní informační systém';
include("template/header.php");
?>

            <h2>Ostatni</h2>
            <a href="" class="link"><button class="tlacitko"><h4>POTVRZENÍ O STUDIU</h4></button></a><br><br>
            <a href="" class="link"><button class="tlacitko"><h4>VÝSTUPNÍ LIST STUDENTA</h4></button></a><br><br>
            <a href="" class="link"><button class="tlacitko"><h4>VÝSTUPNÍ LIST ABSOLVENTA</h4></button></a><br><br>
            <a href="info.php" class="link"><button class="tlacitko"><h4>INFORMACE</h4></button></a>


<?php include("template/footer.php");?>