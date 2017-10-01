<?php
    session_start();
    require_once '../check_login.php';
    require_once '../dbconnect.php';
    $title = 'Odebrat uživatele - Fakultní informační systém';
    include("admin_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Odebrat uživatele</h2>

            
         

<?php include("admin_footer.php");?>