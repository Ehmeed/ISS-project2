<?php
    session_start();
    require_once '../check_login.php';
    require_once '../dbconnect.php';
    $title = 'Přidat studenta - Administrace - Fakultní informační systém';
    include("admin_header.php"); 
?>

            <h2>Přidat studenta</h2>
			

<?php include("admin_footer.php");?>