<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Ostatn� - Fakultní informační systém';
include("template/header.php");
?>

            <h2>Informace</h2>

            
<?php include("template/footer.php");?>