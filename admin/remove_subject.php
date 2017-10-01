<?php
    session_start();
    require_once '../check_login.php';
    require_once '../dbconnect.php';
    $title = 'Odebrat předmět - Fakultní informační systém';
    include("admin_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Odebrat předmět</h2>

            
         

<?php include("admin_footer.php");?>