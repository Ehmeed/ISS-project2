<?php
    session_start();
    require_once '../check_login.php';
    require_once '../dbconnect.php';
    $title = 'Přidat předmět - Administrace - Fakultní informační systém';
    include("admin_header.php"); 
?>

            <h2>Přidat předmět</h2>
			

<?php include("admin_footer.php");?>